<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\KelasMapel;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasGuruController extends Controller
{
    public function index()
    {
        $tugass = Tugas::where('guru_id', auth()->guard('guru')->user()->id)->get();
        return view('guru.pages.tugas.index', compact('tugass'));
    }

    public function create()
    {
        $kelasmapels = KelasMapel::where('guru_id', auth()->guard('guru')->user()->id)->get();
        return view('guru.pages.tugas.create', compact('kelasmapels'));
    }

    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'kelas_mapel_id' => 'required',  
            'judul_tugas' => 'required|max:255',
            'tanggal' => 'required',
            'waktu' => 'required',
            'isi_tugas' => 'required',
        ]);

        $validatedData['guru_id'] = auth()->guard('guru')->user()->id;

        Tugas::create($validatedData);
        
        return redirect()->route('guru.tugas.index')->with('success', 'Berhasil menambahkan tugas'); 

    }

    public function edit($tugas_id)
    {

        $tugas = Tugas::whereId($tugas_id)->first();
        $kelasmapels = KelasMapel::all();
        return view('guru.pages.tugas.edit', compact('tugas', 'kelasmapels'));
    }

    public function update(Request $request, $tugas_id)
    {
        $rule = [
            'kelas_mapel_id' => 'required',  
            'judul_tugas' => 'required|max:255',
            'tanggal' => 'required',
            'waktu' => 'required',
            'isi_tugas' => 'required',
        ];

        $validatedData = $request->validate($rule);

        $validatedData['guru_id'] = auth()->guard('guru')->user()->id;

        Tugas::where('id', $tugas_id)->update($validatedData);
        
        return redirect()->route('guru.tugas.index')->with('success', 'Berhasil mengubah tugas'); 
  
    }

    public function destroy($tugas_id)
    {
        Tugas::where('id', $tugas_id)->delete();

        return redirect()->route('guru.tugas.index')->with('success', 'Berhasil menghapus tugas');
    }
}
