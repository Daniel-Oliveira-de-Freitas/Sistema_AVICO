<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/logo_alterada.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>@yield('title')</title>
    <!--<title>Parceiros &#8211; Avico Brasil</title>-->
</head>

<body class="antialiased">
    <div>
        @yield('content')
    </div>
    <x-footer />
</body>

</html>
