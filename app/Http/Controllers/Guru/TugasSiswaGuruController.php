<?php

namespace App\Http\Controllers\Guru;

use App\Models\User;
use App\Models\Tugas;
use App\Models\KelasTugas;
use App\Models\TugasSiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TugasSiswaGuruController extends Controller
{
    public function index()
    {
        $tugass = Tugas::where('guru_id', auth()->guard('guru')->user()->id)->get();
        return view('guru.pages.tugas_siswa.index', compact('tugass'));
    }

    public function show($tugas_id, $kelas_id)
    {
        $kelas = KelasTugas::where('tugas_id', $tugas_id)->where('kelas_id', $kelas_id)->get();
        $users = User::where('kelas_id', $kelas_id)->get('id');
        
        $items = TugasSiswa::where('tugas_id', $tugas_id)->get();
        // whereIn('id',$users)

        return view('guru.pages.tugas_siswa.show', compact('kelas', 'users', 'items'));
    }  
}
