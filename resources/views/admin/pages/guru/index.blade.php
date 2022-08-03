@extends('admin.layouts.main')

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

                <a href="{{ route('admin.guru.create') }}" class="btn btn-icon btn-3 btn-primary">
                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                    <span class="btn-inner--text">Tambah Guru</span>
                </a>
                <h6>Data Guru</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Guru</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pangkat</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Alamat</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelamin</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Lahir</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($gurus as $guru)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                <div>
                                    @if ($guru->image)
                                        <img src="{{ asset('storage/' . $guru->image) }}" class="avatar avatar-sm me-3"> 
                                    @else
                                        <img src="{{ asset('img/profil-picture.png') }}" class="avatar avatar-sm me-3">
                                    @endif
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{$guru->name}}</h6>
                                    <p class="text-xs text-secondary mb-0">{{$guru->email}}</p>
                                </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$guru->pangkat}}</p>
                                <p class="text-xs text-secondary mb-0">{{$guru->nip}}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$guru->alamat}}</p>
                                <p class="text-xs text-secondary mb-0">{{$guru->telp}}</p>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$guru->kelamin}}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$guru->tanggal_lahir}}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <a href="{{ route('admin.kelas-mapel.index', $guru->id) }}" class="text-secondary font-weight-bold text-sm">
                                    <span class="badge badge-sm bg-gradient-primary">Kelas</span>
                                </a>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <a href="{{ route('admin.guru.edit', $guru->id) }}">
                                    <i class="fas fa-pencil-alt p-3"></i>
                                </a>
                                <a onclick="return confirm('Apakah anda yakin hapus data ini ?')" href="{{ route('admin.guru.destroy', $guru->id) }}">
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