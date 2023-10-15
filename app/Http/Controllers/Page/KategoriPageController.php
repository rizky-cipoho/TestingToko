<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori_page;
use App\Http\Requests\KategoriPageRequest;

class KategoriPageController extends Controller
{
    public function list(){
        $kategoriPage = Kategori_page::get();
        return view('page/kategori',[
            'kategoriPage'=>$kategoriPage
        ]);
    }
    public function add_proses(KategoriPageRequest $request){
        $request->add();
        return back()->with('success', "Kategori ditambahkan");
    }
    public function edit_proses(KategoriPageRequest $request, $id){
        $request->edit($id);
        return back()->with('success', "Kategori berhasil diubah");
    }
    public function delete(KategoriPageRequest $request, $id){
        $request->delete($id);
        return back()->with('success', "Kategori berhasil dihapus");
    }
}
