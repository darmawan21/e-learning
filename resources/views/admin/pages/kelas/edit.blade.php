@extends('admin.layouts.main')

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('admin.kelas.update', $kelas->id) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf   
                    <div class="card-body">
                        <h6 class="text-uppercase text-sm">Form Edit Kelas</h6>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_kelas">Nama Kelas </label>
                                    <input class="form-control @error('nama_kelas')
                                        is-invalid
                                    @enderror" id="nama_kelas" type="text" name="nama_kelas" required value="{{ old('nama_kelas', $kelas->nama_kelas) }}">
                                    @error('nama_kelas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tahunAjaran" class="form-label">Tahun Ajaran</label>
                                    <select class="form-select" name="tahun_ajaran_id">
                                        @foreach ($tahunAjarans as $tahunAjaran)
                                            @if (old('tahun_ajaran_id', $kelas->tahun_ajaran_id) == $tahunAjaran->id)
                                                <option value="{{ $tahunAjaran->id}}" selected>{{ $tahunAjaran->tahun_ajaran }}</option> 
                                            @else
                                                <option value="{{ $tahunAjaran->id}}" >{{ $tahunAjaran->tahun_ajaran }}</option> 
                                            @endif
                                            
                                        @endforeach
                                        
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="semester" class="form-label">Semester</label>
                                    <select class="form-select" name="semester_id">
                                        @foreach ($semesters as $semester)
                                            @if (old('tahun_ajaran_id', $kelas->semester_id) == $semester->id)
                                                <option value="{{ $semester->id}}" selected>{{ $semester->nama_semester }}</option> 
                                            @else
                                                <option value="{{ $semester->id}}" >{{ $semester->nama_semester }}</option> 
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