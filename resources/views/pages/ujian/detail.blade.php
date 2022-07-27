@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Informasi Ujian</h6>
                </div>
                <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            @foreach ($ujian->soal as $soals)
                            <li class="list-group-item border-0 justify-content-star p-4 mb-2 bg-gray-100 border-radius-lg">
                                @if ($soals->kunci === $soals->myJawab->jawaban)
                                    <i class="ni ni-check-bold"></i>
                                @else
                                    <i class="ni ni-fat-remove"></i>
                                @endif
                                <strong> {{$loop->iteration}}</strong> . {{$soals->soal}}
                                <div class="form-check mb-3 mt-3">
                                    @if ('pilihan1' == $soals->kunci)
                                        <label class="form-check-label text-bold" style="color: green;" for="ujian{{$ujian->id}}1">
                                            A . {{$soals->pilihan1}}
                                        </label>
                                    @elseif ('pilihan1' == $soals->myJawab->jawaban)
                                        <label class="form-check-label text-bold" for="ujian{{$ujian->id}}1">
                                            A . {{$soals->pilihan1}}
                                        </label>
                                    @else
                                        <label class="form-check-label" for="ujian{{$ujian->id}}1">
                                            A . {{$soals->pilihan1}}
                                        </label>
                                    @endif
                                    
                                </div>      
                                <div class="form-check mb-3 mt-3">
                                    @if ('pilihan2' == $soals->kunci)
                                        <label class="form-check-label text-bold" style="color: green;" for="ujian{{$ujian->id}}2">
                                            B . {{$soals->pilihan2}}
                                        </label>
                                    @elseif ('pilihan2' == $soals->myJawab->jawaban)
                                        <label class="form-check-label text-bold" for="ujian{{$ujian->id}}2">
                                            B . {{$soals->pilihan2}}
                                        </label>
                                    @else
                                        <label class="form-check-label" for="ujian{{$ujian->id}}2">
                                            B . {{$soals->pilihan2}}
                                        </label>
                                    @endif
                                </div>
                                <div class="form-check mb-3 mt-3">
                                    @if ('pilihan3' == $soals->kunci)
                                        <label class="form-check-label text-bold" style="color: green;" for="ujian{{$ujian->id}}3">
                                            C . {{$soals->pilihan3}}
                                        </label>SS
                                    @elseif ('pilihan3' == $soals->myJawab->jawaban)
                                        <label class="form-check-label text-bold" for="ujian{{$ujian->id}}3">
                                            C . {{$soals->pilihan3}}
                                        </label>
                                    @else
                                        <label class="form-check-label" for="ujian{{$ujian->id}}3">
                                            C . {{$soals->pilihan3}}
                                        </label>
                                    @endif
                                    
                                </div>
                                <div class="form-check mb-3 mt-3">
                                    @if ('pilihan4' == $soals->kunci)
                                        <label class="form-check-label text-bold" style="color: green;" for="ujian{{$ujian->id}}4">
                                            D . {{$soals->pilihan4}}
                                        </label>
                                    @elseif ('pilihan4' == $soals->myJawab->jawaban)
                                        <label class="form-check-label text-bold" for="ujian{{$ujian->id}}4">
                                            D . {{$soals->pilihan4}}
                                        </label>
                                    @else
                                        <label class="form-check-label" for="ujian{{$ujian->id}}4">
                                            D . {{$soals->pilihan4}}
                                        </label>
                                    @endif
                                </div>
                                <div class="form-check mb-3 mt-3">
                                    @if ('pilihan5' == $soals->kunci)
                                        <label class="form-check-label text-bold" style="color: green;" for="ujian{{$ujian->id}}5">
                                            E. {{$soals->pilihan5}}
                                        </label>
                                    @elseif ('pilihan5' == $soals->myJawab->jawaban)
                                        <label class="form-check-label text-bold"  for="ujian{{$ujian->id}}5">
                                            E. {{$soals->pilihan5}}
                                        </label>
                                    @else
                                        <label class="form-check-label" for="ujian{{$ujian->id}}5">
                                            E. {{$soals->pilihan5}}
                                        </label>
                                    @endif
                                </div> 
                            </li>
                            <hr class="horizontal dark">
                            
                            @endforeach 
                            
                        </ul>
                    
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
