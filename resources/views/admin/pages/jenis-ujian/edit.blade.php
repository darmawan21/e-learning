@extends('admin.layouts.main')

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('admin.jenis_ujian.update', $jenisUjian->id) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf   
                    <div class="card-body">
                        <h6 class="text-uppercase text-sm">Form Edit Jenis Ujian</h6>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jenis_ujian">Jenis Ujian </label>
                                    <input class="form-control @error('jenis_ujian')
                                        is-invalid
                                    @enderror" id="jenis_ujian" type="text" name="jenis_ujian" required value="{{ old('jenis_ujian', $jenisUjian->jenis_ujian) }}">
                                    @error('jenis_ujian')
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