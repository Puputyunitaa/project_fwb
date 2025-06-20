<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController
{
    public function lihatkategori()
    {
        $kategori = Kategori::all();
        return view('users.admin.lihatkategori', compact('kategori'));
    }
    public function tambahkategori()
    {
        return view('users.admin.tambahkategori');
    }
    public function simpankategori(Request $request)
    {
        $kategori = Kategori::create($request->only('nama_kategori'));
        return redirect('lihatkategori')->with('success', 'berhasil menambahkan produk' );
    }
    public function editkategori($id)
    {
        $kategori = Kategori::find($id);
        return view('users.admin.editkategori', compact('kategori'));
    }
    public function updatekategori(Request $request, $id)
    {
        Kategori::findOrFail($id)->update($request->only('nama_kategori'));
        return redirect('lihatkategori')->with('success', 'berhasil menambahkan produk' );
    }
    public function deletekategori($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('lihatkategori');
    }

    public function lihatkategoriSupervisor()
    {
        $kategori = Kategori::all();
        return view('users.supervisor.lihatkategori', compact('kategori'));
    }
}
