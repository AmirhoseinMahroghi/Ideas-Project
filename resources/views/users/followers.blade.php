@extends('index')

@section('title')
    Followers
@endsection

@section('content')
    <h4>Followers</h4>
    @include('layout.massage')
    @foreach ($followers as $follower)
        <hr>
        <div class="card">
            <div class="card h-25">
                <div class="px-3 pt-4 pb-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img style="width: 150px" class="me-3 avatar-sm rounded-circle"
                                src="{{ $follower->getImageURL() }}" alt="{{ $follower->name }}" />
                            <div>
                                <h3 class="card-title mb-0">
                                    <a> {{ $follower->name }} </a>
                                </h3>
                                <span class="fs-6 text-muted">{{ $follower->email }} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
