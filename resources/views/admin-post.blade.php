<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? $view_name }}</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/public/img/favicon.png') }}">
</head>
<body class="{{ $body_class ?? $view_name }}">

<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="row" style="display: flex;justify-content: center">
                <div class="col-md-10">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{ route('post.home') }}">Blogg</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<main>
    @if ($errors->any())
        @include('inc.errors')
    @endif

    @if(session('success'))
        @include('inc.alert')
    @endif

    @yield('content')
</main>

<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js-->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    (function($){
        $(document).ready(function() {
            $('#post-description').summernote({
                height: 250,
                placeholder: 'The content',
                fontNames: ['Jetbrains Mono']
            });
        });
    })(jQuery);
</script>

</body>
</html>