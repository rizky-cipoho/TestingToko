<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
    * The model to policy mappings for the application.
    *
    * @var array<class-string, class-string>
    */
    protected $policies = [
        // 'App\Models\Role' => 'App\policies\RolePolicy'  
    ];
    
    /**
    * Register any authentication / authorization services.
    */
    public function boot(): void
    {
        Gate::define('gateAll', function(User $user){
            $currentPath = Route::getFacadeRoot()->current()->action['as'];
            $result = false;
            $role = $user->with('role')->first();
            // dd($role);
            $routeAll = collect([
                'userList'=>['user.list','profile.detail'],
                'userCreate'=>'user.create',
                'userEdit'=>['profile.edit','profile.edit.proses'],
                'user_aksesList'=>'user.role',
                'user_aksesCreate'=>'user.role.add.proses',
                'user_aksesEdit'=>'user.role.edit.proses',
                'user_aksesDelete'=>'user.role.delete.proses',
                'produkList'=>['produk.list','produk.detail'],
                'produkCreate'=>['produk.add', 'produk.add.proses'],
                'produkEdit'=>['produk.edit', 'produk.edit.proses'],
                'produkDelete'=>'produk.delete.proses',
                'produkKategoriList'=>'produk.kategori',
                'produkKategoriCreate'=>'produk.kategori.add.proses',
                'produkKategoriEdit'=>'produk.kategori.edit.proses',
                'produkKategoriDelete'=>'produk.kategori.delete.proses',
                'sliderList'=>'home.slider.list',
                'sliderCreate'=>'home.slider.add.proses',
                'sliderEdit'=>'home.slider.edit.proses',
                'sliderDelete'=>'home.slider.delete.proses',
                'bannerList'=>'home.banner.list',
                'bannerCreate'=>'home.banner.add.proses',
                'bannerEdit'=>'home.banner.edit.proses',
                'bannerDelete'=>'home.banner.delete.proses',
                'pageList'=>'page.list',
                'pageCreate'=>['page.add','page.add.proses'],
                'pageEdit'=>['page.edit','page.edit.proses'],
                'pageDelete'=>'page.delete.proses',
                'pageKategoriList'=>'page.kategori.list',
                'pageKategoriCreate'=>'page.kategori.add.proses',
                'pageKategoriEdit'=>'page.kategori.edit.proses',
                'pageKategoriDelete'=>'page.kategori.delete.proses',
                'pesananList'=>['pesanan.list','pesanan.detail','pesanan.status.list'],
                'pesananCreate'=>'pesanan.add.proses',
                'pesananEdit'=>'pesanan.edit.proses',
                'pesananDelete'=>'pesanan.delete.proses',
                'pesananSumberList'=>'pesanan.sumber.list',
                'pesananSumberCreate'=>'pesanan.sumber.add.proses',
                'pesananSumberEdit'=>'pesanan.sumber.edit.proses',
                'pesananSumberDelete'=>'pesanan.sumber.delete.proses',
                'profile'=>'profile.detail',
                'subscribe'=>'subscribe',
            ]);
            
            foreach($routeAll as $index=>$routeUnit){
                if(is_array($routeUnit)){
                    foreach($routeUnit as $unit){
                        if($currentPath == $unit){
                            $result = $role->role[$index] == 'aktif' ? true : false;
                        }
                    }
                }else{
                    if($currentPath == $routeUnit){
                        $result = $role->role[$index] == 'aktif' ? true : false;
                    }
                }
            }
            
            return $result;
        });
    }
}
