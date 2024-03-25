@extends('index')

@section('title')
    View Idea
@endsection

@section('content')
    @include('layout.massage')
    <div class="mt-3">
        <div class="card">
            <div class="px-3 pt-4 pb-2">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageURL() }}"
                            alt="{{ $idea->user->name }}">
                        <div>
                            <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->slug) }}">
                                    {{ $idea->user->name }}
                                </a></h5>
                        </div>
                    </div>
                    <div>
                        @can('idea.edit', $idea)
                            <a class="text-secondary me-1" href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                        @endcan
                        @can('idea.delete', $idea)
                            <form class="ms-1 d-inline-block" action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">X</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="fs-6 fw-light text-muted">
                    {{ $idea->body }}
                </p>
                <div class="d-flex justify-content-between">
                    @auth
                        @if (Auth::user()->ideaLike($idea))
                            <form action="{{ route('ideas.unlike', $idea->id) }}" method="POST">
                                @csrf
                                <div>
                                    <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                                        </span> {{ $idea->likes_count }} </button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('ideas.like', $idea->id) }}" method="POST">
                                @csrf
                                <div>
                                    <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                                        </span> {{ $idea->likes_count }} </button>
                                </div>
                            </form>
                        @endif
                    @endauth
                    @guest
                        <a href="{{ route('login') }}" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                            </span> {{ $idea->likes_count }} </a>
                    @endguest
                    <div>
                        <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                            {{ $idea->created_at->diffForHumans() }} </span>
                    </div>
                </div>
                <div>
                    <form action="{{ route('ideas.comments.create', $idea->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea name="bodyComment" class="fs-6 form-control" rows="1"></textarea>
                            @error('bodyComment')
                                <div class="mt-2 text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
                        </div>
                    </form>
                    <hr>
                    @forelse ($idea->comments as $comment)
                        <div class="d-flex align-items-start">
                            <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                                src="{{ $comment->user->getImageURL() }}" alt="Luigi Avatar">
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="">{{ $comment->user->name }}
                                    </h6>
                                    <small
                                        class="fs-6 fw-light text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="fs-6 mt-3 fw-light">
                                    {{ $comment->body }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center mt-4">No Comments Found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
