
@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-10 mb-lg-0 mb-4">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                        
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        @foreach ($materis as $materi)
                        <div class="col-md-12 mb-md-0 mb-4 mt-4">
                            <div class="card card-body border card-plain border-radius-lg">
                                <h4 class="mb-0 text-center">{{ $materi->nama_materi }}</h4>
                                <p>{!! $materi->konten !!}</p>
                                @if ($materi->file != null)
                                    <a href="{{ asset('storage/' . $materi->file) }}"><i class="fas fa-file-download"></i> Download Materi</a>
                                @endif
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

   