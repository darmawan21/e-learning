@extends('guru.layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-7 mt-4">
            <div class="card">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Forum Diskusi</h6>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('guru.forum.create') }}" class="btn btn-outline-primary btn-sm mb-0">
                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                        <span class="btn-inner--text">Tambah Forum</span>
                    </a>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
                <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                <ul class="list-group">
                    @foreach ($forums as $forum)
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <div>
                                @if ($forum->user != null && $forum->user->image)
                                    <img src="{{ asset('storage/' . $forum->user->image) }}" class="avatar avatar-sm me-3"> 
                                @elseif ($forum->guru != null && $forum->guru->image)
                                    <img src="{{ asset('storage/' . $forum->guru->image) }}" class="avatar avatar-sm me-3"> 
                                @else
                                    <img src="{{ asset('img/profil-picture.png') }}" class="avatar avatar-sm me-3">
                                @endif
                            </div>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm"><a href="{{ route('guru.forum.view', $forum->id) }}">
                                    @if ($forum->user !=null)
                                        Siswa: {{ $forum->user->name }} : {{ $forum->title }}
                                    @endif
                                    @if ($forum->guru !=null)
                                        Guru: {{ $forum->guru->name }} : {{ $forum->title }}
                                    @endif
                                    
                                </a></h6>
                                <span class="text-xs">{{$forum->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </li>

                    @endforeach
                </ul>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection