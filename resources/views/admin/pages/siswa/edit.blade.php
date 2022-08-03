@extends('admin.layouts.main')

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('admin.siswa.update', $siswa->id) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf   
                    <div class="card-body">
                        <h6 class="text-uppercase text-sm">Form Update Siswa</h6>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nis">Nis</label>
                                    <input class="form-control @error('nis')
                                        is-invalid
                                    @enderror" id="nis" type="text" name="nis" required value="{{ old('nis', $siswa->nis) }}">
                                    @error('nis')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Siswa</label>
                                    <input class="form-control @error('name')
                                        is-invalid
                                    @enderror" id="name" type="text" name="name" required value="{{ old('name', $siswa->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Profil Siswa</label>
                                    <input type="hidden" name="oldImage" value="{{ $siswa->image }}">
                                    @if ($siswa->image)
                                        <img src="{{ asset('storage/' . $siswa->image ) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                    @endif
                                    
                                    <input class="form-control @error('image')
                                        is-invalid
                                    @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror 
                                </div>
                                <div class="form-group">
                                    <label for="kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="kelamin" name="kelamin">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Tempat Tinggal</label>
                                    <input class="form-control @error('alamat')
                                        is-invalid
                                    @enderror" id="alamat" type="text" name="alamat" required value="{{ old('alamat', $siswa->alamat) }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="telp">Nomer Telephone</label>
                                    <input class="form-control @error('telp')
                                        is-invalid
                                    @enderror" id="telp" type="text" name="telp" required value="{{ old('telp', $siswa->telp) }}">
                                    @error('telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                                    <input class="form-control @error('tanggal_lahir')
                                        is-invalid
                                    @enderror" id="tanggal_lahir" type="date" name="tanggal_lahir" required value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}">
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input class="form-control @error('tempat_lahir')
                                        is-invalid
                                    @enderror" id="tempat_lahir" type="text" name="tempat_lahir" required value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}">
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="wali">Wali</label>
                                    <input class="form-control @error('wali')
                                        is-invalid
                                    @enderror" id="wali" type="text" name="wali" required value="{{ old('wali', $siswa->wali) }}">
                                    @error('wali')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input class="form-control @error('email')
                                        is-invalid
                                    @enderror" id="email" type="email" name="email" required value="{{ old('email', $siswa->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control @error('password')
                                        is-invalid
                                    @enderror" id="password" type="password" name="password" value="{{ old('password') }}">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Daftar Kelas</label>
                                    <select class="form-control" id="kelas" name="kelas_id">
                                    @foreach ($kelas as $kls)
                                        @if (old('kelas_id', $siswa->kelas_id) == $kls->id)
                                            <option value="{{ $kls->id }}" selected>{{ $kls->nama_kelas }} - {{ $kls->tahunAjaran->tahun_ajaran}} - {{ $kls->semester->nama_semester }}</option>
                                        @else
                                            <option value="{{ $kls->id }}" >{{ $kls->nama_kelas }} - {{ $kls->tahunAjaran->tahun_ajaran}} - {{ $kls->semester->nama_semester }}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    <br>
                    <button class="btn btn-primary btn-sm w-100 ms-auto" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        
        imgPreview.style.display = 'block';

        // perintah untuk mengabil gambar
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection