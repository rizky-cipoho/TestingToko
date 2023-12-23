<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\WarnaProdukResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\KategoriProdukResource;
use App\Http\Resources\UkuranProdukResource;
use App\Http\Resources\LinkProdukResource;
use App\Http\Resources\GambarProdukResource;

class ProdukResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'id_kategori'=>$this->id_kategori,
            'judul_id'=>$this->judul_id,
            'judul_en'=>$this->judul_en,
            'deskripsi_id'=>$this->deskripsi_id,
            'deskripsi_en'=>$this->deskripsi_en,
            'modal_id'=>$this->modal_id,
            'modal_en'=>$this->modal_en,
            'harga_id'=>$this->harga_id,
            'harga_en'=>$this->harga_en,
            'diskon_id'=>$this->diskon_id,
            'diskon_en'=>$this->diskon_en,
            'kode_sku'=>$this->kode_sku,
            'link_video'=>$this->link_video,
            'gambar_original'=>$this->gambar_original,
            'gambar'=>$this->gambar,
            'status'=>$this->status,
            'id_user'=>$this->id_user,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
            'warna'=>WarnaProdukResource::collection($this->whenloaded('warna')),
            'user'=>new UserResource($this->whenloaded('user')),
            'kategori'=>new KategoriProdukResource($this->whenloaded('kategori')),
            'ukuran'=>UkuranProdukResource::collection($this->whenloaded('ukuran')),
            'link'=>LinkProdukResource::collection($this->whenloaded('link')),
            'image'=>GambarProdukResource::collection($this->whenloaded('image')),
        ];
    }
}
