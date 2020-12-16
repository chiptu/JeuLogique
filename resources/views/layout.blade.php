<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
       
    
    </head>

    <body class="h-full  ">
    
    
    
    @yield('content')
    

    <script src="{{ asset('js/app.js') }}"></script>

    

    <footer class="bg-white absolute bottom-0 w-full">
    
        <div class ="flex h-1/2 w-full justify-center ">
        
            <div class="text-black">
               2020 🄯 - Le Guillou Alexandre 
            </div>

            

        </div>

        <div class ="flex h-1/2 w-full justify-center ">
             <a class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 " href ="https://github.com/chiptu/JeuLogique">
                <i class="fab fa-github fa-3x "></i>
            </a>
        </div>
    
    </footer>

    </body>
    
</html>

<script>


</script>