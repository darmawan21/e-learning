@extends('guru.layouts.main')

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('guru.ujian.store') }}" enctype="multipart/form-data">
                    @csrf   
                    <div class="card-body">
                        <h6 class="text-uppercase text-sm">Form Pengaturan Ujian</h6>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jenis_ujian">Jenis Ujian</label>
                                    <select class="form-control" id="jenis_ujian" name="jenis_ujian_id">
                                    @foreach ($jenisujians as $jenisujian)
                                        @if (old('jenis_ujian_id') == $jenisujian->id)
                                            <option value="{{ $jenisujian->id }}" selected>{{ $jenisujian->jenis_ujian }}</option>
                                        @else
                                            <option value="{{ $jenisujian->id }}" >{{ $jenisujian->jenis_ujian }}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="mapel">Daftar Mata Pembelajaran</label>
                                    <select class="form-control" id="mapel" name="kelas_mapel_id">
                                    @foreach ($kelasmapels as $mapel)
                                        @if (old('kelas_mapel_id') == $mapel->id)
                                            <option value="{{ $mapel->id }}" selected>{{ $mapel->mataPelajaran->nama_mapel }} - {{ $mapel->kelas->nama_kelas }} - {{ $mapel->kelas->tahunAjaran->tahun_ajaran }} - {{ $mapel->kelas->semester->nama_semester }}</option>
                                        @else
                                            <option value="{{ $mapel->id }}" >{{ $mapel->mataPelajaran->nama_mapel }} - {{ $mapel->kelas->nama_kelas }} - {{ $mapel->kelas->tahunAjaran->tahun_ajaran }} - {{ $mapel->kelas->semester->nama_semester }}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Nama Ujian</label>
                                    <input class="form-control @error('judul')
                                        is-invalid
                                    @enderror" id="judul" type="text" name="judul" required value="{{ old('judul') }}">
                                    @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal" class="form-control-label">Tanggal Mulai</label>
                                    <input class="form-control @error('tanggal')
                                        is-invalid
                                    @enderror" id="tanggal" type="datetime-local" name="tanggal" required value="{{ old('tanggal') }}">
                                    @error('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    
                                    <label for="waktu" class="form-control-label">Waktu</label>
                                    <div class="alert alert-info alert-dismissible fade show" style="color: white;" role="alert">
                                        <span class="alert-text"><strong>Info!</strong> Batas tanggal dan waktu untuk pengumpulan tugas</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <input class="form-control @error('waktu')
                                        is-invalid
                                    @enderror" id="waktu" type="datetime-local" name="waktu" required value="{{ old('waktu') }}">
                                    @error('waktu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="publish" disabled>publish</option>
                                        <option value="draft">draft</option>
                                        <option value="passive">passive</option>
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