@extends('admin-post', ['title' => 'Create post'])

@section('content')
    <div class="container">
        <div class="row" style="display: flex;justify-content: center">
            <div class="col-md-10">
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    <h1>Create post</h1>

                    @include('pages.parts.form')

                    <input type="submit" class="btn btn-success" value="Create post">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection