<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;
use Illuminate\View\View;

class KontakController extends Controller
{
    public function kontak():View {
        $kontak = Kontak::paginate(20);

        return view('kontak', [
            'kontaks'=>$kontak
        ]);
    }
}
