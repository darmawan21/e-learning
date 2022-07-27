

@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Informasi Ujian</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                    <li class="list-group-item border-0 d-flex justify-content-star p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex justify-content-center mb-3">
                            <div class="p-4" style="margin-right: 5px;">
                                <h6 class="mb-3">Nis </h6>
                                <h6 class="mb-3">Nama </h6>
                                <h6 class="mb-3">Kelas </h6>
                                <h6 class="mb-3">Mata Pelajaran </h6>
                                <h6 class="mb-3">Jumlah Soal </h6>
                                <h6 class="mb-3">Jawaban Benar </h6>
                                <h6 class="mb-3">Jawaban Salah </h6>
                                <h6 class="mb-3">Nilai </h6>
                            </div>  
                            <div class="p-4">
                                <p>: {{ Auth::user()->id }}</p>
                                <p>: {{ Auth::user()->name }}</p>
                                <p>: {{ $ujian->kelasMapel->mataPelajaran->nama_mapel }}</p>
                                <p>: {{ $ujian->judul }}</p>
                                <p>: {{ count($ujian->soal) }}</p>
                                <p>: {{ $ujian->myNilai->correct }}</p>
                                <p>: {{ $ujian->myNilai->wrong }}</p>
                                : <span class="badge badge-md bg-gradient-success">{{ $ujian->myNilai->point }}</span>
                            </div>
                        </div>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <div class="card mb-4">
                <div class="card-header pb-0">
                <h6>Ranking Top 10</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#Rank</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai</th>
                        <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ujian->topTen as $nilai)
                        <tr>
                            <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                            <td class="align-middle justify-content-center">
                                <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="{{ asset('assets/img/team-2.jpg')}}" class="avatar avatar-sm me-3" alt="user1">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $nilai->user->name }}</h6>
                                    <p class="text-xs text-secondary mb-0">{{ $nilai->user->email }}</p>
                                </div>
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $nilai->point }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            <a href="{{ route('ujian.index') }}" class="btn btn-danger btn-lg w-100">Kembali</a>
            <a href="{{ route('ujian.detail', $ujian->id) }}" class="btn btn-danger btn-lg w-100">Review Jawaban Ujian</a>
            
        </div>
    </div>
</div>
@endsection

