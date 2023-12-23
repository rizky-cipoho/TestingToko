<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use App\Models\Kategori_page;
use App\Models\Page;

class KategoriPageService
{
    public function list(): Collection{
        $kategoriPage = Kategori_page::paginate(20);

        return $kategoriPage;
    }
    public function detail($id): Kategori_page{
        $kategoriPage = Kategori_page::findOrFail($id);

        return $kategoriPage;
    }
    public function add($request):void{
        Kategori_page::create([
            'kategori_id'=>$request->kategori_id,
            'kategori_en'=>$request->kategori_en
        ]);
    }

    public function edit_Proses($request, $id): void{
        Kategori_page::find($id)->update([
            'kategori_id'=>$request->kategori_id,
            'kategori_en'=>$request->kategori_en
        ]);
    }
    public function delete($id): void{
        Page::where('kategori_id', $id)->update([
            'status'=>'Tidak Aktif',
            'kategori_id'=>'none'
        ]);
        Kategori_page::find($id)->delete();
    }
}