<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="body-dashboard">
    @include('layouts.partials.header')
    @include('layouts.partials.aside')
    @yield('content-dashboard')
    @include('layouts.partials.footer')
</body>
</html>
