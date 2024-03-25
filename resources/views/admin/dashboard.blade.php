@extends('admin.index')

@section('title')
    Dashboard | AdminPanel
@endsection

@section('content')
    <h2>Dashboard</h2>
    <div class="row mt-4">
        <div class="col-sm-6 col-md-4">
            @include('admin.layout.widget', [
                'title' => 'Total Users',
                'icon' => 'fas fa-users',
                'data' => $totalUsers,
            ])
        </div>

        <div class="col-sm-6 col-md-4">
            @include('admin.layout.widget', [
                'title' => 'Total Ideas',
                'icon' => 'fas fa-lightbulb',
                'data' => $totalIdeas,
            ])
        </div>

        <div class="col-sm-6 col-md-4">
            @include('admin.layout.widget', [
                'title' => 'Total Comments',
                'icon' => 'fas fa-comment',
                'data' => $totalComments,
            ])
        </div>
    </div>
@endsection
