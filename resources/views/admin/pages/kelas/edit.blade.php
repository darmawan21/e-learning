@extends('admin.layouts.main')

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('admin.kelas.update', $kelas->id) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf   
                    <div class="card-body">
                        <h6 class="text-uppercase text-sm">Form Edit Kelas</h6>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_kelas">Nama Kelas & Tahun </label>
                                    <input class="form-control @error('nama_kelas')
                                        is-invalid
                                    @enderror" id="nama_kelas" type="text" name="nama_kelas" required value="{{ old('nama_kelas', $kelas->nama_kelas) }}">
                                    @error('nama_kelas')
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