<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/holiday.js'])
</head>
<div id="app">
@yield('content')
</div>
</html>
