<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Kategori;

class KategoriService
{
    public function add($request){
        // dd($request['kategori_id']);
        $kategori = Kategori::create([
            'kategori_id'=>$request['kategori_id'],
            'kategori_en'=>$request['kategori_en'],
            'status'=>$request['status'],
        ]);
    }

    public function list(): LengthAwarePaginator{
        $kategori = Kategori::paginate(20);

        return $kategori;
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
        $kategori = Kategori::find($id)->update([
            'kategori_id'=>$request['kategori_id'],
            'kategori_en'=>$request['kategori_en'],
            'status'=>$request['status'],
        ]);
    }
    public function delete($id): void{
        $kategori = Kategori::find($id)->delete();
    }
}