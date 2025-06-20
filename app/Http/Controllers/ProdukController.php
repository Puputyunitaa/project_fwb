<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Produk_supplier;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController
{
     public function lihatproduk()
    {
        $produk = Produk_supplier::with(['produk.kategori', 'supplier'])->get();
        return view('users.admin.lihatproduk', compact('produk'));
    }
    public function tambahproduk()
    {
        $produk = Produk::all();
        $kategori = Kategori::all();
        return view('users.admin.tambahproduk', compact('kategori', 'produk'));
    }
    public function simpanproduk(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_produk' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'harga' => 'required',
            'stok' => 'required',
            'nama_supplier' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:12',
            
        ]);
        DB::beginTransaction();
        try {
            //code...
       

        $path = $request->file('gambar')->store('produk', 'public');
        

        $produk = Produk::create([
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'gambar' => $path,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

          $supplier = Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        Produk_supplier::create([
            'produk_id' => $produk->id,
            'supplier_id' => $supplier->id,
        ]);
        // 
        
         DB::commit();
        return redirect()->route('admin.lihatproduk')->with('success', 'berhasil menambahkan produk' );
        } catch (\Exception  $e) {
            DB::rollBack();
            // Log the error or handle it as neede
            
            // Redirect with an error message
        return redirect('admin.lihatproduk')->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
        
           
        }
    }
    // public function editproduk($id)
    // {
    //     $produk = produk::find($id);
    //     $kategori = Kategori::all();
    //     return view('users.admin.editproduk', compact('produk', 'kategori'));
    // }

    public function editproduk($id)
{
    // Ambil data dari tabel pivot
    $produk_supplier = Produk_supplier::with(['produk', 'produk.kategori', 'supplier'])->findOrFail($id);
    $kategori = Kategori::all();

    return view('users.admin.editproduk', [
        'produk_supplier' => $produk_supplier,
        'produk' => $produk_supplier->produk,
        'kategori' => $kategori,
        'supplier' => $produk_supplier->supplier,
    ]);
}
    // public function updateproduk(Request $request, $id)
    // {
    //     $produk = Produk::findOrFail($id);

    //     // Ambil semua data kecuali gambar
    //     $data = $request->only('kategori_id', 'nama_produk', 'harga', 'stok');

    //     // Cek apakah ada gambar baru diupload
    //     if ($request->hasFile('gambar')) {
    //         $path = $request->file('gambar')->store('produk', 'public');
    //         $data['gambar'] = $path;
    //     }

    //     $produk->update($data);

    //     return redirect()->route('admin.lihatproduk');
    // }
    public function updateproduk(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'kategori_id' => 'required',
        'nama_produk' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
        'nama_supplier' => 'required',
        'alamat' => 'required',
        'telepon' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    DB::beginTransaction();
    try {

    // Ambil data pivot beserta relasi produk & supplier
    $produk_supplier = \App\Models\Produk_supplier::with(['produk', 'supplier'])->findOrFail($id);

    // Update produk
    $produk = $produk_supplier->produk;
    $produk->kategori_id = $request->kategori_id;
    $produk->nama_produk = $request->nama_produk;
    $produk->harga = $request->harga;
    $produk->stok = $request->stok;

    // Jika ada upload gambar baru
    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('produk', 'public');
        $produk->gambar = $path;
    }
    $produk->save();

    // Update supplier
    $supplier = $produk_supplier->supplier;
    $supplier->nama_supplier = $request->nama_supplier;
    $supplier->alamat = $request->alamat;
    $supplier->telepon = $request->telepon;

    $supplier->save();
     DB::commit();
    return redirect()->route('admin.lihatproduk')->with('success', 'Produk & Supplier berhasil diupdate!');
    } catch (\Exception $e) {
        DB::rollBack();
        // Log the error or handle it as needed
        return redirect()->route('admin.lihatproduk')->with('error', 'Gagal mengupdate produk: ' . $e->getMessage());
    }
   
}

    // public function deleteproduk($id)
    // {
    //     $produk = Produk::findOrFail($id);
    //     $produk->delete();
    //     return redirect()->route('admin.lihatproduk');
    // }
 
public function deleteproduk($id)
{
    DB::beginTransaction();
    Try {
    // Ambil data dari tabel pivot beserta relasi produk & supplier
    $produk_supplier = Produk_supplier::with(['produk', 'supplier'])->findOrFail($id);

    // Simpan id produk & supplier sebelum hapus pivot
    $produkId = $produk_supplier->produk_id;
    $supplierId = $produk_supplier->supplier_id;

    // Hapus data di tabel pivot
    $produk_supplier->delete();

    // Hapus produk jika tidak dipakai di pivot lain
    if (Produk_supplier::where('produk_id', $produkId)->count() == 0) {
        Produk::where('id', $produkId)->delete();
    }

    // Hapus supplier jika tidak dipakai di pivot lain
    if (Produk_supplier::where('supplier_id', $supplierId)->count() == 0) {
        Supplier::where('id', $supplierId)->delete();
    }
      DB::commit();
    return redirect()->route('admin.lihatproduk')->with('success', 'Produk & Supplier berhasil dihapus!');
    } catch (\Exception $e) {
        DB::rollBack();
        // Log the error or handle it as needed
        return redirect()->route('admin.lihatproduk')->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
    }

}

    public function lihatprodukStaf()
    {
        $produk = Produk::with('kategori')->orderBy('created_at', 'desc')->get();
        return view('users.staf.lihatproduk', compact('produk'));
    }

    public function lihatprodukSupervisor()
    {
        $produk = Produk::with('kategori')->orderBy('created_at', 'desc')->get();
        return view('users.supervisor.lihatproduk', compact('produk'));
    }
}
