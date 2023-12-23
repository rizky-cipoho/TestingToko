<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\SubscribeResource;
use App\Http\Resources\ResultResource;
use App\Services\SubscribeService;
use App\Http\Requests\SubscribeRequest;

class SubscribeController extends Controller
{
    public $subscribeService;

    public function __construct(){
        $this->subscribeService = new SubscribeService;
    }
    public function list():ResourceCollection{
        $subscribe = $this->subscribeService->list();

        return SubscribeResource::collection($subscribe);
    }
    public function add_proses(SubscribeRequest $request):ResultResource{
        $this->subscribeService->add($request);

        return new ResultResource(collect(['result'=>'subscribe berhasil di tambahkan']));
    }
}
