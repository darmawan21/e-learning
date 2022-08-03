@extends('admin.layouts.main')

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('admin.tahun_ajaran.store') }}" enctype="multipart/form-data">
                    @csrf   
                    <div class="card-body">
                        <h6 class="text-uppercase text-sm">Form Tahun Ajaran</h6>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tahun_ajaran">Tahun Ajaran </label>
                                    <input class="form-control @error('tahun_ajaran')
                                        is-invalid
                                    @enderror" id="tahun_ajaran" type="text" name="tahun_ajaran" required value="{{ old('tahun_ajaran') }}">
                                    @error('tahun_ajaran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                    <br>
                    <button class="btn btn-primary btn-sm w-100 ms-auto" type="submit">Sumbit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection