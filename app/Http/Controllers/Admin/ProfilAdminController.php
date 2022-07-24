<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfilAdminController extends Controller
{
    public function index()
    {
        $profil = Admin::where('id', auth()->guard('admin')->user()->id)->first();
        return view('admin.pages.profil-admin.index', compact('profil'));
    }

    public function edit($admin_id)
    {
        $profil = Admin::where('id', $admin_id)->first();
        return view('admin.pages.profil-admin.edit', compact('profil'));
    }

    public function update(Request $request, $admin_id)
    {
        $rule = [
            'name' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
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

        Admin::where('id', $admin_id)->update($validatedData);

        return redirect()->route('admin.profil_admin.index')->with('success', 'Profil admin berhasil diupdate'); 
    }
}
