@extends('index')

@section('title')
    Edit Idea
@endsection

@section('content')
    @include('layout.massage')
    <h4> Update yours ideas </h4>
    <div class="row">
        <form action="{{ route('ideas.update', $idea->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <textarea name="body" class="form-control" id="idea" rows="3">{{ $idea->body }}</textarea>
                @error('body')
                    <div class="mt-2 text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Update </button>
            </div>
        </form>
    </div>
@endsection
