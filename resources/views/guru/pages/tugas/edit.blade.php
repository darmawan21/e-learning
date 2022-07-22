@extends('guru.layouts.main')

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('guru.tugas.update', $tugas->id) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf   
                    <div class="card-body">
                        <h6 class="text-uppercase text-sm">Form Edit Tugas</h6>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mapel">Daftar Mata Pembelajaran</label>
                                    <select class="form-control" id="mapel" name="kelas_mapel_id">
                                    @foreach ($kelasmapels as $mapel)
                                        @if (old('kelas_mapel_id', $tugas->kelas_mapel_id) == $mapel->id)
                                            <option value="{{ $mapel->id }}" selected>{{ $mapel->mataPelajaran->nama_mapel }} - {{ $mapel->kelas->nama_kelas }}</option>
                                        @else
                                            <option value="{{ $mapel->id }}" >{{ $mapel->mataPelajaran->nama_mapel }} - {{ $mapel->kelas->nama_kelas }}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="judul_tugas">Title Tugas</label>
                                    <input class="form-control @error('judul_tugas')
                                        is-invalid
                                    @enderror" id="judul_tugas" type="text" name="judul_tugas" required value="{{ old('judul_tugas', $tugas->judul_tugas) }}">
                                    @error('judul_tugas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal" class="form-control-label">Tanggal Mulai</label>
                                    <input class="form-control @error('tanggal')
                                        is-invalid
                                    @enderror" id="tanggal" type="date" name="tanggal" required value="{{ old('tanggal', $tugas->tanggal) }}">
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
                                    @enderror" id="waktu" type="datetime-local" name="waktu" required value="{{ old('waktu', $tugas->waktu) }}">
                                    @error('waktu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="isi_tugas">Perintah Tugas</label>
                                    <input class="form-control" id="isi_tugas" type="hidden" name="isi_tugas" required value="{{ old('isi_tugas', $tugas->isi_tugas) }}">
                                    <trix-editor input="isi_tugas"></trix-editor>
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

<script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>

@endsection