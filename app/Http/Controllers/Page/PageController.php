<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Kategori_page;
use App\Http\Requests\PageRequest;

class PageController extends Controller
{
    public function list(){
        $pages = Page::with('kategori')->get();
        return view('page/list',[
            'pages'=>$pages
        ]);
    }
    public function add(){
        $kategoris = Kategori_page::get();
        return view('page/add',[
            'kategoris'=>$kategoris
        ]);
    }
    public function add_proses(PageRequest $request){
        $request->add();
        return back()->with('success', "Artikel berhasil dibuat");
    }
    public function edit($id){
        $page = Page::with('kategori')->find($id);
        $kategoris = Kategori_page::get();
        return view('page/add',[
            'page'=>$page,
            'kategoris'=>$kategoris
        ]);
    }
    public function edit_proses(PageRequest $request, $id){
        $request->edit($id);
        return back()->with('success', "Artikel berhasil diubah");
    }
    public function delete_proses($id){
        Page::find($id)->delete();
        return back()->with('success', "Artikel berhasil dihapus");
    }
}
