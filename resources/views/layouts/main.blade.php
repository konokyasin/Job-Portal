<!doctype html>
<html lang="en">
<head>
    <title>Job Finder</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('partials.head')
</head>
    <body>
        @include('partials.nav')
        @yield('content')
        @include('partials.footer')
    </body>
</html>
