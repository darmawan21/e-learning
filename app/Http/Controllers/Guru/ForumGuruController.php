<?php

namespace App\Http\Controllers\Guru;

use App\Models\Forum;
use App\Models\Komentar;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Http\Controllers\Controller;

class ForumGuruController extends Controller
{
    public function index()
    {
        $forums = Forum::orderBy('created_at', 'desc')->get();
        return view('guru.pages.forum.index', compact('forums'));
    }

    public function create()
    {
        $mapel = MataPelajaran::all();
        return view('guru.pages.forum.create', compact('mapel'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'mata_pelajaran_id' => 'required',
            'body' => 'required',
        ]);

        $validatedData['guru_id'] = auth()->guard('guru')->user()->id;

        Forum::create($validatedData);
        return redirect()->route('guru.forum.index')->with('success', 'Berhasil menambahkan pertanyaan');
    }

    public function view($id)
    {
        $forums = Forum::find($id);
        return view('guru.pages.forum.view', compact('forums'));
    }

    public function post(Request $request, $id)
    {
        $validatedData = $request->validate([
            'forum_id' => 'required',
            'konten' => 'required',
            'parent' => 'required',
        ]);

        $validatedData['guru_id'] = auth()->guard('guru')->user()->id;

        Komentar::create($validatedData);

        return redirect()->route('guru.forum.view', $id)->with('success', 'Berhasil menambahkan komentar');
    }
}
