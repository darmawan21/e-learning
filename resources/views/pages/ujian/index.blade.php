@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
            
            <div class="card-header pb-0">
                <h3 class="text-center"></h3>

                <h6>Info Soal</h6>
                <hr class="horizontal dark">
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
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mata Pelajaran</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Ujian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($ujians as $ujian)
                        <tr>
                            <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                            <td class="align-middle text-center text-sm">{{ $ujian->kelasMapel->MataPelajaran->nama_mapel }}</td>
                            <td class="align-middle text-center text-sm">{{ $ujian->judul }}</td>
                            <td class="align-middle text-center text-sm">{{ $ujian->jenisUjian->jenis_ujian }}</td>
                            @if ( count($ujian->nilai) > 0)
                                <td class="align-middle text-center text-sm">
                                    <a href="{{ route('ujian.info', $ujian->id) }}" class="btn btn-outline-info">
                                    Info Soal
                                    </a>
                                </td>
                            @else
                                <td class="align-middle text-center text-sm">
                                    <a href="{{ route('ujian.show', $ujian->id) }}" class="btn btn-outline-primary">
                                    Kerjakan
                                    </a>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <hr class="horizontal dark">
            </div>
        </div>
    </div>
</div>
@endsection