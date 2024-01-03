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
use App\Http\Controllers\Api\KontakController;
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

Route::get('/produk/{id}', [ProdukController::class, 'detail']);
Route::get('/produk/list/get', [ProdukController::class, 'listGet']);
Route::get('/kategori/list', [KategoriController::class, 'list']);
Route::post('/subscribe/add', [SubscribeController::class, 'add_proses']);
Route::post('/kontak/add', [KontakController::class, 'addKontak']);
