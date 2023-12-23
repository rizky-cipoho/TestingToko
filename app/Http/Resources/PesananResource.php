<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProdukResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\SumberPesananResource;

class PesananResource extends JsonResource
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
            'produk_id'=>$this->produk_id,
            'produk'=>new ProdukResource($this->whenloaded('produk')),
            'user_id'=>$this->user_id,
            'user'=>new UserResource($this->whenloaded('user')),
            'nama'=>$this->nama,
            'qty'=>$this->qty,
            'status'=>$this->status,
            'alamat'=>$this->alamat,
            'deskripsi'=>$this->deskripsi,
            'sumber_id'=>$this->sumber_id,
            'sumber'=>new SumberPesananResource($this->whenloaded('sumber')),
            'telepon'=>$this->telepon,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
