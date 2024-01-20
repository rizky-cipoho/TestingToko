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
    public function messages(){
        return [
            'kategori.required'=>'the category field is required',
            'judul_id.required'=>'the title ID field is required',
            'judul_en.required'=>'the title EN field is required',
            'deskripsi_id.required'=>'the description ID field is required',
            'deskripsi_en.required'=>'the description EN field is required',
            'harga_id.required'=>'the price ID field is required',
            'harga_en.required'=>'the price EN field is required',
            'diskon_id.required'=>'the discon ID field is required',
            'diskon_en.required'=>'the discon EN field is required',
            'modal_id.required'=>'the modal ID field is required',
            'modal_en.required'=>'the modal EN field is required',
            'kode_sku.required'=>'the product code field is required',
            'link_video.required'=>'the link video field is required',
            'gambar.required'=>'the image field is required',
            'gambar_produk.*.gambar.required'=>'the image product field is required',
            'status.required'=>'the status field is required',
            'warna.*.warna.required'=>'the color field is required',
            'warna.*.gambar_warna.required'=>'the image color field is required',
            'warna.*.kode_warna.required'=>'the kode color field is required',
            'warna.*.status_warna.required'=>'the status color field is required',
            'size.*.size_id.required'=>'the size ID field is required',
            'size.*.size_en.required'=>'the size EN field is required',
            'size.*.status_size.required'=>'the status size field is required',
            'link.*.judul_link.required'=>'the judul link field is required',
            'link.*.link.required'=>'the judul link field is required',
            'link.*.target.required'=>'the link target field is required',
            'link.*.status_link.required'=>'the status link field is required',
        ];
    }
}
