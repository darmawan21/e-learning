@extends('guru.layouts.main')

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <form method="POST" action="{{ route('guru.profil_guru.update', $profil->id) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf   
                    <div class="card-body">
                        <h6 class="text-uppercase text-sm">Form Update Guru</h6>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nip">Nip</label>
                                    <input class="form-control @error('nip')
                                        is-invalid
                                    @enderror" id="nip" type="text" name="nip" required value="{{ old('nip', $profil->nip) }}">
                                    @error('nip')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Guru</label>
                                    <input class="form-control @error('name')
                                        is-invalid
                                    @enderror" id="name" type="text" name="name" required value="{{ old('name', $profil->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Profil Guru</label>
                                    <input type="hidden" name="oldImage" value="{{ $profil->image }}">
                                    @if ($profil->image)
                                        <img src="{{ asset('storage/' . $profil->image ) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
                                    @enderror" id="alamat" type="text" name="alamat" required value="{{ old('alamat', $profil->alamat) }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input class="form-control @error('agama')
                                        is-invalid
                                    @enderror" id="agama" type="text" name="agama" required value="{{ old('agama', $profil->agama) }}">
                                    @error('agama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="telp">Nomer Telephone</label>
                                    <input class="form-control @error('telp')
                                        is-invalid
                                    @enderror" id="telp" type="text" name="telp" required value="{{ old('telp', $profil->telp) }}">
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
                                    @enderror" id="tanggal_lahir" type="date" name="tanggal_lahir" required value="{{ old('tanggal_lahir', $profil->tanggal_lahir) }}">
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
                                    @enderror" id="tempat_lahir" type="text" name="tempat_lahir" required value="{{ old('tempat_lahir', $profil->tempat_lahir) }}">
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pangkat">Jabatan</label>
                                    <input class="form-control @error('pangkat')
                                        is-invalid
                                    @enderror" id="pangkat" type="text" name="pangkat" required value="{{ old('pangkat', $profil->pangkat) }}">
                                    @error('pangkat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input class="form-control @error('email')
                                        is-invalid
                                    @enderror" id="email" type="email" name="email" required value="{{ old('email', $profil->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                            </div>
                        </div>
                        
                    <br>
                    <button class="btn btn-primary btn-sm w-100 ms-auto" type="submit">Edit</button>
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