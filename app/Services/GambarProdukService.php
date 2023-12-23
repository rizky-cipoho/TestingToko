<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Models\Gambar_produk;
use App\Traits\ImageTrait;

class GambarProdukService
{
    use ImageTrait;
    public function add($request, $id): Gambar_produk{
        // dd($request['gambar']);   
        $gambar_produk = $this->resize($request['gambar']);
        $gambar_produk_original = $this->original($request['gambar']);
        $gambar = Gambar_produk::create([
            'id_produk'=>$id,
            'gambar_original'=>$gambar_produk_original['full'],
            'gambar'=>'/'.$gambar_produk->dirname.'/'.$gambar_produk->basename,
            'status'=>'aktif',
        ]);
        return $gambar;
    }
    public function edit(){
        $gambar_produk_original = $this->original($gambar['gambar']);
        $gambar_produk = $this->resize($gambar['gambar']);
        Gambar_produk::find($gambar['id'])->update([
            'gambar_original'=>$gambar_produk_original['full'],
            'gambar'=>'/'.$gambar_produk->dirname.'/'.$gambar_produk->basename,
            'status'=>'aktif',
        ]);
    }
}