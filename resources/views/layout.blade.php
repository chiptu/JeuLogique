<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
    </head>

    <body class="h-full ">
    @yield('content')
    </body>

</html>