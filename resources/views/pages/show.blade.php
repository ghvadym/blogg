@extends('index', ['title' => 'Post - '.$post->title])

@section('content')
    <div class="container single">
        <div class="row post-list">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $post->title }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="card-img-full" style="background-image: url({{ $post->img ?? asset('img/default.jpg') }})"></div>
                        <div class="card-desc">{{ $post->desc }}</div>
                        <div class="card-author">Author: {{ $post->name }}</div>
                        <div class="card-date">Date: {{ $post->created_at->diffForHumans() }}</div>
                        <div class="card-btn">
                            <a href="{{ route('post.index') }}" class="btn btn-outline-primary">Home</a>
                            @auth
                                @if(Auth::user()->id == $post->author_id)
                                    <a href="{{ route('post.edit', ['id' => $post->post_id]) }}" class="btn btn-outline-success">Edit</a>
                                    <form action="{{ route('post.destroy', ['id' => $post->post_id]) }}" method="post"
                                    onsubmit="if (confirm('Are you sure?')) {return true} else {return false} ">
                                        @csrf
                                        @method('DELETE')

                                        <input type="submit" class="btn btn-outline-danger" value="Destroy">
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection