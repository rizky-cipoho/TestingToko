<?php

namespace App\Http\Controllers\Api\Produk;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukRequest;
use App\Http\Resources\ResultResource;
use App\Http\Resources\ProdukResource;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Services\ProdukService;
use App\Services\WarnaProdukService;
use App\Services\GambarProdukService;
use App\Services\UkuranProdukService;
use App\Services\MasterLinkService;

class ProdukController extends Controller
{
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
    
    
    public function add_Proses(ProdukRequest $request): ResultResource{
        // dd($request->all());
        $produk = $this->produkService->add($request);
        // dd($produk->id);
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
        return new ResultResource(collect(['result'=>"produk berhasil di buat"]));
    }
    
    
    public function detail($id): ProdukResource{
        $produk = $this->produkService->detail($id);
        
        return new ProdukResource($produk);
    }
    
    public function list(): ResourceCollection{
        $produk = $this->produkService->list();
        
        return ProdukResource::collection($produk);
    }
    public function edit_proses(Request $request, $id): ResultResource{
        $this->produkService->edit_Proses($request, $id);
        foreach($request->gambar_produk as $index=>$gambar){
            if(isset($gambar['id'])){
                if(isset($gambar['gambar'])){
                    $gambar = $this->gambarProdukService->edit($gambar, $produk->id);
                }
            }else{
                if(isset($gambar['gambar'])){
                    $gambar = $this->gambarProdukService->add($gambar, $produk->id);
                }
            }
        }
        foreach($request->warna as $index=>$warna){
            if(isset($warna['id'])){
                $this->warnaProdukService->edit($warna);
            }else{
                $this->warnaProdukService->add($warna, $id);
            }
        }
        foreach($request->size as $size){
            if(isset($size['id'])){
                $size = $this->ukuranProdukService->edit($size);
            }else{
                $size = $this->ukuranProdukService->add($size, $produk->id);
            }
        }
        foreach($request->link as $link){
            if(isset($link['id'])){
                $link = $this->masterLinkService->edit($link);
            }else{
                $link = $this->masterLinkService->add($link, $produk->id);
            }
        }
        
        return new ResultResource(collect(['result'=>'produk berhasil di ubah']));
    }
    public function delete($id):ResultResource{
        $this->produkService->delete($id);
        
        return new ResultResource(collect(['result'=>'produk berhasil di hapus']));
    }
}
