<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Komentar;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class ForumSiswaController extends Controller
{
    public function index()
    {
        $forums = Forum::orderBy('created_at', 'desc')->get();
        return view('pages.forum.index', compact('forums'));
    }

    public function create()
    {
        $mapel = MataPelajaran::all();
        return view('pages.forum.create', compact('mapel'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'mata_pelajaran_id' => 'required',
            'body' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Forum::create($validatedData);
        return redirect()->route('forum.index')->with('success', 'Berhasil menambahkan pertanyaan');
    }

    public function view($id)
    {
        $forums = Forum::find($id);
        return view('pages.forum.view', compact('forums'));
    }

    public function post(Request $request, $id)
    {   
        $validatedData = $request->validate([
            'forum_id' => 'required',
            'konten' => 'required',
            'parent' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Komentar::create($validatedData);

        return redirect()->route('forum.view', $id)->with('success', 'Berhasil menambahkan komentar');
    }
}
