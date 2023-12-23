<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Resources\BannerResource;
use App\Http\Resources\ResultResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Services\BannerService;

class BannerController extends Controller
{
    public $bannerService;
    public function __construct(){
        $this->bannerService = new BannerService;
    }
    public function list():ResourceCollection{
        $banner = $this->bannerService->list();
        return BannerResource::collection($banner);
    }
    public function detail($id):BannerResource{
        $banner = $this->bannerService->detail($id);
        return new BannerResource($banner);
    }
    public function add_proses(BannerRequest $request):ResultResource{
        $banner = $this->bannerService->add($request);
        return new ResultResource(collect(['result'=>"banner berhasil di tambahkan"]));
    }
    public function edit_proses(BannerRequest $request, $id):ResultResource{
        $banner = $this->bannerService->edit_Proses($request, $id);
        return new ResultResource(collect(['result'=>"banner berhasil di edit"]));
    }
    public function delete_proses($id):ResultResource{
        $banner = $this->bannerService->delete($id);
        return new ResultResource(collect(['result'=>"banner berhasil di hapus"]));
    }
}
