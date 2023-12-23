<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use App\Models\Subscribe;

class SubscribeService
{
    public function list(): Collection{
        $subscribes = Subscribe::orderBy('id', 'desc')->paginate(20);

        return $subscribes;
    }
    public function add($request):void{
        Subscribe::create([
            'email'=>$request->email
        ]);
    }
}