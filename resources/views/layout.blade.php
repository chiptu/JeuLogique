<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
    </head>

    <body class="h-full ">
    
    @yield('content')
    

    <script src="{{ asset('js/app.js') }}"></script>

    </body>

    <footer>
    
        <div class ="flex h-full w-full justify-center ">
        
            <div class="text-black">
                2020 © - Le Guillou Alexandre
            </div>

        </div>
    
    </footer>

</html>