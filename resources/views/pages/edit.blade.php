@extends('admin-post', ['title' => 'Edit post - '.$post->title])

@section('content')
    <div class="container">
        <form action="{{ route('post.update', ['id' => $post->post_id]) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            <h1>Update post</h1>

            @include('pages.parts.form')

            <input type="submit" class="btn btn-success" value="Update post">
            @csrf
        </form>
    </div>
@endsection