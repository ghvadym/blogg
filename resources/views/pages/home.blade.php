@extends('index', ['title' => 'Home'])

@section('content')
    <div class="container archive">

            @if(isset($_GET['search']))
                <div class="search-title">
                    @if(count($posts)>0)
                        <h2>По запросу "<?= $_GET['search'] ?>" найдено {{ count($posts) }} постов</h2>
                        <a href="{{ route('post.index') }}">Отобразить все посты</a>
                    @else
                        <h2>По запросу "<?= htmlspecialchars($_GET['search']) ?>" ничего не найдено</h2>
                        <a href="{{ route('post.index') }}">Отобразить все посты</a>
                    @endif
                </div>
            @endif

        <div class="row post-list">

            @foreach($posts as $post)
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h2>{{ $post->title }}</h2>
                        </div>
                        <div class="card-body">
                            <div class="card-img" style="background-image: url({{ $post->img ?? asset('img/default.jpg') }})"></div>
                            <div class="card-author">Author: {{ $post->name }}</div>
                            <a href="{{ route('post.show', ['id' => $post->post_id]) }}" class="btn btn-outline-primary">View Post</a>
                        </div>
                    </div>
                </div>
            @endforeach

            @if(!isset($_GET['search'])) {{ $posts->links() }} @endif

        </div>
    </div>
@endsection