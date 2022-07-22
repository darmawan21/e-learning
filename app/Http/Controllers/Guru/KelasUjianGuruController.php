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

    public function edit($ujian_id, $kelas_ujian_id)
    {
        $ujians = Ujian::find($ujian_id)->kelasUjian()->whereId($kelas_ujian_id)->first();
        $kelas = Kelas::all();
        return view('guru.pages.kelas_ujian.edit', compact('kelas', 'ujians'));
    }

    public function update(Request $request, $ujian_id, $kelas_ujian_id)
    {
        $rule = [
            'kelas_id' => 'required',
        ];

        $validatedData = $request->validate($rule);

        Ujian::find($ujian_id)->kelasUjian()->whereId($kelas_ujian_id)->first()->update($validatedData);

        return redirect()->route('guru.kelas_ujian.index', $ujian_id)->with('success', 'Kelas berhasil diubah');
    }

    public function destroy($ujian_id, $kelas_ujian_id)
    {
        Ujian::find($ujian_id)->kelasUjian()->whereId($kelas_ujian_id)->delete();

        return redirect()->route('guru.kelas_ujian.index', $ujian_id)->with('success', 'Kelas berhasil dihapus');
    }
}
