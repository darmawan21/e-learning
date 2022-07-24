<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranAdminController extends Controller
{
    public function index()
    {
        $mapels = MataPelajaran::all();
        return view('admin.pages.mata-pelajaran.index', compact('mapels'));
    }

    public function create()
    {
        return view('admin.pages.mata-pelajaran.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_mapel' => 'required',
        ]);

        MataPelajaran::create($validatedData);
        
        return redirect()->route('admin.mata_pelajaran.index')->with('success', 'Berhasil menambahkan mata pelajaran');
    }

    public function edit($mata_pelajaran_id)
    {
        $mapel = MataPelajaran::where('id', $mata_pelajaran_id)->first();
        return view('admin.pages.mata-pelajaran.edit', compact('mapel'));
    }

    public function update(Request $request, $mata_pelajaran_id)
    {
        $rule = [
            'nama_mapel' => 'required',
        ];

        $validatedData = $request->validate($rule);

        MataPelajaran::where('id', $mata_pelajaran_id)->update($validatedData);

        return redirect()->route('admin.mata_pelajaran.index')->with('success', 'Berhasil mengubah mata pelajaran');
    }

    public function destroy($mata_pelajaran_id)
    {
        MataPelajaran::where('id', $mata_pelajaran_id)->delete();
        return redirect()->route('admin.mata_pelajaran.index')->with('success', 'Berhasil menghapus mata pelajaran');
    }
}
