<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LinkProdukResource extends JsonResource
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
            'judul_link'=>$this->judul_link,
            'kategori'=>$this->kategori,
            'id_produk'=>$this->id_produk,
            'link'=>$this->link,
            'icon'=>$this->icon,
            'text_tombol'=>$this->text_tombol,
            'status'=>$this->status,
            'target'=>$this->target,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,

        ];
    }
}
