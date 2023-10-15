<?php

namespace App\Http\Controllers\Pesanan;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Sumber_pesanan;

class SumberPesananController extends Controller
{
    public function sumber_list(Role $role){
        $this->authorize('update', $role);
        $sumbers = Sumber_pesanan::get();
        return view('pesanan/sumber/list',[
            'sumbers'=>$sumbers
        ]);
    }
    public function sumber_add_proses(Request $request){
        $request->validate([
            'sumber'=>'required'
        ]);
        Sumber_pesanan::create([
            'sumber'=>$request->sumber
        ]);
        return back()->with('success', 'Sumber berhasil ditambahkan');
    }
    public function sumber_edit_proses(Request $request, $id){
        $request->validate([
            'sumber'=>'required'
        ]);
        Sumber_pesanan::find($id)->update([
            'sumber'=>$request->sumber
        ]);
        return back()->with('success', 'Sumber diubah');
    }
    public function sumber_delete_proses($id){
        Sumber_pesanan::find($id)->delete();
        return back()->with('success', 'Sumber berhasil dihapus');
    }
}
