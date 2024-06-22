<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function index(){
        return view('index', [
            'alternatif' => Alternatif::all(),
            'kriteria' => Kriteria::all(),
        ]);
    }
}
