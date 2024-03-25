@extends('admin.index')

@section('title')
    Comments | AdminPanel
@endsection

@section('content')
    <h2>Comments</h2>
    @include('layout.massage')
    <table class="table table-striped mt-3">
        <thead class="table-dark">
            <th>ID</th>
            <th>User</th>
            <th>Idea</th>
            <th>Content</th>
            <th>Created At</th>
            <th>#</th>
        </thead>
        <tbody>
            @foreach ($comments as $key => $comment)
                <tr>
                    <td> {{ $comments->firstItem() + $key }}</td>
                    <td>
                        <a href="{{ route('users.show', $comment->user->slug) }}">
                            {{ $comment->user->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('ideas.show', $comment->idea->id) }}">
                            {{ substr($comment->idea->body, 0, 20) . ' . . .' }}
                        </a>
                    </td>
                    <td>{{ substr($comment->body, 0, 20) . ' . . .' }}</td>
                    <td>{{ $comment->created_at->toDateString() }}</td>
                    <td>
                        <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $comments->links() }}
    </div>
@endsection
