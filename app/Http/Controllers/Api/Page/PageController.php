<?php

namespace App\Http\Controllers\Api\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PageService;
use App\Http\Resources\PageResource;
use App\Http\Resources\ResultResource;
use App\Http\Requests\PageRequest;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PageController extends Controller
{
    public $pageService;

    public function __construct(){
        $this->pageService = new PageService;
    }
    public function list(): ResourceCollection{
        $pages = $this->pageService->list();
        return PageResource::collection($pages);
    }
    public function detail($id): PageResource{
        $page = $this->pageService->detail($id);

        return new PageResource($page);
    }
    public function add_proses(PageRequest $request): ResultResource{
        $pages = $this->pageService->add($request);
        return new ResultResource(collect(['result'=>'page berhasil di buat']));
    }
    public function edit_proses(PageRequest $request, $id): ResultResource{
        $pages = $this->pageService->edit_Proses($request, $id);
        return new ResultResource(collect(['result'=>'page berhasil di ubah']));
    }
    public function delete($id): ResultResource{
        $pages = $this->pageService->delete($id);
        return new ResultResource(collect(['result'=>'page berhasil di hapus']));
    }
}
