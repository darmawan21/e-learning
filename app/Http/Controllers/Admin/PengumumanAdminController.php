<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\PengumumanAdmin;
use App\Http\Controllers\Controller;

class PengumumanAdminController extends Controller
{
    public function index()
    {
        $pengumumans = PengumumanAdmin::all();
        return view('admin.pages.pengumuman.index', compact('pengumumans'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.pages.pengumuman.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pengumuman' => 'required',
            'kelas_id' => 'required',
        ]);

        PengumumanAdmin::create($validatedData);
        
        return redirect()->route('admin.pengumuman.index')->with('success', 'Berhasil menambahkan pengumuman');
    }
    
    public function edit($pengumuman_admin_id)
    {
        $pengumumans = PengumumanAdmin::where('id', $pengumuman_admin_id)->first();
        $kelas = Kelas::all();
        return view('admin.pages.pengumuman.edit', compact('pengumumans', 'kelas'));
    }

    public function update(Request $request, $pengumuman_admin_id)
    {
        $rule = [
            'pengumuman' => 'required',
            'kelas_id' => 'required',
        ];

        $validatedData = $request->validate($rule);

        PengumumanAdmin::where('id', $pengumuman_admin_id)->update($validatedData);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Berhasil mengubah pengumuman');
    }

    public function destroy($pengumuman_admin_id)
    {
        PengumumanAdmin::where('id', $pengumuman_admin_id)->delete();
        return redirect()->route('admin.pengumuman.index')->with('success', 'Berhasil menghapus pengumuman');
    }

    
}
