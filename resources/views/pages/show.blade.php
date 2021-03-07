@extends('index', ['title' => 'Post - '.$post->title, 'body_class' => 'single-post'])

@section('content')
    <div class="container-full post">
        <div class="post-body">
            <div class="post-head">
                <h1 align="center">{{ $post->title }}</h1>
                <img src="{{ $post->img ?? asset('img/default.jpg') }}" alt="{{ $post->name }}" class="post-img-full">
            </div>
            <div class="container-sm post-body">
                <div class="post-desc">{!! $post->desc !!}</div>
                <div class="post-author">Author: {{ $post->user->name }}</div>
                <div class="post-date">Created at: {{ $post->created_at }}</div>
                <div class="post-btn-control">
                    <a href="{{ route('post.index') }}" class="btn-primary">Home</a>
                    @auth
                        @if(Auth::user()->id == $post->author_id)
                            <a href="{{ route('post.edit', ['id' => $post->post_id]) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('post.destroy', ['id' => $post->post_id]) }}" method="post"
                            onsubmit="if (confirm('Are you sure?')) {return true} else {return false} ">
                                @csrf
                                @method('DELETE')

                                <input type="submit" class="btn-destroy" value="Destroy">
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection