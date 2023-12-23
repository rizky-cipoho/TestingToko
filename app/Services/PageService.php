<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use App\Models\Page;

class PageService
{
    public function list(): Collection{
        return Page::where('id_user', Auth::user()->id)->with('kategori')->paginate(20);
        
    }
    public function detail($id): Page{
        $page = Page::with('kategori')->find($id);
        return $page;
        
    }
    public function add($request){
        // $this->funAbort($id);
        $page = Page::create([
            'judul_id'=>$request->judul_id,
            'judul_en'=>$request->judul_en,
            'artikel_id'=>$request->artikel_id,
            'artikel_en'=>$request->artikel_en,
            'status'=>$request->status != null ? $request->status :'Tidak Aktif',
            'kategori_id'=>$request->kategori,
            'id_user'=>Auth::user()->id
        ]);
    }

    public function listAndProduk(): Collection{
        $kategori = Kategori::with([
            'produk'=>function($produk){
                $produk->where('id_user', Auth::user()->id);
            }
        ])->get();

        return $kategori;
    }
    public function edit_Proses($request, $id): void{
        $this->funAbort($id);
        $page = Page::find($id)->update([
            'judul_id'=>$request->judul_id,
            'judul_en'=>$request->judul_en,
            'artikel_id'=>$request->artikel_id,
            'artikel_en'=>$request->artikel_en,
            'status'=>$request->status != null ? $request->status :'Tidak Aktif',
            'kategori_id'=>$request->kategori,
            'id_user'=>Auth::user()->id
        ]);
    }
    public function delete($id): void{
        $this->funAbort($id);
        Page::find($id)->delete();
    }
    public function funAbort($id){
        Page::find($id)->id_user != Auth::user()->id ? abort(403) : '' ;
    }
}