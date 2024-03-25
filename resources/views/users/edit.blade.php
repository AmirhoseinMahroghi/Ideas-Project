@extends('index')

@section('title')
    Edit Profile
@endsection

@section('content')
    @include('layout.massage')
    <div class="card">
        <form action="{{ route('users.update', $user->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="px-3 pt-4 pb-2">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img style="width: 150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                            alt="{{ $user->name }}" />
                        <div>
                            <input name="name" type="text" class="form-control" value="{{ $user->name }}">
                            @error('name')
                                <div class="mt-2 text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <a class="text-secondary" href="{{ route('users.show', $user->slug) }}">View</a>
                    </div>
                </div>
                <div class="px-2 mt-4">
                    <div class="mb-3">
                        <h5 class="fs-6">Profile Picture :</h5>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <h5 class="fs-5">Bio :</h5>
                    <div class="mb-3">
                        <textarea name="bio" class="form-control" id="bio" rows="3">{{ $user->bio }}</textarea>
                        @error('bio')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <button class="btn btn-dark btn-sm mt-3">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
