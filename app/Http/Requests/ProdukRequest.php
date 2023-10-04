<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Produk;
use App\Models\Warna_produk;
use App\Models\Ukuran_produk;
use App\Models\Master_link;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Auth;

class ProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    use ImageTrait;
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kategori'=>'required',
            'judul_id'=>'required',
            'judul_en'=>'required',
            'deskripsi_id'=>'required',
            'deskripsi_en'=>'required',
            'harga_id'=>'required',
            'harga_en'=>'required',
            'diskon_id'=>'required',
            'diskon_en'=>'required',
            'kode_sku'=>'required',
            'link_video'=>'required',
            'gambar'=>'required',
            'status'=>'required',
            'warna'=>'required',
            'size'=>'required',
            'link'=>'required',
        ];
    }
    public function add(){
        // dd($this->warna);        
        $gambar = $this->resize($this->gambar);

        // $this->resize($this->gambar);
        // $kategori = 
        $produk = Produk::create([
            'id_kategori'=>$this->kategori,
            'judul_id'=>$this->judul_id,
            'judul_en'=>$this->judul_en,
            'deskripsi_id'=>$this->deskripsi_id,
            'deskripsi_en'=>$this->deskripsi_en,
            'harga_id'=>$this->harga_id,
            'harga_en'=>$this->harga_en,
            'diskon_id'=>$this->diskon_id,
            'diskon_en'=>$this->diskon_en,
            'kode_sku'=>$this->kode_sku,
            'link_video'=>$this->link_video,
            'gambar'=>'/'.$gambar->dirname.'/'.$gambar->basename,
            'status'=>$this->status,
            'id_user'=>Auth::user()->id,
        ]);

        foreach($this->warna as $warna){
        // dd($warna['warna']);

            $warnaGambar = $this->resize($warna['gambar_warna']);

            Warna_produk::create([
                'id_produk'=>$produk->id,
                'warna'=>$warna['warna'],
                'kode_warna'=>$warna['kode_warna'],
                'status'=>$warna['status_warna'],
                'gambar'=>'/'.$warnaGambar->dirname.'/'.$warnaGambar->basename,
            ]);
        }
        foreach($this->size as $size){
            Ukuran_produk::create([
                'id_produk'=>$produk->id,
                'ukuran_id'=>$size['size_id'],
                'ukuran_en'=>$size['size_en'],
                'status'=>$size['status_size'],
            ]);
        }
        foreach($this->link as $link){
            Master_link::create([
                'id_produk'=>$produk->id,
                'judul_link'=>$link['judul_link'],
                'link'=>$link['link'],
                'target'=>$link['target'],
                'status'=>$link['status_link'],
            ]);
        }
    }
}
