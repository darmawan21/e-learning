<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SoalGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $ujians = Ujian::whereId($id)->with('soal')->first() ?? abort(404, 'Not Found');
        return view('guru.pages.soal.index', compact('ujians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $ujians = Ujian::find($id);
        return view('guru.pages.soal.create', compact('ujians'));
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
            'soal' => 'required|max:255',
            'image' => 'image|file|max:1024|mimes:png,jpg,jpeg',
            'pilihan1' => 'required|max:255',
            'pilihan2' => 'required|max:255',
            'pilihan3' => 'required|max:255',
            'pilihan4' => 'required|max:255',
            'pilihan5' => 'required|max:255',
            'kunci' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('soal-image');
        }

        Ujian::find($id)->soal()->create($validatedData);

        return redirect()->route('guru.soal.index', $id)->with('success', 'Soal berhasil ditambahkan');
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
    public function edit($ujian_id, $soal_id)
    {
        $soals = Ujian::find($ujian_id)->soal()->whereId($soal_id)->first() ?? abort(404, 'Not Found');
        return view('guru.pages.soal.edit', compact('soals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ujian_id, $soal_id)
    {
        $rule = [
            'soal' => 'required|max:255',
            'image' => 'image|file|max:1024|mimes:png,jpg,jpeg',
            'pilihan1' => 'required|max:255',
            'pilihan2' => 'required|max:255',
            'pilihan3' => 'required|max:255',
            'pilihan4' => 'required|max:255',
            'pilihan5' => 'required|max:255',
            'kunci' => 'required',
        ];

        $validatedData = $request->validate($rule);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('soal-image');
        }

        Ujian::find($ujian_id)->soal()->whereId($soal_id)->first()->update($validatedData);

        return redirect()->route('guru.soal.index', $ujian_id)->with('success', 'Soal berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ujian_id, $soal_id)
    {
        Ujian::find($ujian_id)->soal()->whereId($soal_id)->delete();

        return redirect()->route('guru.soal.index', $ujian_id)->with('success', 'Soal berhasil dihapus');
    }
}
