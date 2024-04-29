<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Add side" />
    <title>@yield('title')</title>
    @yield('favicon')
    @yield('css')
</head>
<body>
    @yield('preloader')
    @yield('main-wrapper')
    @yield('js')

</body>
</html>