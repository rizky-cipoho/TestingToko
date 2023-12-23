<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Sumber_pesanan;

class PesananService
{
    public function list(): Collection{
        $pesanans = Pesanan::where('user_id', Auth::user()->id)
        ->with('produk')
        ->with('user')
        ->with('sumber')
        ->orderBy('id', 'desc')->paginate(20);
        
        return $pesanans;
    }
    public function detail($id): Pesanan{
        $detail = Pesanan::with('produk')
        ->with('user')
        ->with('sumber')
        ->find($id);
        
        return $detail;
    }
    public function add($request):void{
        Pesanan::create([
            'produk_id'=>$request->produk, 
            'nama'=>$request->nama, 
            'qty'=>$request->qty,
            'status'=>$request->status, 
            'user_id'=>Auth::user()->id, 
            'sumber_id'=>$request->sumber, 
            'deskripsi'=>$request->deskripsi, 
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
        ]);
    }
    
    public function edit_Proses($request, $id): void{
        $pesanan = Pesanan::find($id);
        Pesanan::find($id)->update([
            'produk_id'=>$request->produk, 
            'nama'=>$request->nama, 
            'qty'=>$request->qty,
            'sumber_id'=>$request->sumber, 
            'status'=>$request->status, 
            'deskripsi'=>$request->deskripsi == null ? $pesanan->deskripsi : $request->deskripsi, 
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
        ]);
    }
    public function delete($id): void{
        Pesanan::find($id)->delete();
    }
    public function status_proses(Request $request, $id){
        Pesanan::find($id)->update([
            'status'=>$request->status
        ]);
        return back()->with('success', 'Status diubah');
    }
}