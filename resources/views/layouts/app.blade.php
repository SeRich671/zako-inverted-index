<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ZAKO - Inverted Indexing</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand">ZAKO - Inverted indexing</a>
        <form class="d-flex" method="GET" action="{{ route('home', ['query' => request()->input('page')]) }}">
            <input type="text" class="form-control me-2" placeholder="Podaj tytuł lub treść artykułu" name="query">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</nav>

@yield('content')
</body>
</html>
