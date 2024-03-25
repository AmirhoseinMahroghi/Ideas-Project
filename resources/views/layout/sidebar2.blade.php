<div class="col-3">
    <div class="card">
        <div class="card-header pb-0 border-0">
            <h5 class="">Search</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard') }}" method="GET">
                <input placeholder="...
            " class="form-control w-100" type="text" name="search"
                    value="{{ request('search', '') }}">
                <button type="submit" class="btn btn-dark mt-2"> Search</button>
            </form>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header pb-0 border-0">
            <h5 class="">Top Users</h5>
        </div>
        <div class="card-body">
            @foreach ($topUsers as $user)
                <div class="hstack gap-2 mb-4">
                    <div class="avatar">
                        <a href="{{ route('users.show', $user->slug) }}"><img style="width: 50px"
                                class="avatar-img rounded-circle" src="{{ $user->getImageURL() }}" alt=""></a>
                    </div>
                    <div class="overflow-hidden">
                        <a class="h6 mb-0" href="{{ route('users.show', $user->slug) }}">{{ $user->name }}</a>
                        <p class="mb-0 small text-truncate">{{ $user->email }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
