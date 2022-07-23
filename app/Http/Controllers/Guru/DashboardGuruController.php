<?php

namespace App\Http\Controllers\Guru;

use App\Models\Tugas;
use App\Models\Ujian;
use App\Models\Materi;
use App\Models\KelasMapel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardGuruController extends Controller
{
    public function index()
    {
        $mapel = KelasMapel::where('guru_id', auth()->guard('guru')->user()->id)->get('id');
        $materi = Materi::whereIn('kelas_mapel_id', $mapel)->get();
        $tugas = Tugas::where('guru_id', auth()->guard('guru')->user()->id)->get();
        $ujian = Ujian::where('guru_id', auth()->guard('guru')->user()->id)->get();
        return view('guru.dashboard', compact('mapel', 'tugas', 'materi', 'ujian'));
    }
}
