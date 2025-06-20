<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransaksiController
{
    public function lihattransaksi()
    {
        $transaksi = Transaksi::with('produk')->get();
        return view('users.staf.lihattransaksi', compact('transaksi'));
    }

    public function tambahtransaksi()
    {
        $produk = Produk::all();
        return view('users.staf.tambahtransaksi', compact('produk'));
    }

    public function simpantransaksi(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jenis' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $produk = Produk::lockForUpdate()->findOrFail($request->produk_id);

            if ($request->jenis == 'keluar' && $produk->stok < $request->jumlah) {
                throw new \Exception('Stok tidak mencukupi');
            }

            $subtotal = $produk->harga * $request->jumlah;

            // Update stok
            if ($request->jenis == 'masuk') {
                $produk->increment('stok', $request->jumlah);
            } else {
                $produk->decrement('stok', $request->jumlah);
            }

            Transaksi::create([
                'produk_id' => $produk->id,
                'jenis' => $request->jenis,
                'jumlah' => $request->jumlah,
                'subtotal_harga' => $subtotal,
            ]);
        });

        return redirect()->route('staf.lihattransaksi');
    }
    public function edittransaksi($id){
        $transaksi = Transaksi::findOrFail($id);
        $produk = Produk::all();
        return view('users.staf.edittransaksi', compact('transaksi', 'produk'));
    }

    public function updatetransaksi(Request $request, $id)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jenis' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request, $id) {
            $transaksi = Transaksi::findOrFail($id);
            $produk = Produk::lockForUpdate()->findOrFail($transaksi->produk_id);

            // 1. Kembalikan stok lama
            if ($transaksi->jenis == 'masuk') {
                $produk->decrement('stok', $transaksi->jumlah);
            } else {
                $produk->increment('stok', $transaksi->jumlah);
            }

            // 2. Ambil produk baru (jika produk diganti)
            $produkBaru = Produk::lockForUpdate()->findOrFail($request->produk_id);

            // 3. Validasi stok jika jenis keluar
            if ($request->jenis == 'keluar' && $produkBaru->stok < $request->jumlah) {
                throw new \Exception('Stok tidak mencukupi untuk transaksi keluar.');
            }

            // 4. Update stok baru
            if ($request->jenis == 'masuk') {
                $produkBaru->increment('stok', $request->jumlah);
            } else {
                $produkBaru->decrement('stok', $request->jumlah);
            }

            // 5. Hitung subtotal
            $subtotal = $produkBaru->harga * $request->jumlah;

            // 6. Update transaksi
            $transaksi->update([
                'produk_id' => $request->produk_id,
                'jenis' => $request->jenis,
                'jumlah' => $request->jumlah,
                'subtotal_harga' => $subtotal,
            ]);
        });

        return redirect()->route('staf.lihattransaksi');
    }
    

    public function deletetransaksi($id)
    {
        DB::transaction(function () use ($id) {
            $transaksi = Transaksi::findOrFail($id);
            $produk = Produk::lockForUpdate()->findOrFail($transaksi->produk_id);

            // Kembalikan stok sesuai jenis transaksi
            if ($transaksi->jenis == 'masuk') {
                // Karena stok sebelumnya bertambah, maka kita kurangi
                $produk->decrement('stok', $transaksi->jumlah);
            } elseif ($transaksi->jenis == 'keluar') {
                // Karena stok sebelumnya berkurang, maka kita tambahkan kembali
                $produk->increment('stok', $transaksi->jumlah);
            }

            // Hapus data transaksi
            $transaksi->delete();
        });

        return redirect()->route('staf.lihattransaksi');
    }

    public function lihattransaksiAdmin()
    {
        $transaksi = Transaksi::with('produk')->orderBy('created_at', 'desc')->get();
        return view('users.admin.lihattransaksi', compact('transaksi'));
    }

    public function lihattransaksiSupervisor()
    {
        $transaksi = Transaksi::with('produk')->orderBy('created_at', 'desc')->get();
        return view('users.supervisor.lihattransaksi', compact('transaksi'));
    }
}
