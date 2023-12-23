<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Http\Requests\KategoriRequest;

class KategoriController extends Controller
{
    public function kategori(){
        $kategori = Kategori::get();
        return view('produk/kategori',[
            'kategoris'=>$kategori
        ]);
    }
    public function kategori_add_proses(KategoriRequest $request){

        $kategori = Kategori::create([
            'kategori_id'=>$request->kategori_id,
            'kategori_en'=>$request->kategori_en,
            'status'=>$request->status,
        ]);
        return redirect()->back()->with('success', "Data Berhasil di Tambahkan");
    }
    public function delete(Request $request){
        // dd($request->all());
        $kategori = Kategori::find($request->id)->delete();
        return redirect()->back()->with('success', "Data Berhasil di Hapus");
    }
    public function edit_proses(KategoriRequest $request, $id){
        // dd($request->all());
        $request->update($id);
        return back()->with('success', "Data berhasil di ubah");
    }
}
