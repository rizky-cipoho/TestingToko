<?php

namespace App\Http\Controllers\Api\Produk;

use App\Http\Controllers\Controller;
use App\Http\Resources\KategoriprodukResource;
use App\Http\Resources\ResultResource;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Services\KategoriService;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Requests\KategoriRequest;

class KategoriController extends Controller
{
    public $kategoriService;

    public function __construct(){
        $this->kategoriService = new KategoriService;
    }
    public function list(): ResourceCollection{
        $list = $this->kategoriService->list();

        return KategoriprodukResource::collection($list);
    }
    public function listAndProduk(): ResourceCollection{
        $list = $this->kategoriService->listAndProduk();

        return KategoriprodukResource::collection($list);
    }
    public function kategori_add_proses(KategoriRequest $request): ResultResource{
        $list = $this->kategoriService->add($request);

        return new ResultResource(collect(['result'=>'kategori berhasil di tambahkan']));
    }
    public function edit_proses(KategoriRequest $request, $id): ResultResource{
        $list = $this->kategoriService->edit_proses($request, $id);

        return new ResultResource(collect(['result'=>'kategori berhasil di ubah']));
    }
    public function delete(KategoriRequest $request, $id): ResultResource{
        $list = $this->kategoriService->delete($id);

        return new ResultResource(collect(['result'=>'kategori berhasil di hapus']));
    }
}
