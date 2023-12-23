<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use App\Models\Produk;
use App\Models\Warna_produk;
use App\Models\Ukuran_produk;
use App\Models\Master_link;
use App\Models\Gambar_produk;
use App\Traits\ImageTrait;

class ProdukService
{
    use ImageTrait;
    public function add($request): Produk{
        // dd($request->gambar);     
        $gambar = $this->resize($request->gambar);
        $gambar_original = $this->original($request->gambar);
        
        $produk = Produk::create([
            'id_kategori'=>$request->kategori,
            'judul_id'=>$request->judul_id,
            'judul_en'=>$request->judul_en,
            'deskripsi_id'=>$request->deskripsi_id,
            'deskripsi_en'=>$request->deskripsi_en,
            'modal_id'=>$request->modal_id,
            'modal_en'=>$request->modal_en,
            'harga_id'=>$request->harga_id,
            'harga_en'=>$request->harga_en,
            'diskon_id'=>$request->diskon_id,
            'diskon_en'=>$request->diskon_en,
            'kode_sku'=>$request->kode_sku,
            'link_video'=>$request->link_video,
            'gambar_original'=>$gambar_original['full'],
            'gambar'=>'/'.$gambar->dirname.'/'.$gambar->basename,
            'status'=>$request->status,
            'id_user'=>Auth::user()->id,
        ]);
        return $produk;
    }
    public function detail($id): Produk{
        $produk = Produk::with('user')
        ->with('kategori')
        ->with('image')
        ->with('warna')
        ->with('ukuran')
        ->with('link')
        ->find($id);
        
        return $produk;
    }
    public function list(){
        $produk = Produk::where('id_user', Auth::user()->id)
        ->with('user')
        ->with('kategori')
        ->with('image')
        ->with('warna')
        ->with('ukuran')
        ->with('link')
        ->orderBy('id', 'desc')
        ->paginate(20);
        
        return $produk;
    }
    public function edit_Proses($request, $id): void{
        // dd($request->gambar);
        $this->validate_Data($request);
        $produk = Produk::find($id);

        if ($request->gambar != null) {
            $gambar = $this->resize($request->gambar);
            $gambar_original = $this->original($request->gambar);
        }
        Produk::find($id)->update([
            'id_kategori'=>$request->kategori,
            'judul_id'=>$request->judul_id,
            'judul_en'=>$request->judul_en,
            'deskripsi_id'=>$request->deskripsi_id,
            'deskripsi_en'=>$request->deskripsi_en,
            'harga_id'=>$request->harga_id,
            'harga_en'=>$request->harga_en,
            'diskon_id'=>$request->diskon_id,
            'diskon_en'=>$request->diskon_en,
            'modal_id'=>$request->modal_id,
            'modal_en'=>$request->modal_en,
            'kode_sku'=>$request->kode_sku,
            'link_video'=>$request->link_video,
            'gambar'=>$request->gambar != null ? '/'.$gambar->dirname.'/'.$gambar->basename : $produk->gambar,
            'gambar_original'=>$request->gambar != null ? $gambar_original['full'] : $produk->gambar_original,
            'status'=>$request->status,
            'id_user'=>Auth::user()->id,
        ]);
    }
    public function delete($id){
        $produk = Produk::find($id);

        $warnas = Warna_produk::where('id_produk', $id)->get();
        $gambars = Gambar_produk::where('id_produk', $id)->get();

        foreach($warnas as $warna){
            if(File::exists($warna->gambar)) {
                File::delete($warna->gambar);
            }
            Warna_produk::find($warna->id)->delete();
        }
        foreach($gambars as $gambar){
            if(File::exists($gambar->gambar)) {
                File::delete($gambar->gambar);
            }
            Gambar_produk::find($gambar->id)->delete();
        }
        Master_link::where('id_produk', $id)->delete();
        Ukuran_produk::where('id_produk', $id)->delete();

        Produk::find($id)->delete();
    }
    public function validate_Data($request){
        $request->validate([
            'kategori'=>'required',
            'judul_id'=>'required',
            'judul_en'=>'required',
            'deskripsi_id'=>'required',
            'deskripsi_en'=>'required',
            'harga_id'=>'required',
            'harga_en'=>'required',
            'diskon_id'=>'required',
            'diskon_en'=>'required',
            'modal_id'=>'required',
            'modal_en'=>'required',
            'kode_sku'=>'required',
            'link_video'=>'required',
            'status'=>'required',
            'warna'=>'required',
            'size'=>'required',
            'link'=>'required',
            'gambar'=>'max:7577',
            'gambar_produk.*.gambar'=>'max:7577',
        ]);
    }
}