<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use App\Models\Sumber_pesanan;

class SumberPesananService
{
    public function list(): Collection{
        $sumbers = Sumber_pesanan::paginate(20);
        return $sumbers;
    }
    public function detail($id): Sumber_pesanan{
        $sumbers = Sumber_pesanan::findOrFail($id);

        return $sumbers;
    }
    public function add($request):void{
        Sumber_pesanan::create([
            'sumber'=>$request->sumber
        ]);
    }

    public function edit_Proses($request, $id): void{
        $request->validate([
            'sumber'=>'required'
        ]);
        Sumber_pesanan::find($id)->update([
            'sumber'=>$request->sumber
        ]);
    }
    public function delete($id): void{
        Sumber_pesanan::find($id)->delete();
    }
}