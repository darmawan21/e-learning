
@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-profile">
            <img src="../assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
                <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                    <a href="javascript:;">
                    @if ($profil->image)
                        <img src="{{ asset('storage/' . $profil->image) }}" class="rounded-circle img-fluid border border-2 border-white"> 
                    @else
                        <img src="{{ asset('img/profil-picture.png') }}" class="rounded-circle img-fluid border border-2 border-white">
                    @endif
                    
                    </a>
                </div>
                </div>
            </div>
            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" style="color: white;" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text"><strong>Success!</strong> {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="d-flex justify-content-end">
                <a href="{{ route('profil_siswa.edit', $profil->id) }}" class="btn btn-dark">
                    Update
                </a>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                </div>
                <div class="text-center">
                    <h5>
                        {{ $profil->name }}<span class="font-weight-light">
                    </h5>
                <div>
                    <i class="ni education_hat mr-2"></i>{{ $profil->tanggal_lahir}}
                </div>
                <div class="h6 font-weight-300">
                    <i class="ni location_pin mr-2"></i>{{$profil->alamat}}
                </div>
                <div class="h6 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>{{$profil->kelas->nama_kelas}}
                </div>
                <div>
                    <i class="ni education_hat mr-2"></i>SMP Negeri 5 Mesuji Makmur 
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

   