@extends('guru.layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
            
            <div class="card-header pb-0">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" style="color: white;" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text"><strong>Success!</strong> {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <a href="{{ route('guru.tugas.create') }}" class="btn btn-icon btn-3 btn-primary">
                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                    <span class="btn-inner--text">Tambah Tugas</span>
                </a>
                <h6>Data Tugas</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mata Pelajaran</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($tugass as $tugas)
                            <tr>
                                <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                                <td class="align-middle text-center text-sm">{{ $tugas->kelasMapel->MataPelajaran->nama_mapel }}</td>
                                <td class="align-middle text-center text-sm">{{ $tugas->judul_tugas }}</td>
                                <td class="align-middle text-center text-sm">{{ $tugas->tanggal }}</td>
                                <td class="align-middle text-center text-sm">
                                <a href="{{ route('guru.kelas_tugas.index', $tugas->id) }}" class="text-secondary font-weight-bold text-sm">
                                    <span class="badge badge-sm bg-gradient-primary">Kelas</span>
                                </a>
                                </td>   
                                <td class="align-middle text-center text-sm">
                                    <a href="{{ route('guru.tugas.edit', $tugas->id) }}">
                                        <i class="fas fa-pencil-alt p-3"></i>
                                    </a>
                                    <a onclick="return confirm('Apakah anda yakin hapus data ini ?')" href="{{ route('guru.tugas.destroy', $tugas->id) }}">
                                        <i class="far fa-trash-alt text-danger"></i>
                                    </a>
                                </td>
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