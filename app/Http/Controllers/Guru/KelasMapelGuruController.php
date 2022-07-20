<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\KelasMapel;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class KelasMapelGuruController extends Controller
{
    public function index()
    {
        
        $mapels = KelasMapel::where('guru_id', auth()->guard('guru')->user()->id)->get();

        return view('guru.pages.mata_pelajaran.index', compact('mapels'));
    }

    public function create()
    {
        $mapels = MataPelajaran::all();
        $kelas = Kelas::all();
        return view('guru.pages.mata_pelajaran.create', compact('mapels', 'kelas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mata_pelajaran_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $validatedData['guru_id'] = auth()->guard('guru')->user()->id;

        KelasMapel::create($validatedData);

        return redirect()->route('guru.mata-pelajaran')->with('success', 'Berhasil menambahkan mata pelajaran');
    }

    public function edit($kelas_mapel_id)
    {
        $kelasmapels = KelasMapel::whereId($kelas_mapel_id)->first();
        $mapels = MataPelajaran::all();
        $kelas = Kelas::all();

        return view('guru.pages.mata_pelajaran.edit', compact('kelasmapels', 'mapels', 'kelas'));
    }

    public function update(Request $request, $kelas_mapel_id)
    {
        $rule = [
            'mata_pelajaran_id' => 'required',
            'kelas_id' => 'required',
        ];

        $validatedData = $request->validate($rule);

        $validatedData['guru_id'] = auth()->guard('guru')->user()->id;

        KelasMapel::where('id', $kelas_mapel_id)->update($validatedData);

        return redirect()->route('guru.mata-pelajaran')->with('success', 'Berhasil mengubah mata pelajaran');
    }

    public function destroy($kelas_mapel_id)
    {
        KelasMapel::where('id', $kelas_mapel_id)->delete();

        return redirect()->route('guru.mata-pelajaran')->with('success', 'Berhasil menghapus mata pelajaran');
    }

}
