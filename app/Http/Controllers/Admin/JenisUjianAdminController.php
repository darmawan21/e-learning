<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisUjian;
use Illuminate\Http\Request;

class JenisUjianAdminController extends Controller
{
    public function index()
    {
        $jenisUjians = JenisUjian::all();
        return view('admin.pages.jenis-ujian.index', compact('jenisUjians'));
    }

    public function create()
    {
        return view('admin.pages.jenis-ujian.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_ujian' => 'required',
        ]);

        JenisUjian::create($validatedData);
        
        return redirect()->route('admin.jenis_ujian.index')->with('success', 'Berhasil menambahkan jenis ujian');
    }

    public function edit($jenis_ujian_id)
    {
        $jenisUjian = JenisUjian::where('id', $jenis_ujian_id)->first();
        return view('admin.pages.jenis-ujian.edit', compact('jenisUjian'));
    }

    public function update(Request $request, $jenis_ujian_id)
    {
        $rule = [
            'jenis_ujian' => 'required',
        ];

        $validatedData = $request->validate($rule);

        JenisUjian::where('id', $jenis_ujian_id)->update($validatedData);

        return redirect()->route('admin.jenis_ujian.index')->with('success', 'Berhasil mengubah jenis ujian');
    }

    public function destroy($jenis_ujian_id)
    {
        JenisUjian::where('id', $jenis_ujian_id)->delete();
        return redirect()->route('admin.jenis_ujian.index')->with('success', 'Berhasil menghapus jenis ujian');
    }
}
