<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="msapplication-TileColor" content="#388e3c">
    <meta name="theme-color" content="#ffffff">
    <meta property="og:site_name" content="{{ setting('site.title')}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="/images/icon.ico">

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script src="{{ mix('/js/app.js') }}"></script>

    @yield('head')
</head>
<body>
    @include('partials.navbar')
    @include('partials.sidenav')
    @yield('body')
    @include('partials.footer')
</body>
</html>
