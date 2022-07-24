<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\KelasMapel;
use App\Models\KelasTugas;
use App\Models\KelasUjian;
use Illuminate\Http\Request;
use App\Models\PengumumanGuru;
use App\Models\Ujian;
use App\Notifications\UserUjianAlertNotification;

class HomeController extends Controller
{
    public function index()
    {
        $mapel = KelasMapel::where('kelas_id', auth()->user()->kelas_id)->with('tugas')->get();
        $tugas = KelasTugas::where('kelas_id', auth()->user()->kelas_id)->get();
        $ujian = Ujian::where('status', 'publish')->get('id');
        $kelasUjian = KelasUjian::whereIn('ujian_id', $ujian)->where('kelas_id', auth()->user()->kelas_id)->get();
        $pengumumans = PengumumanGuru::where('kelas_id', auth()->user()->kelas_id)->get();
        return view('pages.home', compact('mapel', 'ujian', 'pengumumans', 'tugas', 'kelasUjian'));
    }

}
