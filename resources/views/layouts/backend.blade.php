<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('backend.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/backend.js') }}" defer></script>

    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>


    <!-- Styles -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">

</head>

<body>
    <div id="backend">
        @yield('content')
    </div>
</body>



</html>
