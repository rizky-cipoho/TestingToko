<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\User\RoleController;
use App\Http\Controllers\Api\Produk\ProdukController;
use App\Http\Controllers\Api\Produk\KategoriController;
use App\Http\Controllers\Api\Page\PageController;
use App\Http\Controllers\Api\Page\KategoriPageController;
use App\Http\Controllers\Api\Pesanan\PesananController;
use App\Http\Controllers\Api\Pesanan\SumberPesananController;
use App\Http\Controllers\Api\Home\SliderController;
use App\Http\Controllers\Api\Home\BannerController;
use App\Http\Controllers\Api\SubscribeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [AuthenticatedSessionController::class, 'authApi']);
Route::middleware('auth:sanctum')->group(function(){
    Route::group(['prefix'=>'user'], function(){
        Route::get('/list', [UserController::class, 'list']);
        Route::post('/create', [UserController::class, 'create_proses']);
        Route::post('/edit/{id}/proses', [UserController::class, 'edit_proses'])->name('profile.edit.proses')->can('gateAll'); 
        Route::group(['prefix'=>'role'], function(){
            Route::get('/', [RoleController::class, 'role'])->name('user.role')->can('gateAll');
            Route::post('/{id}/edit', [RoleController::class, 'edit_proses'])->name('user.role.edit.proses')->can('gateAll');
            Route::post('/add', [RoleController::class, 'add_proses'])->name('user.role.add.proses')->can('gateAll');
            Route::post('/{id}/delete', [RoleController::class, 'delete_proses'])->name('user.role.delete.proses')->can('gateAll');
        });
    });
    Route::group(['prefix'=>'produk'], function(){
        Route::post('/add/proses', [ProdukController::class, 'add_Proses'])->name('produk.add.proses')->can('gateAll');        
        Route::get('/{id}/detail', [ProdukController::class, 'detail'])->name('produk.detail')->can('gateAll');
        Route::get('/list', [ProdukController::class, 'list'])->name('produk.list')->can('gateAll');
        Route::post('/{id}/edit/proses', [ProdukController::class, 'edit_Proses'])->name('produk.edit.proses')->can('gateAll');
        Route::post('/{id}/delete', [ProdukController::class, 'delete'])->name('produk.delete.proses')->can('gateAll');
        Route::group(['prefix'=>'kategori'], function(){
            Route::get('/list', [KategoriController::class, 'list'])->name('produk.kategori')->can('gateAll');
            Route::get('/list/produk', [KategoriController::class, 'listAndProduk'])->name('produk.kategori')->can('gateAll');
            Route::post('/add/proses', [KategoriController::class, 'kategori_add_proses'])->name('produk.kategori.add.proses')->can('gateAll');
            Route::post('/{id}/edit/proses', [KategoriController::class, 'edit_proses'])->name('produk.kategori.edit.proses')->can('gateAll');
            Route::post('/{id}/delete/proses', [KategoriController::class, 'delete'])->name('produk.kategori.delete.proses')->can('gateAll');
        });
        
    });
    Route::group(['prefix'=>'page'], function(){
        Route::get('/list', [PageController::class, 'list'])->name('page.list')->can('gateAll');
        Route::get('/{id}/detail', [PageController::class, 'detail'])->name('page.list')->can('gateAll');
        Route::post('/add/proses', [PageController::class, 'add_proses'])->name('page.add.proses')->can('gateAll');
        Route::post('/{id}/edit', [PageController::class, 'edit_proses'])->name('page.edit.proses')->can('gateAll');
        Route::post('/{id}/delete', [PageController::class, 'delete'])->name('page.delete.proses')->can('gateAll');
        Route::group(['prefix'=>'kategori'], function(){
            Route::get('/list', [KategoriPageController::class, 'list'])->name('page.kategori.list')->can('gateAll');
            Route::post('/add/proses', [KategoriPageController::class, 'add_proses'])->name('page.kategori.add.proses')->can('gateAll');
            Route::post('/edit/{id}/proses', [KategoriPageController::class, 'edit_proses'])->name('page.kategori.edit.proses')->can('gateAll');
            Route::get('/{id}/detail', [KategoriPageController::class, 'detail'])->name('page.kategori.edit.proses')->can('gateAll');
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
            Route::get('/list', [SumberPesananController::class, 'sumber_list'])->name('pesanan.sumber.list')->can('gateAll');
            Route::get('/{id}/detail', [SumberPesananController::class, 'detail'])->name('pesanan.sumber.list')->can('gateAll');
            Route::post('/add/proses', [SumberPesananController::class, 'sumber_add_proses'])->name('pesanan.sumber.add.proses')->can('gateAll');
            Route::post('/edit/{id}/proses', [SumberPesananController::class, 'sumber_edit_proses'])->name('pesanan.sumber.edit.proses')->can('gateAll');
            Route::post('/delete/{id}/proses', [SumberPesananController::class, 'sumber_delete_proses'])->name('pesanan.sumber.delete.proses')->can('gateAll');
        });
    });
    Route::group(['prefix'=>'home'], function(){
        Route::group(['prefix'=>'slider'], function(){
            Route::get('list', [SliderController::class, 'list'])->name('home.slider.list')->can('gateAll');
            Route::get('{id}/detail', [SliderController::class, 'list'])->name('home.slider.list')->can('gateAll');
            Route::post('add/proses', [SliderController::class, 'add_proses'])->name('home.slider.add.proses')->can('gateAll');
            Route::post('edit/{id}/proses', [SliderController::class, 'edit_proses'])->name('home.slider.edit.proses')->can('gateAll');
            Route::post('delete/{id}/proses', [SliderController::class, 'delete_proses'])->name('home.slider.delete.proses')->can('gateAll');
        });
        Route::group(['prefix'=>'banner'], function(){
            Route::get('list', [BannerController::class, 'list'])->name('home.banner.list')->can('gateAll');
            Route::get('{id}/detail', [BannerController::class, 'detail'])->name('home.banner.list')->can('gateAll');
            Route::post('add/proses', [BannerController::class, 'add_proses'])->name('home.banner.add.proses')->can('gateAll');
            Route::post('/edit/{id}/proses', [BannerController::class, 'edit_proses'])->name('home.banner.edit.proses')->can('gateAll');
            Route::post('delete/{id}/proses', [BannerController::class, 'delete_proses'])->name('home.banner.delete.proses')->can('gateAll');
        });
    });
    Route::group(['prefix'=>'subscribe'], function(){
        Route::get('/list', [SubscribeController::class, 'list'])->name('subscribe')->can('gateAll');
        Route::post('/add/proses', [SubscribeController::class, 'add_proses'])->name('subscribe')->can('gateAll');
    });
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.detail')->can('gateAll');
});