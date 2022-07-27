@extends('layouts.main')

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('tugas.store', $tugas->id) }}" enctype="multipart/form-data">
                    @csrf   
                    <div class="card-body">
                        <h6 class="text-uppercase text-sm">Form Pengumpulan Tugas</h6>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input class="form-control @error('subject')
                                        is-invalid
                                    @enderror" id="subject" type="text" name="subject" required value="{{ old('subject') }}">
                                    @error('subject')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="file">File Tugas</label>
                                    <input class="form-control @error('file')
                                        is-invalid
                                    @enderror" id="file" type="file" name="file" value="{{ old('file') }}">
                                    @error('file')
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