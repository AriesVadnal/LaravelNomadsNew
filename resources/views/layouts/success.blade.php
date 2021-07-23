<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @stack('prepend_style')
    @include('includes.style')
    @stack('addon_style')
</head>
<body>
    

    @include('includes.navbar_alternate')
    @yield('content')

    @stack('prepend_style')
    @include('includes.script')
    @stack('addon_style')
</body>
</html>