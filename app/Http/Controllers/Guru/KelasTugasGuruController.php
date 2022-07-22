<?php

namespace App\Http\Controllers\Guru;

use App\Models\Kelas;
use App\Models\Tugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KelasTugas;

class KelasTugasGuruController extends Controller
{
    public function index($tugas_id)
    {
        $tugass = Tugas::whereId($tugas_id)->with('kelasTugas')->first();
        return view('guru.pages.kelas_tugas.index', compact('tugass'));
    }

    public function create($tugas_id)
    {
        $tugass = Tugas::find($tugas_id);
        $kelas = Kelas::all();
        return view('guru.pages.kelas_tugas.create', compact('tugass', 'kelas'));
    }

    public function store(Request $request, $tugas_id)
    {
        
        $validatedData = $request->validate([
            'kelas_id' => 'required',
        ]);

        $validatedData['tugas_id'] = $tugas_id;

        KelasTugas::create($validatedData);

        return redirect()->route('guru.kelas_tugas.index', $tugas_id)->with('success', 'Kelas berhasil dipilih');
    }

    public function edit($tugas_id, $kelas_tugas_id)
    {
        $tugass = Tugas::find($tugas_id)->kelasTugas()->whereId($kelas_tugas_id)->first();
        $kelas = Kelas::all();
        return view('guru.pages.kelas_tugas.edit', compact('kelas', 'tugass'));
    }

    public function update(Request $request, $tugas_id, $kelas_tugas_id)
    {
        $rule = [
            'kelas_id' => 'required',
        ];

        $validatedData = $request->validate($rule);

        Tugas::find($tugas_id)->kelasTugas()->whereId($kelas_tugas_id)->first()->update($validatedData);

        return redirect()->route('guru.kelas_tugas.index', $tugas_id)->with('success', 'Kelas berhasil diubah');
    }

    public function destroy($tugas_id, $kelas_tugas_id)
    {
        Tugas::find($tugas_id)->kelasTugas()->whereId($kelas_tugas_id)->delete();

        return redirect()->route('guru.kelas_tugas.index', $tugas_id)->with('success', 'Kelas berhasil dihapus');
    }
}
