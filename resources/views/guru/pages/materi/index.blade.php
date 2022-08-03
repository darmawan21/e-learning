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

                <a href="{{ route('guru.materi.create') }}" class="btn btn-icon btn-3 btn-primary">
                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                    <span class="btn-inner--text">Tambah Materi</span>
                </a>
                <h6>Data Materi</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Materi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Materi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mata Pelajaran</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($materis as $materi)
                            <tr>
                                <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                                <td class="align-middle text-center text-sm">{{ $materi->nama_materi }}</td>
                                <td class="align-middle text-center text-sm">
                                    <!-- Button trigger modal -->
                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fas fa-file-alt"> View</i>
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$materi->nama_materi}} | {{ $materi->kelasMapel->MataPelajaran->nama_mapel }} | {{ $materi->kelasMapel->kelas->nama_kelas }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-start">
                                            <p>{!! $materi->konten !!}</p>
                                            @if ($materi->file != null)
                                                <a href="{{ asset('storage/' . $materi->file) }}"><i class="fas fa-file-download"></i> Download Materi</a>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center text-sm">{{ $materi->kelasMapel->MataPelajaran->nama_mapel }}</td>
                                <td class="align-middle text-center text-sm">{{ $materi->kelasMapel->kelas->nama_kelas }} - {{$materi->kelasMapel->kelas->tahunAjaran->tahun_ajaran}} - {{$materi->kelasMapel->kelas->semester->nama_semester}}</td>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{ route('guru.materi.edit', $materi->id) }}">
                                        <i class="fas fa-pencil-alt p-3"></i>
                                    </a>
                                    <a onclick="return confirm('Apakah anda yakin hapus data ini ?')" href="{{ route('guru.materi.destroy', $materi->id) }}">
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