<?php

namespace App\Http\Controllers\Guru;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilGuruController extends Controller
{
    public function index()
    {
        $profil = Guru::where('id', auth()->guard('guru')->user()->id)->first();
        return view('guru.pages.profil-guru.index', compact('profil'));
    }

    public function edit($guru_id)
    {
        $profil = Guru::where('id', $guru_id)->first();
        return view('guru.pages.profil-guru.edit', compact('profil'));
    }

    public function update(Request $request, $guru_id)
    {
        $rule = [
            'nip' => 'required',
            'name' => 'required',
            'kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'pangkat' => 'required',
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

        Guru::where('id', $guru_id)->update($validatedData);

        return redirect()->route('guru.profil_guru.index')->with('success', 'Profil Guru Berhasil Diupdate'); 
    }
}
