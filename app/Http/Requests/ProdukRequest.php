<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Produk;
use App\Models\Warna_produk;
use App\Models\Ukuran_produk;
use App\Models\Master_link;
use App\Models\Gambar_produk;
use Illuminate\Support\Facades\Auth;

class ProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'modal_id'=>'required',
            'modal_en'=>'required',
            'kode_sku'=>'required',
            'link_video'=>'required',
            'gambar'=>'required',
            'gambar_produk.*.gambar'=>'required',
            'status'=>'required',
            'warna.*.warna'=>'required',
            'warna.*.gambar_warna'=>'required',
            'warna.*.kode_warna'=>'required',
            'warna.*.status_warna'=>'required',
            'size.*.size_id'=>'required',
            'size.*.size_en'=>'required',
            'size.*.status_size'=>'required',
            'link.*.judul_link'=>'required',
            'link.*.link'=>'required',
            'link.*.target'=>'required',
            'link.*.status_link'=>'required',
        ];
    }
    
}
