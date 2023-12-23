<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class RoleService
{
    public function role():collection{
        $role = Role::paginate(20);
        return $role;
    }


    public function edit_proses($request, $id): Collection{  
        Validator::make($request->all(), [
            'role' => [
                'required',
                Rule::unique('roles')->ignore($id, 'role'),
            ],
        ]); 
        $role = Role::find($id)->update($this->data($request));
        return collect(["result"=>"role berhasil di ubah"]);
    }


    public function add_proses($request): Collection{  
        $request->validate([
            'role'=>'required|unique:roles'
        ]); 
        $role = Role::create($this->data($request));
        return collect(["result"=>"role berhasil di tambahkan"]);
    }


    public function delete_proses($id){
        User::where('role_id', $id)->update([
            'status'=>'tidak aktif'
        ]);
        Role::find($id)->delete();
        return collect(["result"=>"role berhasil di hapus"]);
    }


    public function data($request): array{
        return [
            'role'=>$request->role,
            'userList'=>$request->userList != null ? $request->userList : 'tidak aktif',
            'userCreate'=>$request->userCreate != null ? $request->userCreate : 'tidak aktif',
            'userEdit'=>$request->userEdit != null ? $request->userEdit : 'tidak aktif',
            'user_aksesEdit'=>$request->user_aksesEdit != null ? $request->user_aksesEdit : 'tidak aktif',
            'user_aksesCreate'=>$request->user_aksesCreate != null ? $request->user_aksesCreate : 'tidak aktif',
            'user_aksesList'=>$request->user_aksesList != null ? $request->user_aksesList : 'tidak aktif',
            'user_aksesDelete'=>$request->user_aksesList != null ? $request->user_aksesList : 'tidak aktif',
            'produkList'=>$request->produkList != null ? $request->produkList : 'tidak aktif',
            'produkCreate'=>$request->produkCreate != null ? $request->produkCreate : 'tidak aktif',
            'produkEdit'=>$request->produkEdit != null ? $request->produkEdit : 'tidak aktif',
            'produkDelete'=>$request->produkDelete != null ? $request->produkDelete : 'tidak aktif',
            'produkKategoriList'=>$request->produkKategoriList != null ? $request->produkKategoriList : 'tidak aktif',
            'produkKategoriCreate'=>$request->produkKategoriCreate != null ? $request->produkKategoriCreate : 'tidak aktif',
            'produkKategoriEdit'=>$request->produkKategoriEdit != null ? $request->produkKategoriEdit : 'tidak aktif',
            'produkKategoriDelete'=>$request->produkKategoriDelete != null ? $request->produkKategoriDelete : 'tidak aktif',
            'sliderList'=>$request->sliderList != null ? $request->sliderList : 'tidak aktif',
            'sliderCreate'=>$request->sliderCreate != null ? $request->sliderCreate : 'tidak aktif',
            'sliderEdit'=>$request->sliderEdit != null ? $request->sliderEdit : 'tidak aktif',
            'sliderDelete'=>$request->sliderDelete != null ? $request->sliderDelete : 'tidak aktif',
            'bannerEdit'=>$request->bannerEdit != null ? $request->bannerEdit : 'tidak aktif',
            'bannerCreate'=>$request->bannerCreate != null ? $request->bannerCreate : 'tidak aktif',
            'bannerList'=>$request->bannerList != null ? $request->bannerList : 'tidak aktif',
            'bannerDelete'=>$request->bannerDelete != null ? $request->bannerDelete : 'tidak aktif',
            'pageList'=>$request->pageList != null ? $request->pageList : 'tidak aktif',
            'pageCreate'=>$request->pageCreate != null ? $request->pageCreate : 'tidak aktif',
            'pageEdit'=>$request->pageEdit != null ? $request->pageEdit : 'tidak aktif',
            'pageDelete'=>$request->pageDelete != null ? $request->pageDelete : 'tidak aktif',
            'pageKategoriList'=>$request->pageKategoriList != null ? $request->pageKategoriList : 'tidak aktif',
            'pageKategoriCreate'=>$request->pageKategoriCreate != null ? $request->pageKategoriCreate : 'tidak aktif',
            'pageKategoriEdit'=>$request->pageKategoriEdit != null ? $request->pageKategoriEdit : 'tidak aktif',
            'pageKategoriDelete'=>$request->pageKategoriDelete != null ? $request->pageKategoriDelete : 'tidak aktif',
            'pesananList'=>$request->pesananList != null ? $request->pesananList : 'tidak aktif',
            'pesananCreate'=>$request->pesananCreate != null ? $request->pesananCreate : 'tidak aktif',
            'pesananEdit'=>$request->pesananEdit != null ? $request->pesananEdit : 'tidak aktif',
            'pesananDelete'=>$request->pesananDelete != null ? $request->pesananDelete : 'tidak aktif',
            'pesananSumberList'=>$request->pesananSumberList != null ? $request->pesananSumberList : 'tidak aktif',
            'pesananSumberCreate'=>$request->pesananSumberCreate != null ? $request->pesananSumberCreate : 'tidak aktif',
            'pesananSumberEdit'=>$request->pesananSumberEdit != null ? $request->pesananSumberEdit : 'tidak aktif',
            'pesananSumberDelete'=>$request->pesananSumberDelete != null ? $request->pesananSumberDelete : 'tidak aktif',
            'subscribe'=>$request->subscribe != null ? $request->subscribe : 'tidak aktif',
            'profile'=>'aktif',
            ];
    }
}