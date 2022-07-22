<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilSiswaController extends Controller
{
    public function index()
    {
        $profil = User::where('id', auth()->user()->id)->first();
        return view('pages.profil-siswa.index', compact('profil'));
    }

    public function edit($user_id)
    {
        $profil = User::where('id', $user_id)->first();
        return view('pages.profil-siswa.edit', compact('profil'));
    }

    public function update(Request $request, $user_id)
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

        $validatedData['kelas_id'] = auth()->user()->kelas_id;
        

        User::where('id', $user_id)->update($validatedData);

        return redirect()->route('profil_siswa.index')->with('success', 'Profil Siswa Berhasil Diupdate'); 
    }
}
