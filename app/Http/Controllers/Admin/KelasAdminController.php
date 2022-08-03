<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Semester;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class KelasAdminController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.pages.kelas.index', compact('kelas'));
    }

    public function create()
    {
        $tahunAjarans = TahunAjaran::all();
        $semesters = Semester::all();
        return view('admin.pages.kelas.create', compact('tahunAjarans', 'semesters'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required',
            'tahun_ajaran_id' => 'required',
            'semester_id' => 'required',
        ]);

        Kelas::create($validatedData);
        
        return redirect()->route('admin.kelas.index')->with('success', 'Berhasil menambahkan kelas');
    }

    public function edit($kelas_id)
    {
        $kelas = Kelas::where('id', $kelas_id)->first();
        $tahunAjarans = TahunAjaran::all();
        $semesters = Semester::all();
        return view('admin.pages.kelas.edit', compact('kelas', 'tahunAjarans', 'semesters'));
    }

    public function update(Request $request, $kelas_id)
    {
        $rule = [
            'nama_kelas' => 'required',
            'tahun_ajaran_id' => 'required',
            'semester_id' => 'required',
        ];

        $validatedData = $request->validate($rule);

        Kelas::where('id', $kelas_id)->update($validatedData);

        return redirect()->route('admin.kelas.index')->with('success', 'Berhasil mengubah kelas');
    }

    public function destroy($kelas_id)
    {
        Kelas::where('id', $kelas_id)->delete();
        return redirect()->route('admin.kelas.index')->with('success', 'Berhasil menghapus kelas');
    }
}
