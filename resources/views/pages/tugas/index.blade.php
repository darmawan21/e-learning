
@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-7 mt-4">
                <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Daftar Tugas</h6>
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" style="color: white;" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text"><strong>Success!</strong> {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        @foreach ($tugass as $tugas)
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">{{$tugas->tugas->judul_tugas}}</h6>
                                <span class="mb-2 text-xs">Mata Pelajaran <span class="text-dark font-weight-bold ms-sm-2">: {{$tugas->tugas->kelasMapel->MataPelajaran->nama_mapel}}</span></span>
                                <span class="mb-2 text-xs">Tanggal & Waktu <span class="text-dark ms-sm-2 font-weight-bold" id="waktu">: {{$tugas->tugas->waktu}}</span></span>
                                <span class="text-xs">Perintah Tugas: <br><span class="text-dark ms-sm-2 font-weight-bold">{!! $tugas->tugas->isi_tugas !!}</span></span>
                            </div>
                            @if ($tugas->tugas->waktu <= now('Asia/Jakarta')->toDateTimeString())
                                <div class="ms-auto text-end" id="demo" style="display: none;">
                                    <a href="{{ route('tugas.create', $tugas->tugas_id) }}">
                                        <i class="ni ni-single-copy-04"></i> Kumpulkan Tugas
                                    </a>
                                </div>
                            @else
                                <div class="ms-auto text-end" id="demo">
                                    <a href="{{ route('tugas.create', $tugas->tugas_id) }}">
                                        <i class="ni ni-single-copy-04"></i> Kumpulkan Tugas
                                    </a>
                                </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

