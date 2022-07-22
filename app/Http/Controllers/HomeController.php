<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\KelasMapel;
use App\Models\KelasUjian;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $mapel = KelasMapel::where('kelas_id', auth()->user()->kelas_id)->with('tugas')->get();
        $ujian = KelasUjian::where('kelas_id', auth()->user()->kelas_id)->with('ujian')->get();
        return view('pages.home', compact('mapel', 'ujian'));
    }
}
