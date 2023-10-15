<?php

namespace App\Http\Controllers\Pesanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Sumber_pesanan;
use App\Http\Requests\PesananRequest;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function list(){
        $produks = Produk::where('id_user', Auth::user()->id)->get();
        $pesanans = Pesanan::where('user_id', Auth::user()->id)
        ->with('produk')
        ->with('user')
        ->with('sumber')
        ->orderBy('id', 'desc')->get();
        $sumbers = Sumber_pesanan::get();
        return view('pesanan/list',[
            'pesanans'=>$pesanans,
            'produks'=>$produks,
            'sumbers'=>$sumbers
        ]);
    }
    public function add_proses(PesananRequest $request){
        $request->add();
        return back()->with('success', "Pesanan ditambahkan");
    }
    public function edit_proses(PesananRequest $request, $id){
        $request->edit($id);
        return back()->with('success', "Pesanan berhasil diubah");
    }
    public function delete_proses($id){
        Pesanan::find($id)->delete();
        return back()->with('success', "Pesanan berhasil dihapus");
    }
    public function detail($id){
        $detail = Pesanan::with('produk')->with('user')->with('sumber')->find($id);
        return view('pesanan/detail',[
            'detail'=>$detail
        ]);
    }
    public function status_proses(Request $request, $id){
        Pesanan::find($id)->update([
            'status'=>$request->status
        ]);
        return back()->with('success', 'Status diubah');
    }
}
