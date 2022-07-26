@extends('guru.layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
            
            <div class="card-header pb-0">
                
                <h6>Data Nilai Ujian</h6><br>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Ujian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mata Pelajaran</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul Ujian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Ujian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Soal</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Daftar Kelas</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ujians as $ujian)
                        <tr>
                            <td class="align-middle text-center text-sm">{{ $loop->iteration }}</td>
                            <td class="align-middle text-center text-sm">{{ $ujian->jenisUjian->jenis_ujian }}</td>
                            <td class="align-middle text-center text-sm">{{ $ujian->kelasMapel->mataPelajaran->nama_mapel }}</td>
                            <td class="align-middle text-center text-sm">{{ $ujian->judul }}</td>
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
                                @foreach ($ujian->kelasUjian as $kelas)
                                <a href="{{ route('guru.nilai.show', ['ujian_id' => $ujian->id, 'kelas_id' => $kelas->kelas_id]) }}" class="text-secondary font-weight-bold text-sm">
                                    <span class="badge badge-sm bg-gradient-primary" style="margin-top: 5px;">{{ $kelas->kelas->nama_kelas }} - {{ $kelas->kelas->tahunAjaran->tahun_ajaran}}</span>
                                </a><br>
                                @endforeach
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