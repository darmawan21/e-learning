<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\KelasMapel;
use App\Models\MataPelajaran;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriGuruController extends Controller
{
    public function index()
    {
        return view('guru.pages.materi.index');
    }

    public function create(Request $request)
    {
        $kelasmapels = KelasMapel::where('guru_id', auth()->guard('guru')->user()->id)->get();
        return view('guru.pages.materi.create', compact('kelasmapels'));
    }

    public function store(Request $request)
    {
        
        // return $request->file('file')->store('files');
        
        $validatedData =  $request->validate([
            'kelas_mapel_id' => 'required',   
            'nama_materi' => 'required|max:255', 
            'file' => 'file|mimes:csv,txt,xlx,xls,doc,docx,ppt,pptx,pdf|max:2048',
            'konten' => 'required',
        ]);

        if($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('files');
        }

        Materi::create($validatedData);
        
        return redirect()->route('guru.materi.index')->with('success', 'Berhasil Menambahkan Materi'); 
    }
}
