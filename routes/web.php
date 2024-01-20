<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\Produk\ProdukController;
use App\Http\Controllers\Produk\KategoriController;
use App\Http\Controllers\Page\PageController;
use App\Http\Controllers\Page\KategoriPageController;
use App\Http\Controllers\Pesanan\PesananController;
use App\Http\Controllers\Pesanan\SumberPesananController;
use App\Http\Controllers\Home\SliderController;
use App\Http\Controllers\Home\BannerController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\KontakController;
use Illuminate\Support\Facades\Route;
use App\Models\Role;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   return redirect('login');
});

Route::get('/dashboard', function () {
   return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
   Route::group(['prefix'=>'user'], function(){
      Route::get('/list', [UserController::class, 'list'])->name('user.list')->can('gateAll');
      Route::get('/create', [UserController::class, 'create'])->name('user.create')->can('gateAll');
      Route::post('/create/proses', [UserController::class, 'create_proses'])->name('user.create.proses')->can('gateAll');
      Route::get('/role', [RoleController::class, 'role'])->name('user.role')->can('gateAll');
      Route::post('/role/{id}/edit/proses', [RoleController::class, 'edit_proses'])->name('user.role.edit.proses')->can('gateAll');
      Route::post('/role/add/proses', [RoleController::class, 'add_proses'])->name('user.role.add.proses')->can('gateAll');
      Route::post('/role/delete/{id}/proses', [RoleController::class, 'delete_proses'])->name('user.role.delete.proses')->can('gateAll');
   });
   Route::group(['prefix'=>'produk'], function(){
      Route::get('/add', [ProdukController::class, 'add'])->name('produk.add')->can('gateAll');
      Route::get('/detail/{id}', [ProdukController::class, 'detail'])->name('produk.detail')->can('gateAll');
      Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit')->can('gateAll');
      Route::get('/list', [ProdukController::class, 'list'])->name('produk.list')->can('gateAll');
      Route::post('/add/proses', [ProdukController::class, 'add_Proses'])->name('produk.add.proses')->can('gateAll');
      Route::post('/edit/{id}/proses', [ProdukController::class, 'edit_Proses'])->name('produk.edit.proses')->can('gateAll');
      Route::post('/edit/{id}/delete', [ProdukController::class, 'edit_Delete'])->name('produk.delete.proses')->can('gateAll');
      Route::group(['prefix'=>'kategori'], function(){
         Route::get('/', [KategoriController::class, 'kategori'])->name('produk.kategori')->can('gateAll');
         Route::post('/add/proses', [KategoriController::class, 'kategori_add_proses'])->name('produk.kategori.add.proses')->can('gateAll');
         Route::post('/edit/{id}/proses', [KategoriController::class, 'edit_proses'])->name('produk.kategori.edit.proses')->can('gateAll');
         Route::post('/delete/proses', [KategoriController::class, 'delete'])->name('produk.kategori.delete.proses')->can('gateAll');
      });
   });
   Route::group(['prefix'=>'page'], function(){
      Route::get('/list', [PageController::class, 'list'])->name('page.list')->can('gateAll');
      Route::get('/add', [PageController::class, 'add'])->name('page.add')->can('gateAll');
      Route::get('/edit/{id}', [PageController::class, 'edit'])->name('page.edit')->can('gateAll');
      Route::post('/edit/{id}/proses', [PageController::class, 'edit_proses'])->name('page.edit.proses')->can('gateAll');
      Route::post('/delete/{id}/proses', [PageController::class, 'delete_proses'])->name('page.delete.proses')->can('gateAll');
      Route::post('/add/proses', [PageController::class, 'add_proses'])->name('page.add.proses')->can('gateAll');
      Route::group(['prefix'=>'kategori'], function(){
         Route::get('/list', [KategoriPageController::class, 'list'])->name('page.kategori.list')->can('gateAll');
         Route::post('/add/proses', [KategoriPageController::class, 'add_proses'])->name('page.kategori.add.proses')->can('gateAll');
         Route::post('/edit/{id}/proses', [KategoriPageController::class, 'edit_proses'])->name('page.kategori.edit.proses')->can('gateAll');
         Route::post('/delete/{id}/proses', [KategoriPageController::class, 'delete_proses'])->name('page.kategori.delete.proses')->can('gateAll');
      });
   });
   Route::group(['prefix'=>'pesanan'], function(){
      Route::get('/list', [PesananController::class, 'list'])->name('pesanan.list')->can('gateAll');
      Route::post('/add/proses', [PesananController::class, 'add_proses'])->name('pesanan.add.proses')->can('gateAll');
      Route::post('/edit/{id}/proses', [PesananController::class, 'edit_proses'])->name('pesanan.edit.proses')->can('gateAll');
      Route::post('/delete/{id}/proses', [PesananController::class, 'delete_proses'])->name('pesanan.delete.proses')->can('gateAll');
      Route::get('/detail/{id}', [PesananController::class, 'detail'])->name('pesanan.detail')->can('gateAll');
      Route::post('/detail/{id}/status/proses', [PesananController::class, 'status_proses'])->name('pesanan.status.proses')->can('gateAll');
      Route::group(['prefix'=>'sumberPesanan'], function(){ 
         Route::get('/list/sumber', [SumberPesananController::class, 'sumber_list'])->name('pesanan.sumber.list')->can('gateAll');
         Route::post('/list/sumber/add/proses', [SumberPesananController::class, 'sumber_add_proses'])->name('pesanan.sumber.add.proses')->can('gateAll');
         Route::post('/list/sumber/edit/{id}/proses', [SumberPesananController::class, 'sumber_edit_proses'])->name('pesanan.sumber.edit.proses')->can('gateAll');
         Route::post('/list/sumber/delete/{id}/proses', [SumberPesananController::class, 'sumber_delete_proses'])->name('pesanan.sumber.delete.proses')->can('gateAll');
      });
   });
   Route::group(['prefix'=>'home'], function(){
      Route::group(['prefix'=>'slider'], function(){
         Route::get('list', [SliderController::class, 'list'])->name('home.slider.list')->can('gateAll');
         Route::post('add/proses', [SliderController::class, 'add_proses'])->name('home.slider.add.proses')->can('gateAll');
         Route::post('edit/{id}/proses', [SliderController::class, 'edit_proses'])->name('home.slider.edit.proses')->can('gateAll');
         Route::post('delete/{id}/proses', [SliderController::class, 'delete_proses'])->name('home.slider.delete.proses')->can('gateAll');
      });
      Route::group(['prefix'=>'banner'], function(){
         Route::get('list', [SliderController::class, 'list'])->name('home.banner.list')->can('gateAll');
         Route::post('add/proses', [BannerController::class, 'add_proses'])->name('home.banner.add.proses')->can('gateAll');
         Route::post('edit/{id}/proses', [BannerController::class, 'edit_proses'])->name('home.banner.edit.proses')->can('gateAll');
         Route::post('delete/{id}/proses', [BannerController::class, 'delete_proses'])->name('home.banner.delete.proses')->can('gateAll');
      });
   });
   Route::group(['prefix'=>'subcribe'], function(){
      Route::get('/list', [SubscribeController::class, 'list'])->name('subcribe.list')->can('gateAll');
      Route::get('/add/proses', [SubscribeController::class, 'add_proses'])->name('subcribe.add.proses')->can('gateAll');
   });
   Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit')->can('gateAll');
   Route::get('/profile/detail/{id}', [ProfileController::class, 'detail'])->name('profile.detail')->can('gateAll');
   Route::post('/profile/edit/{id}/proses', [ProfileController::class, 'edit_proses'])->name('profile.edit.proses')->can('gateAll');

   Route::get('/kontak', [KontakController::class, 'kontak'])->name('kontak');
   
   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   Route::get('/coba', function(){
      return "test mamang";
   });
});

require __DIR__.'/auth.php';
