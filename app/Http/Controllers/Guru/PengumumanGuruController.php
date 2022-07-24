<?php

namespace App\Http\Controllers\Guru;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PengumumanGuru;

class PengumumanGuruController extends Controller
{
    public function index()
    {
        $pengumumans = PengumumanGuru::where('guru_id', auth()->guard('guru')->user()->id)->get();
        return view('guru.pages.pengumuman.index', compact('pengumumans'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('guru.pages.pengumuman.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pengumuman' => 'required',
            'kelas_id' => 'required',
        ]);

        $validatedData['guru_id'] = auth()->guard('guru')->user()->id;

        PengumumanGuru::create($validatedData);
        
        return redirect()->route('guru.pengumuman.index')->with('success', 'Berhasil menambahkan pengumuman');
    }

    public function edit($pengumuman_guru_id)
    {
        $pengumumans = PengumumanGuru::where('id', $pengumuman_guru_id)->first();
        $kelas = Kelas::all();
        return view('guru.pages.pengumuman.edit', compact('pengumumans', 'kelas'));
    }

    public function update(Request $request, $pengumuman_guru_id)
    {
        $rule = [
            'pengumuman' => 'required',
            'kelas_id' => 'required',
        ];

        $validatedData = $request->validate($rule);

        $validatedData['guru_id'] = auth()->guard('guru')->user()->id;

        PengumumanGuru::where('id', $pengumuman_guru_id)->update($validatedData);

        return redirect()->route('guru.pengumuman.index')->with('success', 'Berhasil mengubah pengumuman');
    }

    public function destroy($pengumuman_guru_id)
    {
        PengumumanGuru::where('id', $pengumuman_guru_id)->delete();
        return redirect()->route('guru.pengumuman.index')->with('success', 'Berhasil menghapus pengumuman');
    }
}
