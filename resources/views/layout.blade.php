<!doctype html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
    </head>

    <body class ="bg-gray-600 max-h-full max-w-full ">
    @yield('content')
    </body>

</html>