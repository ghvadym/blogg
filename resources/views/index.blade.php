<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? $view_name }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

{{--    @if(Route::current()->getName() == 'post.edit' || Route::current()->getName() == 'post.create')--}}
{{--        <link rel="stylesheet" href="{{ asset('/public/css/bootstrap.css') }}">--}}
{{--    @endif--}}

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/public/img/favicon.png') }}">
    {{--  G-Fonts  --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,800&display=swap" rel="stylesheet">
    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
</head>
<body class="{{ $body_class ?? $view_name }}">

    <header>
        @include('inc.header')
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

    <footer>
        @include('inc.footer')
    </footer>
</body>
</html>