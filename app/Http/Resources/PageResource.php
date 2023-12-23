<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PageResource;

class PageResource extends JsonResource
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
            'judul_id'=>$this->judul_id, 
            'judul_en'=>$this->judul_en, 
            'artikel_id'=>$this->artikel_id, 
            'artikel_en'=>$this->artikel_en, 
            'id_user'=>$this->id_user, 
            'kategori_id'=>$this->kategori_id,  
            'kategori'=>new PageResource($this->whenloaded('kategori')), 
            'status'=>$this->status, 
            'created_at'=>$this->created_at, 
            'updated_at'=>$this->updated_at, 
        ];
    }
}
