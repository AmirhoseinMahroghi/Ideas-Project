@extends('admin.index')

@section('title')
    Ideas | AdminPanel
@endsection

@section('content')
    <h2>Ideas</h2>
    <table class="table table-striped mt-3">
        <thead class="table-dark">
            <th>ID</th>
            <th>User</th>
            <th>Content</th>
            <th>Created At</th>
            <th>#</th>
        </thead>
        <tbody>
            @foreach ($ideas as $key => $idea)
                <tr>
                    <td> {{ $ideas->firstItem() + $key }}</td>
                    <td>
                        <a href="{{ route('users.show', $idea->user->slug) }}">
                            {{ $idea->user->name }}
                        </a>
                    </td>
                    <td>{{ substr($idea->body, 0, 20) . ' . . .' }}</td>
                    <td>{{ $idea->created_at->toDateString() }}</td>
                    <td>
                        <a class="me-2" href="{{ route('ideas.show', $idea->id) }}">View</a>
                        <a href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $ideas->links() }}
    </div>
@endsection
