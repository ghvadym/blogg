@extends('index', ['title' => 'Create post'])

@section('content')
    <div class="container">
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            <h1>Create post</h1>

            @include('pages.parts.form')

            <input type="submit" class="btn btn-outline-success" value="Create post">
            @csrf
        </form>
    </div>
@endsection