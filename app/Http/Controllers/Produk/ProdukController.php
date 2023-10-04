<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Warna_produk;
use App\Models\Ukuran_produk;
use App\Http\Requests\ProdukRequest;

class ProdukController extends Controller
{
    public function add(){
        $kategori = Kategori::get();
        return view('product/add',[
            'kategoris'=>$kategori
        ]);
    }
    public function add_Proses(ProdukRequest $request){
        $request->add();
        return redirect()->route('product.add')->with('status', "berhasil");
    }
}
