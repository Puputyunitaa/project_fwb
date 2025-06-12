<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
      /**
     * Menampilkan semua transaksi (Supervisor)
     */
    public function index()
    {
        // Contoh ambil data transaksi dari model Transaction (kamu harus buat model-nya)
        // $transactions = Transaction::all();

        // Return view dengan data transaksi
        return view('transactions.index' /*, compact('transactions') */);
    }

    /**
     * Simpan transaksi barang masuk (Staf)
     */
    public function storeIn(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Logika simpan transaksi masuk
        // Transaction::create([...]);

        return redirect()->back()->with('success', 'Transaksi barang masuk berhasil disimpan');
    }

    /**
     * Simpan transaksi barang keluar (Staf)
     */
    public function storeOut(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Logika simpan transaksi keluar
        // Pastikan stok tidak minus

        return redirect()->back()->with('success', 'Transaksi barang keluar berhasil disimpan');
    }
}
