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

                <a href="{{ route('admin.siswa.create') }}" class="btn btn-icon btn-3 btn-primary">
                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                    <span class="btn-inner--text">Tambah Siswa</span>
                </a>
                <h6>Data Siswa</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Siswa</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kelas</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Alamat</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelamin</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Lahir</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                <div>
                                    @if ($siswa->image)
                                        <img src="{{ asset('storage/' . $siswa->image) }}" class="avatar avatar-sm me-3"> 
                                    @else
                                        <img src="{{ asset('img/profil-picture.png') }}" class="avatar avatar-sm me-3">
                                    @endif
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{$siswa->name}}</h6>
                                    <p class="text-xs text-secondary mb-0">{{$siswa->email}}</p>
                                </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$siswa->kelas->nama_kelas}}</p>
                                <p class="text-xs text-secondary mb-0">{{$siswa->nis}}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{$siswa->alamat}}</p>
                                <p class="text-xs text-secondary mb-0">{{$siswa->telp}}</p>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$siswa->kelamin}}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$siswa->tanggal_lahir}}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <a href="{{ route('admin.siswa.edit', $siswa->id) }}">
                                    <i class="fas fa-pencil-alt p-3"></i>
                                </a>
                                <a onclick="return confirm('Apakah anda yakin hapus data ini ?')" href="{{ route('admin.siswa.destroy', $siswa->id) }}">
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