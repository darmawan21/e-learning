<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\KelasMapel;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class KelasMapelAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $gurus = Guru::whereId($id)->with('kelasMapel')->first();
        return view('admin.pages.kelas-mapel.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $gurus = Guru::find($id);
        $mapels = MataPelajaran::all();
        $kelas = Kelas::all();
        return view('admin.pages.kelas-mapel.create', compact('gurus', 'mapels', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'mata_pelajaran_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $validatedData['guru_id'] = $id;

        KelasMapel::create($validatedData);

        return redirect()->route('admin.kelas-mapel.index', $id)->with('success', 'Mapel dan Kelas berhasil dipilih');
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
    public function edit($guru_id, $kelas_mapel_id)
    {
        $guru = Guru::find($guru_id)->kelasMapel()->whereId($kelas_mapel_id)->first();
        $mapels = MataPelajaran::all();
        $kelas = Kelas::all();
        return view('admin.pages.kelas-mapel.edit', compact('guru', 'mapels', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $guru_id, $kelas_mapel_id)
    {
        $rule = [
            'mata_pelajaran_id' => 'required',
            'kelas_id' => 'required',
        ];

        $validatedData = $request->validate($rule);

        Guru::find($guru_id)->kelasMapel()->whereId($kelas_mapel_id)->first()->update($validatedData);

        return redirect()->route('admin.kelas-mapel.index', $guru_id)->with('success', 'Mapel dan Kelas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($guru_id, $kelas_mapel_id)
    {
        Guru::find($guru_id)->kelasMapel()->whereId($kelas_mapel_id)->delete();
        return redirect()->route('admin.kelas-mapel.index', $guru_id)->with('success', 'Mapel dan Kelas berhasil dihapus');
    }
}
