<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahunAjarans = TahunAjaran::orderBy('tahun_ajaran', 'desc')->get();
        return view('admin.pages.tahun-ajaran.index', compact('tahunAjarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tahun-ajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahun_ajaran' => 'required',
        ]);

        TahunAjaran::create($validatedData);
        
        return redirect()->route('admin.tahun_ajaran.index')->with('success', 'Berhasil menambahkan tahun ajaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tahun_ajaran_id)
    {
        $tahunAjaran = TahunAjaran::where('id', $tahun_ajaran_id)->first();
        return view('admin.pages.tahun-ajaran.edit', compact('tahunAjaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tahun_ajaran_id)
    {
        $rule = [
            'tahun_ajaran' => 'required',
        ];

        $validatedData = $request->validate($rule);

        TahunAjaran::where('id', $tahun_ajaran_id)->update($validatedData);
        
        return redirect()->route('admin.tahun_ajaran.index')->with('success', 'Berhasil mengubah tahun ajaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tahun_ajaran_id)
    {
        TahunAjaran::where('id', $tahun_ajaran_id)->delete();
        return redirect()->route('admin.tahun_ajaran.index')->with('success', 'Berhasil menghapus tahun ajaran');
    }
}
