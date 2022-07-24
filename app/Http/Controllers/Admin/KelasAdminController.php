<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
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
        return view('admin.pages.kelas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required',
        ]);

        Kelas::create($validatedData);
        
        return redirect()->route('admin.kelas.index')->with('success', 'Berhasil menambahkan kelas');
    }

    public function edit($kelas_id)
    {
        $kelas = Kelas::where('id', $kelas_id)->first();
        return view('admin.pages.kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $kelas_id)
    {
        $rule = [
            'nama_kelas' => 'required',
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
