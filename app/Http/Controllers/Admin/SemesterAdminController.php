<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $semesters = Semester::all();
        return view('admin.pages.semester.index', compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.semester.create');
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
            'nama_semester' => 'required',
        ]);

        Semester::create($validatedData);
        
        return redirect()->route('admin.semester.index')->with('success', 'Berhasil menambahkan semester');
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
    public function edit($semester_id)
    {
        $semester = Semester::where('id', $semester_id)->first();
        return view('admin.pages.semester.edit', compact('semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $semester_id)
    {
        $rule = [
            'nama_semester' => 'required',
        ];

        $validatedData = $request->validate($rule);

        Semester::where('id', $semester_id)->update($validatedData);
        
        return redirect()->route('admin.semester.index')->with('success', 'Berhasil mengubah semester');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($semester_id)
    {
        Semester::where('id', $semester_id)->delete();
        return redirect()->route('admin.semester.index')->with('success', 'Berhasil menghapus semester');
    }
}
