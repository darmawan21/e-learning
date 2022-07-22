<?php

namespace App\Http\Controllers;

use App\Models\KelasMapel;
use App\Models\Materi;
use Illuminate\Http\Request;

class MataPelajaranSiswaController extends Controller
{
    public function index()
    {
        $mapels = KelasMapel::where('kelas_id', auth()->user()->kelas_id)->get();
        return view('pages.mata-pelajaran.index', compact('mapels'));
    }

    public function show($kelas_mapel_id)
    {
        $materis = Materi::where('kelas_mapel_id', $kelas_mapel_id)->get();
        return view('pages.mata-pelajaran.show', compact('materis'));
    }

    public function detail($kelas_mapel_id, $materi_id)
    {
        $materis = Materi::where('id', $materi_id)->where('kelas_mapel_id', $kelas_mapel_id)->get();
        return view('pages.mata-pelajaran.detail', compact('materis'));
    }
}
