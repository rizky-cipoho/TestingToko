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
            'role'=>'super admin'
        ]);
        Role::create([
            'role'=>'admin'
        ]);
        Role::create([
            'role'=>'HR'
        ]);
        Kategori::create([
            'kategori_id'=>'tes',
            'kategori_en'=>'test',
            'status'=>1
        ]);
        Kategori::create([
            'kategori_id'=>'kucing',
            'kategori_en'=>'cat',
            'status'=>1
        ]);
        $user = User::create([
            'name'=>"rizky",
            'username'=>"rizkyAdmin",
            'password'=>Hash::make('asdasdasd'),
            'role_id'=>$role->id
        ]);
        User_attachment::create([
            'image'=>"sample.png",
            'height'=>1371,
            'width'=>2000,
            'size'=>342000,
            'path'=>'/images/',
            'user_id'=>$user->id,
        ]);
    }
}
