<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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
            'role'=>$this->role,
            'userList'=>$this->userList,
            'userCreate'=>$this->userCreate,
            'userEdit'=>$this->userEdit,
            'user_aksesList'=>$this->user_aksesList,
            'user_aksesCreate'=>$this->user_aksesCreate,
            'user_aksesEdit'=>$this->user_aksesEdit,
            'user_aksesDelete'=>$this->user_aksesDelete,
            'produkList'=>$this->produkList,
            'produkCreate'=>$this->produkCreate,
            'produkEdit'=>$this->produkEdit,
            'produkDelete'=>$this->produkDelete,
            'produkKategoriList'=>$this->produkKategoriList,
            'produkKategoriCreate'=>$this->produkKategoriCreate,
            'produkKategoriEdit'=>$this->produkKategoriEdit,
            'produkKategoriDelete'=>$this->produkKategoriDelete,
            'sliderList'=>$this->sliderList,
            'sliderCreate'=>$this->sliderCreate,
            'sliderEdit'=>$this->sliderEdit,
            'sliderDelete'=>$this->sliderDelete,
            'bannerList'=>$this->bannerList,
            'bannerCreate'=>$this->bannerCreate,
            'bannerEdit'=>$this->bannerEdit,
            'bannerDelete'=>$this->bannerDelete,
            'pageList'=>$this->pageList,
            'pageCreate'=>$this->pageCreate,
            'pageEdit'=>$this->pageEdit,
            'pageDelete'=>$this->pageDelete,
            'pageKategoriList'=>$this->pageKategoriList,
            'pageKategoriCreate'=>$this->pageKategoriCreate,
            'pageKategoriEdit'=>$this->pageKategoriEdit,
            'pageKategoriDelete'=>$this->pageKategoriDelete,
            'pesananList'=>$this->pesananList,
            'pesananCreate'=>$this->pesananCreate,
            'pesananEdit'=>$this->pesananEdit,
            'pesananDelete'=>$this->pesananDelete,
            'pesananSumberList'=>$this->pesananSumberList,
            'pesananSumberCreate'=>$this->pesananSumberCreate,
            'pesananSumberEdit'=>$this->pesananSumberEdit,
            'pesananSumberDelete'=>$this->pesananSumberDelete,
            'subscribe'=>$this->subscribe,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
