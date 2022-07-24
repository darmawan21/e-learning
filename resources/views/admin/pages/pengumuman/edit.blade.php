@extends('admin.layouts.main')

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('admin.pengumuman.update', $pengumumans->id) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf   
                    <div class="card-body">
                        <h6 class="text-uppercase text-sm">Form Edit Pengumuman</h6>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pengumuman">Pengumuman</label>
                                    <input class="form-control @error('pengumuman')
                                        is-invalid
                                    @enderror" id="pengumuman" type="text" name="pengumuman" required value="{{ old('pengumuman', $pengumumans->pengumuman) }}">
                                    @error('pengumuman')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Daftar Kelas</label>
                                    <select class="form-control" id="kelas" name="kelas_id">
                                    @foreach ($kelas as $kls)
                                        @if (old('kelas_id', $pengumumans->kelas_id) == $kls->id)
                                            <option value="{{ $kls->id }}" selected>{{ $kls->nama_kelas }}</option>
                                        @else
                                            <option value="{{ $kls->id }}" >{{ $kls->nama_kelas }}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    <br>
                    <button class="btn btn-primary btn-sm w-100 ms-auto" type="submit">Sumbit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection