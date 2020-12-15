<!DOCTYPE html>
<html class="h-full w-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
       
    
    </head>


    

    <body class="w-full h-full bg-black flex  justify-center items-center ">
    
    
    <form action="/rocket/1" class="flex  justify-center">
        <input type="image"  src = "{{ url('/') }}/images/42.png" class ="relative border rounded p-0 flex flex-col justify-between items-center w-1/4 h-1/4 bg-white 
        transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110  "/>
    </form>

    

    </body>

    
</html>