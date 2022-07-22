<?php

namespace App\Http\Controllers\Guru;

use App\Models\Soal;
use App\Models\Ujian;
use App\Models\JenisUjian;
use App\Models\KelasMapel;
use App\Models\KelasUjian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UjianGuruController extends Controller
{
    public function index()
    {
        $ujians = Ujian::get();
        return view('guru.pages.ujian.index', compact('ujians'));
    }

    public function create()
    {
        $kelasmapels = KelasMapel::where('guru_id', auth()->guard('guru')->user()->id)->get();
        $jenisujians = JenisUjian::all();
        return view('guru.pages.ujian.create', compact('kelasmapels', 'jenisujians'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_ujian_id' => 'required',
            'kelas_mapel_id' => 'required',
            'judul' => 'required|max:255',
            'tanggal' => 'required',
            'waktu' => 'required',
            'status' => 'required',
        ]);

        $validatedData['guru_id'] = auth()->guard('guru')->user()->id;
        
        Ujian::create($validatedData);

        return redirect()->route('guru.ujian.index')->with('success', 'Berhasil menambah ujian');
    
    }

    public function edit($ujian_id)
    {
        $kelasmapels = KelasMapel::where('guru_id', auth()->guard('guru')->user()->id)->get();
        $jenisujians = JenisUjian::all();
        $ujians = Ujian::withCount('soal')->where('id', $ujian_id)->first();
        return view('guru.pages.ujian.edit', compact('kelasmapels', 'jenisujians', 'ujians'));
    }

    public function update(Request $request, $ujian_id)
    {
        $rule = [
            'jenis_ujian_id' => 'required',
            'kelas_mapel_id' => 'required',
            'judul' => 'required|max:255',
            'tanggal' => 'required',
            'waktu' => 'required',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rule);

        $validatedData['guru_id'] = auth()->guard('guru')->user()->id;
        
        Ujian::where('id', $ujian_id)->update($validatedData);

        return redirect()->route('guru.ujian.index')->with('success', 'Berhasil mengatur ujian');
    
    }

    public function destroy($ujian_id)
    {
        Ujian::where('id', $ujian_id)->delete();
        Soal::where('ujian_id', $ujian_id)->delete();
        KelasUjian::where('ujian_id', $ujian_id)->delete();


        return redirect()->route('guru.ujian.index')->with('success', 'Berhasil menghapus ujian');
    }

}


