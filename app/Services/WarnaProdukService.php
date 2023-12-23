<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Models\Warna_produk;
use App\Traits\ImageTrait;

class WarnaProdukService
{
    use ImageTrait;
    public function add($warna, $id): Warna_produk {
        // dd($warna['gambar']);
        $warnaGambar = $this->resize($warna['gambar_warna']);
        $warnaGambarOriginal = $this->original($warna['gambar_warna']);
        
        $warna = Warna_produk::create([
            'id_produk'=>$id,
            'warna'=>$warna['warna'],
            'kode_warna'=>$warna['kode_warna'],
            'status'=>$warna['status_warna'],
            'gambar_original'=>$warnaGambarOriginal['full'],
            'gambar'=>'/'.$warnaGambar->dirname.'/'.$warnaGambar->basename,
        ]);
        
        return $warna;
    }
    public function edit($warna): void {
        if(isset($warna['gambar_warna'])){
            $gambar_warna = $this->resize($warna['gambar_warna']);
            $gambar_warna_original = $this->original($warna['gambar_warna']);
            $warna = Warna_produk::find($warna['id'])->update([
                'warna'=>$warna['warna'],
                'kode_warna'=>$warna['kode_warna'],
                'status'=>$warna['status_warna'],
                'gambar_original'=>$gambar_warna_original['full'],
                'gambar'=>'/'.$gambar_warna->dirname.'/'.$gambar_warna->basename,
            ]);
        }else{
            $warna = Warna_produk::find($warna['id'])->update([
                'warna'=>$warna['warna'],
                'kode_warna'=>$warna['kode_warna'],
                'status'=>$warna['status_warna'],
            ]);
        }
    }
}