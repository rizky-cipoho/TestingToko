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

class UkuranProdukService
{
    use ImageTrait;
    public function add($request, $id):Ukuran_produk{      
        $ukuran = Ukuran_produk::create([
            'id_produk'=>$id,
            'ukuran_id'=>$request['size_id'],
            'ukuran_en'=>$request['size_en'],
            'status'=>$request['status_size'],
        ]);
        return $ukuran;
    }
    public function edit($size): void{      
        Ukuran_produk::find($size['id'])->update([
            'ukuran_id'=>$size['size_id'],
            'ukuran_en'=>$size['size_en'],
            'status'=>$size['status_size'],
        ]);
    }
}