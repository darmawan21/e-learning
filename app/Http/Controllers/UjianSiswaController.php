<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Models\Jawaban;
use App\Models\Nilai;
use Illuminate\Http\Request;

class UjianSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ujians = Ujian::where('status', 'publish')->withCount('soal')->get();
        return view('pages.ujian.index', compact('ujians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ujian = Ujian::where('id', $id)->with('soal.myJawab')->first() ?? abort(404, 'Not Found');

        if ($ujian->myNilai) {
            return view('pages.ujian.detail', compact('ujian'));
        }

        return view('pages.ujian.show', compact('ujian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function start($id)
    {
        $ujian = Ujian::where('id', $id)->with('soal')->first();
        return view('pages.ujian.start', compact('ujian'));
    }

    public function result(Request $request, $id)
    {
        $ujian = Ujian::with('soal')->whereId($id)->first();
        $correct = 0;
        $empty = 0;

        foreach ($ujian->soal as $soals) {
            Jawaban::create([
                'user_id' => auth()->user()->id,
                'soal_id' => $soals->id,
                'jawaban' => $request->post($soals->id),
            ]);

            
            if ($soals->kunci === $request->post($soals->id)) {
                $correct+=1;
            } elseif ($request->post($soals->id) === Null) {
                $empty+=1;
            }
        }

        $point = (100 / count($ujian->soal)) * $correct;
        $wrong = count($ujian->soal) - $correct;

        
        Nilai::create([
            'user_id' => auth()->user()->id,
            'ujian_id' => $ujian->id,
            'point' => $point,
            'correct' => $correct,
            'wrong' => $wrong,
            'empty' => $empty,
        ]);

        return redirect()->route('ujian.index')->with('success', 'Telah berhasil melakukan ujian');
    }

    public function info($id)
    {
        $ujian = Ujian::where('id', $id)->with('myNilai', 'topTen.user')->first() ?? abort(404, 'Not Found');
        return view('pages.ujian.info', compact('ujian'));
    }

    public function detail($id)
    {
        $ujian = Ujian::where('id', $id)->with('soal.myJawab')->first() ?? abort(404, 'Not Found');

        if ($ujian->myNilai) {
            return view('pages.ujian.detail', compact('ujian'));
        }

        return view('pages.ujian.detail', compact('ujian'));
    }
}
