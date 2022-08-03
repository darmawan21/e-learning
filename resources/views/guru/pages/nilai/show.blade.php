@extends('guru.layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                </div>
                <div class="card-body p-3">
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                        @foreach ($kelas as $kelasu)
                            <h6 class="mb-3 text-sm">Mata Pelajaran <span class="text-dark font-weight-bold ms-sm-2">: {{$kelasu->ujian->kelasMapel->mataPelajaran->nama_mapel}}</span></h6>
                            <h6 class="mb-3 text-sm">Kelas <span class="text-dark font-weight-bold ms-sm-2">: {{$kelasu->kelas->nama_kelas}} - {{$kelasu->kelas->tahunAjaran->tahun_ajaran}} - {{ $kelasu->kelas->semester->nama_semester}}</span></h6>
                            <h6 class="mb-3 text-sm">Jenis Ujian <span class="text-dark font-weight-bold ms-sm-2">: {{$kelasu->ujian->jenisUjian->jenis_ujian}}</span></h6>
                        @endforeach
                    </div>
                    </li>
                </ul>
                </div>
              </div>
        </div>
        <div class="col-12">
            <div class="card mb-4" style="margin-top: 30px;">
            <div class="card-header pb-0">
                <h6>Data Nilai Ujian</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Siswa</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Benar</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Salah</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kosong</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)                        
                            <tr>
                                <td class="align-middle text-center text-sm">{{$loop->iteration}}</td>
                                <td class="align-middle text-center text-sm">{{$item->user->name}}</td>
                                <td class="align-middle text-center text-sm">{{$item->correct}}</td>
                                <td class="align-middle text-center text-sm">{{$item->wrong}}</td>
                                <td class="align-middle text-center text-sm">{{$item->empty}}</td>
                                <td class="align-middle text-center text-sm">{{$item->point}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection