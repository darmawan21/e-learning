@extends('pages.home')

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
                                <h6 class="mb-3">Mata Pelajaran </h6>
                                <h6 class="mb-3">Kelas </h6>
                                <h6 class="mb-3">Jumlah Soal </h6>
                                <h6 class="mb-3">Waktu </h6>
                            </div>
                            <div class="p-4">
                                <p>: {{ $ujian->mataPelajaran->nama_mapel }}</p>
                                <p>: {{ $ujian->judul }}</p>
                                <p>: {{ count($ujian->soal) }}</p>
                                <p>: {{ date('H:i', strtotime($ujian->waktu ))}}</p>
                            </div>
                        </div>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-body pt-4 p-3">
                    <div class="alert alert-info alert-dismissible fade show" style="color: white;" role="alert">
                        <span class="alert-text"><strong>Info!</strong> 
                            <p>1. Baca dengan seksama dan teliti ketika mengerjakan Ujian.</p>
                            <p>2. Pastikan Koneksi anda bagus.</p>
                            <p>3. Pilih browser dengan versi terbaru.</p>
                            <p>4. Jika mati lampu, segera hubungi guru mata pelajaran terkait untuk melakukan ujian ulang.</p>
                    </div>
                    <a href="{{ route('ujian.start', $ujian->id) }}" class="btn btn-danger btn-lg w-100">Kerjakan</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection