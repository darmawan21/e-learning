<?php

namespace App\Http\Controllers\Guru;

use App\Models\Ujian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UjianGuruController extends Controller
{
    public function index()
    {
        $ujians = Ujian::get();
        return view('guru.pages.ujian.index', compact('ujians'));
    }
}
