@extends('guru.layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
            
            <div class="card-header pb-0">
                <button class="btn btn-icon btn-3 btn-primary" type="button">
                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                    <span class="btn-inner--text">Tambah Ujian</span>
                </button>
                <h6>Data Ujian</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mata Pelajaran</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul Ujian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Ujian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe Ujian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Ujian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Soal</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Ujian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pilih Kelas Ujian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ujians as $ujian)
                        <tr>
                            <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                            <td class="align-middle text-center text-sm">{{ $ujian->mataPelajaran->nama_mapel }}</td>
                            <td class="align-middle text-center text-sm">{{ $ujian->judul }}</td>
                            <td class="align-middle text-center text-sm">{{ $ujian->jenisUjian->jenis_ujian }}</td>
                            <td class="align-middle text-center text-sm">{{ $ujian->acak }}</td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $ujian->tanggal }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <a href="{{ route('guru.soal.index', $ujian->id) }}" class="text-secondary font-weight-bold text-sm">
                                    @if (count($ujian->soal) > 0)
                                        <span class="badge badge-sm bg-gradient-primary">Soal ( {{ count($ujian->soal)}} )</span>   
                                    @else
                                        <span class="badge badge-sm bg-gradient-primary">Soal ( 0 )</span>
                                    @endif
                                </a>
                            </td>
                            <td class="align-middle text-center text-sm">
                                @switch($ujian->status)
                                    @case('publish')
                                            <span class="badge badge-sm bg-gradient-success">Aktif</span>
                                        @break
                                    @case('passive')
                                        <span class="badge badge-sm bg-gradient-danger">Pasif</span>
                                    @break
                                    @case('draft')
                                        <span class="badge badge-sm bg-gradient-warning">Disimpan</span>
                                    @break
                                    @default    
                                @endswitch
                            </td>
                            <td class="align-middle text-center text-sm">
                                <a href="{{ route('guru.kelas_ujian.index', $ujian->id) }}" class="text-secondary font-weight-bold text-sm">
                                    <span class="badge badge-sm bg-gradient-primary">Kelas</span>
                                </a>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <a href="#!" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Edit
                                </a>
                                <a href="#!" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Hapus
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