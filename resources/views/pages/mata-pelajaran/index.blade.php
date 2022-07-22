
@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-10 mb-lg-0 mb-4">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">{{ Auth()->user()->kelas->nama_kelas}}</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        @foreach ($mapels as $mapel)
                        <div class="col-md-6 mb-md-0 mb-4 mt-4">
                            <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                            <h6 class="mb-0">{{ $mapel->mataPelajaran->nama_mapel }}</h6>
                            <a href="{{ route('mata_pelajaran.show', $mapel->id)}}" class="ms-auto">
                                <i class="ni ni-bold-right p-3"></i>
                            </a>
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

   