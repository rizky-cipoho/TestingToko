<?php

namespace App\Http\Controllers\Api\Pesanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Services\SumberPesananService;
use App\Http\Resources\SumberPesananResource;
use App\Http\Resources\ResultResource;
use App\Http\Requests\SumberPesananRequest;

class SumberPesananController extends Controller
{
    public $sumberPesanan;

    public function __construct(){
        $this->sumberPesanan = new SumberPesananService;
    }
    
    public function sumber_list():ResourceCollection{
        $sumber = $this->sumberPesanan->list();

        return SumberPesananResource::collection($sumber);
    }
    public function detail($id):SumberPesananResource{
        $sumber = $this->sumberPesanan->detail($id);

        return new SumberPesananResource($sumber);
    }
    public function sumber_add_proses(SumberPesananRequest $request):ResultResource{
        $sumber = $this->sumberPesanan->add($request);

        return new ResultResource(collect(['result'=>'sumber pesanan berhasil di tambahkan']));
    }
    public function sumber_edit_proses(SumberPesananRequest $request, $id):ResultResource{
        $sumber = $this->sumberPesanan->edit_Proses($request, $id);

        return new ResultResource(collect(['result'=>'sumber pesanan berhasil di edit']));
    }
    public function sumber_delete_proses($id):ResultResource{
        $sumber = $this->sumberPesanan->delete($id);

        return new ResultResource(collect(['result'=>'sumber pesanan berhasil di hapus']));
    }
}
