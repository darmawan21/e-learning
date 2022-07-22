@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-7 mt-4">
            <div class="card">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 align-items-center">
                  <h6 class="mb-0">Forum {{ $forums->title }}</h6>
                  <span class="mb-2 text-xs">{{ $forums->created_at->diffForHumans() }} </span>
                </div>
              </div>
            </div>
                <div class="card-body pt-4 p-3">
                <ul class="list-group">
                    <li class="list-group-item border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            <span class="text-dark font-weight-bold ms-sm-2">{{ $forums->body }}</span> <br>
                            <p style="margin-left: 10px; color: green;" id="btn-komentar-utama">
                                <span class="btn-inner--icon"><i class="ni ni-chat-round"></i></span>
                                <span class="btn-inner--text">Komentar</span>
                            </p>
                        </div>
                            <form action="{{ route('forum.view', $forums->id)}}" style="display: none;" id="komentar-utama" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="forum_id" value="{{$forums->id}}">
                                    <input type="hidden" name="parent" value="0">
                                    <textarea name="konten" class="form-control" rows="4" id="komentar-utama"></textarea>
                                    <input type="submit" class="form-control btn btn-outline-primary w-20" value="Kirim">
                                </div>
                            </form>
                    </li>
                    <h6>Komentar :</h6>
                    @foreach ($forums->komentar()->where('parent', 0)->orderBy('created_at', 'desc')->get() as $komentar)
                        
                    
                    <li class="list-group-item border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <div>
                                @if ($komentar->user != null && $komentar->user->image)
                                    <img src="{{ asset('storage/' . $komentar->user->image) }}" class="avatar avatar-sm me-3"> 
                                @elseif ($komentar->guru != null && $komentar->guru->image)
                                    <img src="{{ asset('storage/' . $komentar->guru->image) }}" class="avatar avatar-sm me-3"> 
                                @else
                                    <img src="{{ asset('img/profil-picture.png') }}" class="avatar avatar-sm me-3">
                                @endif
                            </div>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">
                                    {{ $komentar->user->name }} . <span class="text-xs">{{$komentar->created_at->diffForHumans() }}</span>
                                </h6>
                                <p>
                                    {{$komentar->konten}}
                                </p>
                                
                                <p class="text-sm" style="color: green;" id="btn-komentar-parent">Reply</p>
                            </div>
                        </div><br>
                        <form action="{{ route('forum.view', $forums->id)}}" style="display: none; margin-left: 50px;" id="komentar-parent" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="forum_id" value="{{$forums->id}}">
                                <input type="hidden" name="parent" value="{{ $komentar->id }}">
                                <textarea name="konten" class="form-control" rows="4" id="komentar-utama"></textarea>
                                <input type="submit" class="form-control btn btn-outline-primary w-20" value="Kirim">
                            </div>
                        </form>
                        
                        @foreach ($komentar->childs()->orderBy('created_at', 'desc')->get() as $child)
                            
                        
                        <div class="d-flex align-items-center" style="margin-left: 70px;">
                            <div>
                                @if ($komentar->user != null && $komentar->user->image)
                                    <img src="{{ asset('storage/' . $komentar->user->image) }}" class="avatar avatar-sm me-3"> 
                                @elseif ($komentar->guru != null && $komentar->guru->image)
                                    <img src="{{ asset('storage/' . $komentar->guru->image) }}" class="avatar avatar-sm me-3"> 
                                @else
                                    <img src="{{ asset('img/profil-picture.png') }}" class="avatar avatar-sm me-3">
                                @endif
                            </div>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">
                                    {{ $komentar->user->name }} . <span class="text-xs">{{$komentar->created_at->diffForHumans() }}</span>
                                </h6>
                                <p>
                                    {{$child->konten}}
                                </p>
                                
                            </div>
                            
                        </div><br>
                        @endforeach
                    </li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#btn-komentar-utama").click(function(){
            $("#komentar-utama").slideToggle("slow");
        });

        $('#btn-komentar-parent').click(function() {
            $('#komentar-parent').slideToggle();
        })
    });

</script>
@endsection