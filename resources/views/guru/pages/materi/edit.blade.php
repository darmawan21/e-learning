@extends('guru.layouts.main')

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('guru.materi.update', $materis->id) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf   
                    <div class="card-body">
                        <h6 class="text-uppercase text-sm">Form Edit Pilih Mata Pelajaran</h6>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mapel">Daftar Mata Pembelajaran</label>
                                    <select class="form-control" id="mapel" name="kelas_mapel_id">
                                    @foreach ($kelasmapels as $mapel)
                                        @if (old('kelas_mapel_id', $materis->kelas_mapel_id) == $mapel->id)
                                            <option value="{{ $mapel->id }}" selected>{{ $mapel->mataPelajaran->nama_mapel }} - {{ $mapel->kelas->nama_kelas }}</option>
                                        @else
                                            <option value="{{ $mapel->id }}" >{{ $mapel->mataPelajaran->nama_mapel }} - {{ $mapel->kelas->nama_kelas }}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_materi">Nama Materi</label>
                                    <input class="form-control @error('nama_materi')
                                        is-invalid
                                    @enderror" id="nama_materi" type="text" name="nama_materi" required value="{{ old('nama_materi', $materis->nama_materi) }}">
                                    @error('nama_materi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="konten">Materi</label>
                                    <input class="form-control" id="konten" type="hidden" name="konten" required value="{{ old('konten', $materis->konten) }}">
                                    <trix-editor input="konten"></trix-editor>
                                </div>
                                <div class="form-group">
                                    <label for="file">File Materi</label>
                                    <input type="hidden" name="oldFile" value="{{ $materis->file}}">
                                    
                                    <input class="form-control @error('file')
                                        is-invalid
                                    @enderror" id="file" type="file" name="file" value="{{ old('file') }}">
                                    @error('file')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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