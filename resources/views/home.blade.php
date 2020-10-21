<!DOCTYPE html>
<html class="h-full w-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
       
    
    </head>

    <body class="w-full h-full bg-black flex  justify-center items-center">
    
    <form action="/rocket/1">
        <input type="submit" class ="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full" value = "Rocket"/>
    </form>

    

    </body>

    
</html>