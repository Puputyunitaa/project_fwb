<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController
{
    public function lihatTambah(){
        return view('users.admin.tambahprofil');
    }

    public function simpanprofil(Request $request){
        $request->validate([
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        Profil::create([
            'user_id' => Auth::id(),
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);


        return redirect()->route('lihatProfil')->with('success', 'Profil berhasil disimpan.');


    }
    public function lihatProfil(){
        $profil = Profil::where('user_id', Auth::id())->get();
        return view('users.admin.lihatprofil', compact('profil'));

}
        public function editProfil($id){
            $profil = Profil::findOrFail($id);
            return view('users.admin.editprofil', compact('profil'));
}
public function simpanedit(Request $request){
     $request->validate([
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        $profil = Profil::findOrFail($request->id);
        $profil->alamat = $request->alamat;
        $profil->no_hp = $request->no_hp;
        $profil->save();


        return redirect()->route('lihatProfil')->with('success', 'Profil berhasil disimpan.');


}
public function deleteprofil($id){
    $profil = Profil::findOrFail($id);
    $profil->delete();
    return redirect()->route('lihatProfil')->with('success', 'Profil berhasil dihapus.');
}

}
