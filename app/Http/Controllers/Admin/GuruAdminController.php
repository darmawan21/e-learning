<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KelasMapel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GuruAdminController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        return view('admin.pages.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('admin.pages.guru.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
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
            'password' => 'required|min:8|max:255',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('profil-image');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        Guru::create($validatedData);
        
        return redirect()->route('admin.guru.index')->with('success', 'Berhasil menambahkan guru');
    }

    public function edit($guru_id)
    {
        $guru = Guru::where('id', $guru_id)->first();
        return view('admin.pages.guru.edit', compact('guru'));
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

        return redirect()->route('admin.guru.index')->with('success', 'Data Guru Berhasil Diupdate'); 
    }

    public function destroy($guru_id)
    {
        Guru::where('id', $guru_id)->delete();
        KelasMapel::where('guru_id', $guru_id)->delete();
        return redirect()->route('admin.guru.index')->with('success', 'Berhasil menghapus data guru');
    }
}
