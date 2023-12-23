<?php

namespace App\Http\Controllers\Api\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\KategoriPageService;
use App\Http\Requests\KategoriPageRequest;
use App\Http\Resources\KategoriPageResource;
use App\Http\Resources\ResultResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class KategoriPageController extends Controller
{
    public $kategoiPageService;
    public function __construct(){
        $this->kategoriPageService = new KategoriPageService;
    }
    public function list(): ResourceCollection{
        $kategoripage = $this->kategoriPageService->list();
        return KategoriPageResource::collection($kategoripage);
    }
    public function detail($id): KategoriPageResource{
        $kategoripage = $this->kategoriPageService->detail($id);
        return new KategoriPageResource($kategoripage);
    }
    public function add_proses(KategoriPageRequest $request){
        $kategoripage = $this->kategoriPageService->add($request);
        return new ResultResource(collect(['result'=>"kategori page berhasil di buat"]));
    }
    public function edit_proses(KategoriPageRequest $request, $id): ResultResource{
        $kategoripage = $this->kategoriPageService->edit_Proses($request, $id);
        return new ResultResource(collect(['result'=>"kategori page berhasil di edit"]));
    }
    public function delete_proses($id): ResultResource{
        $kategoripage = $this->kategoriPageService->delete($id);
        return new ResultResource(collect(['result'=>"kategori page berhasil di hapus"]));
    }
}
