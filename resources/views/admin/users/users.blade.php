@extends('admin.index')

@section('title')
    Users | AdminPanel
@endsection

@section('content')
    <h2>Users</h2>
    <table class="table table-striped mt-3">
        <thead class="table-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Joined At</th>
            <th>#</th>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td> {{ $users->firstItem() + $key }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->toDateString() }}</td>
                    <td>
                        <a class="me-2" href="{{ route('users.show', $user->slug) }}">View</a>
                        <a href="{{ route('users.edit', $user->slug) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $users->links() }}
    </div>
@endsection
