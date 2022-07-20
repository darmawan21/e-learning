<?php

namespace App\Http\Controllers\Guru;

use App\Models\Ujian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\KelasUjian;

class KelasUjianGuruController extends Controller
{
    public function index($id)
    {
        $ujians = Ujian::whereId($id)->with('kelasUjian')->first();
        return view('guru.pages.kelas_ujian.index', compact('ujians'));
    }

    public function create($id)
    {
        $ujians = Ujian::find($id);
        $kelas = Kelas::all();
        return view('guru.pages.kelas_ujian.create', compact('ujians', 'kelas'));
    }

    public function store(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'kelas_id' => 'required',
        ]);

        $validatedData['ujian_id'] = $id;

        KelasUjian::create($validatedData);

        return redirect()->route('guru.kelas_ujian.index', $id)->with('success', 'Kelas berhasil dipilih');
    }
}
