@extends('guru.layouts.main')

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('guru.soal.store', $ujians->id) }}" enctype="multipart/form-data">
                    @csrf   
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Form Soal Ujian {{$ujians->judul}}</p>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="soal">Soal</label>
                                    <textarea class="form-control @error('soal')
                                        is-invalid
                                    @enderror" id="soal" rows="3" name="soal" require autofocus>{{ old('soal')}}</textarea>
                                    @error('soal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Upload Gambar Jika Soal Menggunakan Gambar</p>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="image" class="form-control-label">Upload Gambar</label>
                                <input class="form-control @error('image')
                                    is-invalid
                                @enderror" type="file" id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Pilihan Ganda</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pilihan1">Pilihan A</label>
                                    <textarea class="form-control @error('pilihan1')
                                        is-invalid
                                    @enderror" id="pilihan1" rows="3" require name="pilihan1">{{ old('pilihan1') }}</textarea>
                                    @error('pilihan1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pilihan2">Pilihan B</label>
                                <textarea class="form-control @error('pilihan2')
                                    is-invalid
                                @enderror" id="pilihan2" rows="3" name="pilihan2">{{ old('pilihan2') }}</textarea>
                                @error('pilihan2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pilihan3">Pilihan C</label>
                                <textarea class="form-control @error('pilihan3')
                                    is-invalid
                                @enderror" id="pilihan3" rows="3" name="pilihan3">{{ old('pilihan3') }}</textarea>
                                @error('pilihan3')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pilihan4">Pilihan D</label>
                                <textarea class="form-control @error('pilihan4')
                                    is-invalid
                                @enderror" id="pilihan4" rows="3" name="pilihan4">{{ old('pilihan4') }}</textarea>
                                @error('pilihan4')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal dark">
                    <div class="row">
                        <p class="text-uppercase text-sm">Kunci Jawaban</p>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kunci">Kunci</label>
                                <select class="form-control" id="kunci" name="kunci">
                                <option @if (old('kunci') === 'pilihan1')
                                    selected
                                @endif value="pilihan1">A</option>
                                <option @if (old('kunci') === 'pilihan2')
                                    selected
                                @endif value="pilihan2">B</option>
                                <option @if (old('kunci') === 'pilihan3')
                                    selected
                                @endif value="pilihan3">C</option>
                                <option @if (old('kunci') === 'pilihan4')
                                    selected
                                @endif value="pilihan4">D</option>
                                
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary btn-sm w-50 ms-auto" type="submit">Sumbit</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection