@extends('index')

@section('title')
    Followings
@endsection

@section('content')
    <h4>Followings</h4>
    @include('layout.massage')
    @foreach ($followings as $follower)
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
                    <div class="px-2 mt-4">
                        @auth
                            <div class="mt-3">
                                @if (Auth::user()->follows($follower))
                                    <form action="{{ route('users.unfollow', $follower->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            UnFollow
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('users.follow', $follower->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Follow
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
