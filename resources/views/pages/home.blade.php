@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
        <div class="card-body p-3" style="height: 115px;">
            <div class="row">
            <div class="col-8">
                <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Mata Pelajaran</p>
                <h5 class="font-weight-bolder">
                    {{count($mapel)}}
                </h5>
                </div>
            </div>
            <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
        <div class="card-body p-3" style="height: 115px;">
            <div class="row">
            <div class="col-8">
                <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Tugas</p>
                <h5 class="font-weight-bolder">
                    {{count($tugas)}}
                </h5>
                </div>
            </div>
            <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
        <div class="card-body p-3" style="height: 115px;">
            <div class="row">
            <div class="col-8">
                <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Ujian</p>
                <h5 class="font-weight-bolder">
                    {{count($kelasUjian)}}
                </h5>
                </div>
            </div>
            <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card card-frame">
            <div class="card-body">
                
                <h3 class="card-title mb-3 text-center">Dashboard Siswa Aplikasi E-Learning</h3>
                <p class="card-text mb-4 text-center">SMP NEGERI 5 MESUJI MAKMUR</p>

                @foreach ($pengumumans as $pengumuman)
                <div class="col-12">
                <div class="alert alert-info alert-dismissible fade show" style="color: white;" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Info!</strong> {{ $pengumuman->pengumuman }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</div>
@endsection