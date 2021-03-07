@extends('index', ['title' => 'Home', 'body_class' => 'home'])

@section('content')
    <div class="container archive">
        <h1 class="archive-title">Latest News</h1>

            @if(isset($_GET['search']))
                <div class="search-title">
                    @if(count($posts)>0)
                        <p>On request <strong>"<?= $_GET['search'] ?>"</strong> was found <strong>{{ count($posts) }}</strong> posts</p>
                        <a href="{{ route('post.index') }}" class="link-line">Show all posts</a>
                    @else
                        <p>On request <strong>"<?= htmlspecialchars($_GET['search']) ?>"</strong> not found</p>
                        <a href="{{ route('post.index') }}" class="link-line">Show all posts</a>
                    @endif
                </div>
            @endif

        <div class="row post-list">
            <?php $i = 1; ?>

            @foreach($posts as $post)

                @if($i == 1)

                    <div class="post-item-full">
                        <a href="{{ route('post.show', ['id' => $post->post_id]) }}">
                            <div class="post-img img" style="background-image: url({{ $post->img ?? asset('/public/img/default.jpg') }})" alt="{{ $post->name }}">
                                <div class="post-body">
                                    <div class="post-header">
                                        <h2>{{ $post->short_title }}</h2>
                                    </div>
                                    <div class="post-author">Author: {{ $post->user->name }}</div>
                                    <div class="post-date">{{ $post->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        </a>
                    </div>

                @elseif($i > 1 && $i <= 3)

                    <div class="post-item">
                        <a href="{{ route('post.show', ['id' => $post->post_id]) }}">
                            <img data-original="{{ $post->img ?? asset('/public/img/default.jpg') }}" class="post-img" alt="{{ $post->name }}">
                            <div class="post-body">
                                <div class="post-header">
                                    <h2>{{ $post->short_title }}</h2>
                                </div>
                                <div class="post-author">Author: {{ $post->user->name }}</div>
                                <div class="post-date">{{ $post->created_at->diffForHumans() }}</div>
                            </div>
                        </a>
                    </div>

                @elseif($i > 3)

                    <div class="post-item-small">
                        <a href="{{ route('post.show', ['id' => $post->post_id]) }}">
                            <img data-original="{{ $post->img ?? asset('/public/img/default.jpg') }}" class="post-img" alt="{{ $post->name }}">
                            <div class="post-body">
                                <div class="post-header">
                                    <h2>{{ $post->short_title }}</h2>
                                </div>
                                <div class="post-author">Author: {{ $post->user->name }}</div>
                                <div class="post-date">{{ $post->created_at->diffForHumans() }}</div>
                            </div>
                        </a>
                    </div>

                @endif

                <?php $i++; ?>
            @endforeach

        </div>

        <div class="archive-paginate">
            @if(!isset($_GET['search'])) {{ $posts->links() }} @endif
        </div>
    </div>
@endsection