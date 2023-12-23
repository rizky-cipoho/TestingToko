<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Warna_produk;
use App\Models\Ukuran_produk;
use App\Http\Requests\ProdukRequest;
use App\Models\Master_link;
use App\Models\Gambar_produk;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Services\ProdukService;
use App\Services\WarnaProdukService;
use App\Services\GambarProdukService;
use App\Services\UkuranProdukService;
use App\Services\MasterLinkService;

class ProdukController extends Controller
{
    use ImageTrait;
    public $produkService;
    public $warnaProdukService;
    public $gambarProdukService;
    public $ukuranProdukService;
    public $masterLinkService;
    
    
    public function __construct(){
        $this->produkService = new ProdukService;
        $this->warnaProdukService = new WarnaProdukService;
        $this->gambarProdukService = new GambarProdukService;
        $this->ukuranProdukService = new UkuranProdukService;
        $this->masterLinkService = new MasterLinkService;
    }
    public function add(){
        $kategori = Kategori::where('status', 0)->get();
        return view('produk/add',[
            'kategoris'=>$kategori
        ]);
    }
    public function add_Proses(ProdukRequest $request){
        $produk = $this->produkService->add($request);

        foreach($request->warna as $warna){
            $warna = $this->warnaProdukService->add($warna, $produk->id);
        }
        foreach($request->size as $size){
            $size = $this->ukuranProdukService->add($size, $produk->id);
        }
        foreach($request->link as $link){
            $link = $this->masterLinkService->add($link, $produk->id);
        }
        
        if(isset($request->gambar_produk)){
            foreach($request->gambar_produk as $gambar){
                $gambar = $this->gambarProdukService->add($gambar, $produk->id);
            }
        }
        return redirect()->route('produk.add')->with('status', "Produk berhasil di tambahkan");
    }
    public function detail($id){
        $produk = $this->produkService->detail($id);

        // dd($produk->warna);
        return view('produk/detail',[
            'produk'=>$produk
        ]);
    }
    public function edit($id){
        $kategori = Kategori::where('status', 0)->get();
        $produk = Produk::with('user')
        ->with('kategori')
        ->with('image')
        ->with('warna')
        ->with('ukuran')
        ->with('link')
        ->find($id);
        return view('produk/add',[
            'kategoris'=>$kategori,
            'produk'=>$produk,
            'id'=>$id
        ]);
    }
    public function edit_Proses(Request $request, $id){
        dd($request->all());
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
        foreach($request->gambar_produk as $index=>$gambar){
            if(isset($gambar['id'])){
                if(isset($gambar['gambar'])){
                    $gambar_produk_original = $this->original($gambar['gambar']);
                    $gambar_produk = $this->resize($gambar['gambar']);
                    Gambar_produk::find($gambar['id'])->update([
                        'gambar_original'=>$gambar_produk_original['full'],
                        'gambar'=>'/'.$gambar_produk->dirname.'/'.$gambar_produk->basename,
                        'status'=>'Aktive',
                    ]);
                }
            }else{
                if(isset($gambar['gambar'])){
                    $gambar_produk = $this->resize($gambar['gambar']);
                    $gambar_produk_original = $this->original($gambar['gambar']);
                    Gambar_produk::create([
                        'id_produk'=>$id,
                        'gambar_original'=>$gambar_produk_original['full'],
                        'gambar'=>'/'.$gambar_produk->dirname.'/'.$gambar_produk->basename,
                        'status'=>'Aktive',
                    ]);
                }
            }
        }
        // dd("asd");

        foreach($request->warna as $index=>$warna){
            if(isset($warna['id'])){
                if(isset($warna['gambar_warna'])){
                    $gambar_warna = $this->resize($warna['gambar_warna']);
                    $gambar_warna_original = $this->original($warna['gambar_warna']);
                    Warna_produk::find($warna['id'])->update([
                        'warna'=>$warna['warna'],
                        'kode_warna'=>$warna['kode_warna'],
                        'status'=>$warna['status_warna'],
                        'gambar_original'=>$gambar_warna_original['full'],
                        'gambar'=>'/'.$gambar_warna->dirname.'/'.$gambar_warna->basename,
                    ]);
                }else{
                    Warna_produk::find($warna['id'])->update([
                        'warna'=>$warna['warna'],
                        'kode_warna'=>$warna['kode_warna'],
                        'status'=>$warna['status_warna'],
                    ]);
                }
            }else{
                $warnaGambar = $this->resize($warna['gambar_warna']);
                $warnaGambarOriginal = $this->original($warna['gambar_warna']);
                Warna_produk::create([
                    'id_produk'=>$id,
                    'warna'=>$warna['warna'],
                    'kode_warna'=>$warna['kode_warna'],
                    'status'=>$warna['status_warna'],
                    'gambar_original'=>$warnaGambarOriginal['full'],
                    'gambar'=>'/'.$warnaGambar->dirname.'/'.$warnaGambar->basename,
                ]);
            }
        }
        foreach($request->size as $size){
            if(isset($size['id'])){
                Ukuran_produk::find($size['id'])->update([
                    'ukuran_id'=>$size['size_id'],
                    'ukuran_en'=>$size['size_en'],
                    'status'=>$size['status_size'],
                ]);
            }else{
                Ukuran_produk::create([
                    'id_produk'=>$id,
                    'ukuran_id'=>$size['size_id'],
                    'ukuran_en'=>$size['size_en'],
                    'status'=>$size['status_size'],
                ]);
            }
        }
        foreach($request->link as $link){
            if(isset($link['id'])){
                Master_link::find($link['id'])->update([
                    'judul_link'=>$link['judul_link'],
                    'link'=>$link['link'],
                    'target'=>$link['target'],
                    'status'=>$link['status_link'],
                ]);
            }else{
                Master_link::create([
                    'id_produk'=>$id,
                    'judul_link'=>$link['judul_link'],
                    'link'=>$link['link'],
                    'target'=>$link['target'],
                    'status'=>$link['status_link'],
                ]);
            }
        }
        

        return back()->with('success', 'Data berhasil di ubah');
    }
    public function list(){
        $produk = $this->produkService->list();

        return view('produk/list',[
            'produks'=>$produk
        ]);
    }
    public function edit_Delete($id){
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

        return back()->with('success', "Data berhasil di hapus");
    }
}
