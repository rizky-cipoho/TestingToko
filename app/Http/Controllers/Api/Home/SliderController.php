<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Http\Resources\SliderResource;
use App\Http\Resources\ResultResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Services\SliderService;

class SliderController extends Controller
{
    public $sliderService;
    public function __construct(){
        $this->sliderService = new SliderService;
    }
    public function list(): ResourceCollection{
        $sliders = $this->sliderService->list();
        return SliderResource::collection($sliders);
    }
    public function detail($id): SliderResource{
        $sliders = $this->sliderService->detail($id);
        return new SliderResource($sliders);
    }
    public function add_proses(SliderRequest $request):ResultResource{
        $sliders = $this->sliderService->add($request);
        return new ResultResource(collect(['result'=> 'slider berhasil di tambahkan']));
    }
    public function edit_proses(SliderRequest $request, $id):ResultResource{
        $sliders = $this->sliderService->edit_Proses($request, $id);
        return new ResultResource(collect(['result'=> 'slider berhasil di ubah']));
    }
    public function delete_proses($id):ResultResource{
        $sliders = $this->sliderService->delete($id);
        return new ResultResource(collect(['result'=> 'slider berhasil di hapus']));
    }
}
