<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SiswaAdminController extends Controller
{
    public function index()
    {
        $siswas = User::get();
        return view('admin.pages.siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.pages.siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'kelamin' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'wali' => 'required',
            'kelas_id' => 'required',
            'email' => 'required',
            'password' => 'required|min:8|max:255',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('profil-image');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);
        
        return redirect()->route('admin.siswa.index')->with('success', 'Berhasil menambahkan siswa');
    }

    public function edit($siswa_id)
    {
        $siswa = User::where('id', $siswa_id)->first();
        $kelas = Kelas::all();
        return view('admin.pages.siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $siswa_id)
    {
        $rule = [
            'nis' => 'required',
            'name' => 'required',
            'kelamin' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'wali' => 'required',
            'kelas_id' => 'required',
            'email' => 'required',
            'image' => 'image|file|max:1024',

        ];
        
        $validatedData = $request->validate($rule);

        if ($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('profil-image');
        }

        User::where('id', $siswa_id)->update($validatedData);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diupdate'); 
    }

    public function destroy($siswa_id)
    {
        User::where('id', $siswa_id)->delete();
        return redirect()->route('admin.siswa.index')->with('success', 'Berhasil menghapus data siswa');
    }
}
