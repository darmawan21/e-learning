@extends('guru.layouts.main')

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('guru.kelas_ujian.update', [$ujians->ujian_id, $ujians->id]) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf   
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Form Pilih Kelas</p>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kelas">Daftar Kelas</label>
                                    <select class="form-control" id="kelas" name="kelas_id">
                                    @foreach ($kelas as $kls)
                                        @if (old('kelas_id', $ujians->kelas_id) == $kls->id)
                                            <option value="{{ $kls->id }}" selected>{{ $kls->nama_kelas }} - {{ $kls->tahunAjaran->tahun_ajaran }} - {{ $kls->semester->nama_semester }}</option>
                                        @else
                                            <option value="{{ $kls->id }}" >{{ $kls->nama_kelas }} - {{ $kls->tahunAjaran->tahun_ajaran }} - {{ $kls->semester->nama_semester }}</option>
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