<?php

namespace App\Http\Controllers\Api\Pesanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PesananService;
use App\Http\Resources\PesananResource;
use App\Http\Resources\ResultResource;
use App\Http\Requests\PesananRequest;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PesananController extends Controller
{
    public $pesananService;
    public function __construct(){
        $this->pesananService = new PesananService;
    }

    public function list():ResourceCollection{
        $pesanan = $this->pesananService->list();
        return PesananResource::collection($pesanan);
    }
    public function add_proses(PesananRequest $request): ResultResource{
        $pesanan = $this->pesananService->add($request);
        return new ResultResource(collect(['result'=>"pesanan berhasil di buat"]));
    }
    public function edit_proses(PesananRequest $request, $id): ResultResource{
        $pesanan = $this->pesananService->edit_Proses($request, $id);
        return new ResultResource(collect(['result'=>"pesanan berhasil di edit"]));
    }
    public function delete_proses($id): ResultResource{
        $pesanan = $this->pesananService->delete($id);
        return new ResultResource(collect(['result'=>"pesanan berhasil di delete"]));
    }
    public function detail($id): PesananResource{
        $pesanan = $this->pesananService->detail($id);
        return new PesananResource($pesanan);
    }
    public function status_proses(Request $request, $id): ResultResource{
        $pesanan = $this->pesananService->status_proses($request, $id);
        return new ResultResource(collect(['result'=>"pesanan status berhasil di ubah"]));
    }
}
