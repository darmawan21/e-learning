<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use App\Models\Nilai;
use App\Models\Ujian;
use App\Models\KelasUjian;
use Illuminate\Http\Request;
use mysqli;

class NilaiGuruController extends Controller
{
    public function index()
    {
        $ujians = Ujian::all();
        return view('guru.pages.nilai.index', compact('ujians'));
    }

    public function show($ujian_id, $kelas_id)
    {
        $kelas = KelasUjian::where('ujian_id', $ujian_id)->where('kelas_id', $kelas_id)->get();
        $users = User::where('kelas_id', $kelas_id)->get('id');
        
        $items = Nilai::where('ujian_id', $ujian_id)->whereIn('id',$users)->get();

        return view('guru.pages.nilai.show', compact('kelas', 'users', 'items'));
    }   
}
