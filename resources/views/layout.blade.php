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
    
        <div class ="flex h-1/2 w-full justify-center ">
        
            <div class="text-black">
                2020 🄯 - Le Guillou Alexandre
            </div>

            

        </div>

        <div class ="flex h-1/2 w-full justify-center ">
             <a class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 " href ="https://github.com/chiptu/JeuLogique"><i class="fa fa-github fa-3x "></i></a>
        </div>
    
    </footer>

</html>