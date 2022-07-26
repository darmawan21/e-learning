@extends('guru.layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
            
            <div class="card-header pb-0">
                <h3 class="text-center">{{ $ujians->judul }}</h3>

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" style="color: white;" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text"><strong>Success!</strong> {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <a href="{{ route('guru.soal.create', $ujians->id) }}" class="btn btn-icon btn-3 btn-primary">
                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                    <span class="btn-inner--text">Tambah Soal</span>
                </a>
                <h6>Data Soal Pilihan Ganda</h6>
                <hr class="horizontal dark">
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Soal</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pilihan A</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pilihan B</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pilihan C</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pilihan D</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kunci</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ujians->soal as $soals)
                        <tr>
                            <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                            <td class="align-middle text-center text-sm">{{ $soals->soal }}</td>
                            <td class="align-middle text-center text-sm">
                                @if ($soals->image)
                                    <img src="{{ asset('storage/' . $soals->image) }}" alt="{{$soals->soal}}" style="width: 120px;">
                                @else
                                    <p style="font-size: 12px; font-style: italic;">Tidak ada gambar</p>
                                @endif  
                            </td>
                            <td class="align-middle text-center text-sm">{{ $soals->pilihan1 }}</td>
                            <td class="align-middle text-center text-sm">{{ $soals->pilihan2 }}</td>
                            <td class="align-middle text-center text-sm">{{ $soals->pilihan3 }}</td>
                            <td class="align-middle text-center text-sm">{{ $soals->pilihan4 }}</td>
                            <td class="align-middle text-center text-sm">{{ substr($soals->kunci, -1) }}</td>
                            <td class="align-middle text-center text-sm">
                                <a href="{{ route('guru.soal.edit', [$ujians->id, $soals->id]) }}" class="btn btn-outline-primary">
                                Edit
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('guru.soal.destroy', [$ujians->id, $soals->id])}}" class="btn btn-outline-primary">
                                    hapus
                                </a>
                            </td>
                            <!-- <td>
                                <form action="" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin?')">
                                        Hapus
                                    </button>
                                </form>
                            </td> -->
                            
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