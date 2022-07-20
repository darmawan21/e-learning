@extends('pages.home')

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
                    <a href="{{ route('forum.create') }}" class="btn btn-outline-primary btn-sm mb-0">
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
                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm"><a href="{{ route('forum.view', $forum->id) }}">
                                    {{ $forum->user->name }} : {{ $forum->title }}
                                </a></h6>
                                <span class="text-xs">{{$forum->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                            + $ 2,000
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