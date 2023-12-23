<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Models\Produk;
use App\Models\Warna_produk;
use App\Models\Ukuran_produk;
use App\Models\Master_link;
use App\Models\Gambar_produk;
use App\Traits\ImageTrait;

class MasterLinkService
{
    use ImageTrait;
    public function add($request, $id):Master_link{      
        $link = Master_link::create([
            'id_produk'=>$id,
            'judul_link'=>$request['judul_link'],
            'link'=>$request['link'],
            'target'=>$request['target'],
            'status'=>$request['status_link'],
        ]);
        return $link;
    }
    public function edit($link): void{      
        $link = Master_link::find($link['id'])->update([
            'judul_link'=>$link['judul_link'],
            'link'=>$link['link'],
            'target'=>$link['target'],
            'status'=>$link['status_link'],
        ]);
    }
}