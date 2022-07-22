@extends('guru.layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
            
            <div class="card-header pb-0">
                
                <h6>Data Pengumpulan Tugas</h6><br>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mata Pelajaran</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul Tugas</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Tugas</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas</th>

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
                                @foreach ($tugas->kelasTugas as $kelas)
                                <a href="{{ route('guru.tugas_siswa.show', ['tugas_id' => $tugas->id, 'kelas_id' => $kelas->kelas_id]) }}" class="text-secondary font-weight-bold text-sm">
                                    <span class="badge badge-sm bg-gradient-primary" style="margin-top: 5px;">{{ $kelas->kelas->nama_kelas }}</span>
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