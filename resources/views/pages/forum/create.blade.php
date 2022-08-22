@extends('layouts.main')

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('forum.store') }}" enctype="multipart/form-data">
                    @csrf   
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Form Tambah Forum</p>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Judul</label>
                                    <input type="text" class="form-control @error('title')
                                        is-invalid
                                    @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="body">Pertanyaan</label>
                                    <textarea class="form-control @error('body')
                                        is-invalid
                                    @enderror" id="body" rows="3" name="body" require autofocus>{{ old('body')}}</textarea>
                                    @error('body')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mataPelajaran">Mata Pelajaran</label>
                                    <select class="form-control" id="mataPelajaran" name="mata_pelajaran_id">
                                    @foreach ($mapel as $mpl)
                                        @if (old('mata_pelajaran_id') == $mpl->id)
                                            <option value="{{ $mpl->id }}" selected>{{ $mpl->nama_mapel }}</option>
                                        @else
                                            <option value="{{ $mpl->id }}" >{{ $mpl->nama_mapel }}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>

                                
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <button class="btn btn-primary btn-sm w-100 ms-auto" type="submit">Sumbit</button>
                    </div>
                    
                    
                </form>

            </div>
        </div>
    </div>
</div>

@endsection