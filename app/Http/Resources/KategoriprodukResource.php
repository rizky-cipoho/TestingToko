<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProdukResource;
class KategoriprodukResource extends JsonResource
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
            'kategori_id'=>$this->kategori_id,
            'kategori_en'=>$this->kategori_en,
            'status'=>$this->status,
            'produks'=>ProdukResource::collection($this->whenloaded('produk')),
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
