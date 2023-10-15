<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\User_attachment;
use App\Models\Role;
use App\Models\Kategori;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $role = Role::create([
            'role'=>'super admin',
            'userList'=>'aktif',
            'userCreate'=>'aktif',
            'userEdit'=>'aktif',
            'user_aksesList'=>'aktif',
            'user_aksesCreate'=>'aktif',
            'user_aksesEdit'=>'aktif',
            'user_aksesDelete'=>'aktif',
            'produkList'=>'aktif',
            'produkCreate'=>'aktif',
            'produkEdit'=>'aktif',
            'produkDelete'=>'aktif',
            'produkKategoriList'=>'aktif',
            'produkKategoriCreate'=>'aktif',
            'produkKategoriEdit'=>'aktif',
            'produkKategoriDelete'=>'aktif',
            'sliderList'=>'aktif',
            'sliderCreate'=>'aktif',
            'sliderEdit'=>'aktif',
            'sliderDelete'=>'aktif',
            'bannerList'=>'aktif',
            'bannerCreate'=>'aktif',
            'bannerEdit'=>'aktif',
            'bannerDelete'=>'aktif',
            'pageList'=>'aktif',
            'pageCreate'=>'aktif',
            'pageEdit'=>'aktif',
            'pageDelete'=>'aktif',
            'pageKategoriList'=>'aktif',
            'pageKategoriCreate'=>'aktif',
            'pageKategoriEdit'=>'aktif',
            'pageKategoriDelete'=>'aktif',
            'pesananList'=>'aktif',
            'pesananCreate'=>'aktif',
            'pesananEdit'=>'aktif',
            'pesananDelete'=>'aktif',
            'pesananSumberList'=>'aktif',
            'pesananSumberCreate'=>'aktif',
            'pesananSumberEdit'=>'aktif',
            'pesananSumberDelete'=>'aktif',
            'subscribe'=>'aktif',
        ]);
        Role::create([
                        'role'=>'super admin',
            'userList'=>'tidak aktif',
            'userCreate'=>'tidak aktif',
            'userEdit'=>'tidak tidak aktif',
            'user_aksesList'=>'tidak aktif',
            'user_aksesCreate'=>'tidak aktif',
            'user_aksesEdit'=>'tidak aktif',
            'user_aksesDelete'=>'aktif',
            'produkList'=>'aktif',
            'produkCreate'=>'aktif',
            'produkEdit'=>'aktif',
            'produkDelete'=>'aktif',
            'produkKategoriList'=>'aktif',
            'produkKategoriCreate'=>'aktif',
            'produkKategoriEdit'=>'aktif',
            'produkKategoriDelete'=>'aktif',
            'sliderList'=>'aktif',
            'sliderCreate'=>'aktif',
            'sliderEdit'=>'aktif',
            'sliderDelete'=>'aktif',
            'bannerList'=>'aktif',
            'bannerCreate'=>'aktif',
            'bannerEdit'=>'aktif',
            'bannerDelete'=>'aktif',
            'pageList'=>'aktif',
            'pageCreate'=>'aktif',
            'pageEdit'=>'aktif',
            'pageDelete'=>'aktif',
            'pageKategoriList'=>'aktif',
            'pageKategoriCreate'=>'aktif',
            'pageKategoriEdit'=>'aktif',
            'pageKategoriDelete'=>'aktif',
            'pesananList'=>'aktif',
            'pesananCreate'=>'aktif',
            'pesananEdit'=>'aktif',
            'pesananDelete'=>'aktif',
            'pesananSumberList'=>'aktif',
            'pesananSumberCreate'=>'aktif',
            'pesananSumberEdit'=>'aktif',
            'pesananSumberDelete'=>'aktif',
            'subscribe'=>'aktif',
        ]);
        Role::create([
                        'role'=>'super admin',
            'userList'=>'tidak aktif',
            'userCreate'=>'tidak aktif',
            'userEdit'=>'tidak tidak aktif',
            'user_aksesList'=>'tidak aktif',
            'user_aksesCreate'=>'tidak aktif',
            'user_aksesEdit'=>'tidak aktif',
            'user_aksesDelete'=>'aktif',
            'produkList'=>'aktif',
            'produkCreate'=>'aktif',
            'produkEdit'=>'aktif',
            'produkDelete'=>'tidak aktif',
            'produkKategoriList'=>'tidak aktif',
            'produkKategoriCreate'=>'tidak aktif',
            'produkKategoriEdit'=>'tidak aktif',
            'produkKategoriDelete'=>'tidak aktif',
            'sliderList'=>'aktif',
            'sliderCreate'=>'aktif',
            'sliderEdit'=>'aktif',
            'sliderDelete'=>'aktif',
            'bannerList'=>'aktif',
            'bannerCreate'=>'aktif',
            'bannerEdit'=>'aktif',
            'bannerDelete'=>'aktif',
            'pageList'=>'aktif',
            'pageCreate'=>'aktif',
            'pageEdit'=>'aktif',
            'pageDelete'=>'aktif',
            'pageKategoriList'=>'aktif',
            'pageKategoriCreate'=>'aktif',
            'pageKategoriEdit'=>'aktif',
            'pageKategoriDelete'=>'aktif',
            'pesananList'=>'aktif',
            'pesananCreate'=>'aktif',
            'pesananEdit'=>'aktif',
            'pesananDelete'=>'aktif',
            'pesananSumberList'=>'aktif',
            'pesananSumberCreate'=>'aktif',
            'pesananSumberEdit'=>'aktif',
            'pesananSumberDelete'=>'aktif',
            'subscribe'=>'aktif',
        ]);
        Kategori::create([
            'kategori_id'=>'tes',
            'kategori_en'=>'test',
            'status'=>0
        ]);
        Kategori::create([
            'kategori_id'=>'kucing',
            'kategori_en'=>'cat',
            'status'=>0
        ]);
        $user = User::create([
            'name'=>"rizky",
            'username'=>"rizkyAdmin",
            'password'=>Hash::make('asdasdasd'),
            'role_id'=>$role->id
        ]);
        User_attachment::create([
            'image'=>"sample.png",
            'path'=>'/images/',
            'user_id'=>$user->id,
        ]);
    }
}
