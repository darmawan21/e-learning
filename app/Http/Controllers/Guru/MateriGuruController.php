<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\KelasMapel;
use App\Models\MataPelajaran;
use App\Models\Materi;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriGuruController extends Controller
{
    public function index()
    {
        $materis = Materi::all();
        return view('guru.pages.materi.index', compact('materis'));
    }

    public function create(Request $request)
    {
        $kelasmapels = KelasMapel::where('guru_id', auth()->guard('guru')->user()->id)->get();
        return view('guru.pages.materi.create', compact('kelasmapels'));
    }

    public function store(Request $request)
    {
        
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
        
        return redirect()->route('guru.materi.index')->with('success', 'Berhasil menambahkan materi'); 
    }

    public function edit($materi_id)
    {

        $materis = Materi::whereId($materi_id)->first();
        $kelasmapels = KelasMapel::all();
        return view('guru.pages.materi.edit', compact('materis', 'kelasmapels'));
    }

    public function update(Request $request, $materi_id)
    {
        $rule =  [
            'kelas_mapel_id' => 'required',   
            'nama_materi' => 'required|max:255', 
            'file' => 'file|mimes:csv,txt,xlx,xls,doc,docx,ppt,pptx,pdf|max:2048',
            'konten' => 'required',
        ];

        $validatedData = $request->validate($rule);

        if ($request->file('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validatedData['file'] = $request->file('file')->store('files');
        }

        Materi::where('id', $materi_id)->update($validatedData);

        return redirect()->route('guru.materi.index')->with('success', 'Berhasil mengubah materi');
        
    }

    public function destroy($materi_id)
    {
        Materi::where('id', $materi_id)->delete();

        return redirect()->route('guru.materi.index')->with('success', 'Berhasil menghapus Materi');
    }
}
