<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\KelasMapel;
use App\Models\KelasTugas;
use App\Models\TugasSiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TugasSiswaController extends Controller
{
    public function index()
    {
        $tugass = KelasTugas::where('kelas_id', auth()->user()->kelas_id)->with('tugas')->get();
        $date = Carbon::now();
        return view('pages.tugas.index', compact('tugass', 'date'));
    }

    public function create($tugas_id)
    {
        $tugas = Tugas::find($tugas_id);
        return view('pages.tugas.create', compact('tugas'));
    }

    public function store(Request $request, $tugas_id)
    {
        $validatedData = $request->validate([
            'subject' => 'required',
        ]);

        if($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('files');
        }

        $validatedData['tugas_id'] = $tugas_id;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['keterangan'] = 'selesai';

        TugasSiswa::create($validatedData);

        return redirect()->route('tugas.index')->with('success', 'Berhasil mengumpulkan tugas');
    }
}
