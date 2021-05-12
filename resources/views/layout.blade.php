<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link rel="icon" href="{{ URL::asset('/images/spaceship.png') }}" type="image/x-icon"/>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <meta http-equiv="Content-Security-Policy" content="default-src *;">

        <title>ThinkStar</title>
        
       
    </head>

    <body class="h-full bg-black overflow-hidden">


    <iframe src="https://thinkstar.fr/thinkstar.mp3" type=”audio/mp3″ allow="autoplay" style="display:none;" id="audio" ></iframe>


    <audio autoplay>
    <source src="https://thinkstar.fr/thinkstar.mp3" type=”audio/mp3″>
    </audio>
        
    @yield('content')
    

    <script src="{{ asset('js/app.js') }}"></script>

    


    <footer class="bg-white absolute bottom-0 w-full">
    

    <div class ="flex h-1/2 w-full items-center justify-between ">

            
        <div class ="text-xs ml-5">
        Illustrations by
        <a class="text-blue-800" href="https://www.malt.fr/profile/thomasphilipon"> Philipon Thomas</a>
        </div>

        <div class ="text-xs ">
        Music by
        <a class="text-blue-800" href="https://soundcloud.com/psychosound_official"> Lointier Nicolas</a>
        </div>

        <div class ="flex h-full  items-center mr-24 ">

            <div class="text-black ml-10 mr-2">2021</div>

            <span class="copyleft">&copy;</span>

                <a class="transition duration-500 ease-in-out transform
                hover:-translate-y-1 hover:scale-110 ml-2 mr-10" href ="https://github.com/chiptu/JeuLogique">
                    <i class="fab fa-github  "></i>
                </a>
        </div>

        <div class ="text-xs ">
            <a class="text-blue-800" href="/mention">Legal Notice 
            </a>
        </div>

        <div class ="text-xs mr-10">
            <a class="text-blue-800" href="/documentation">Documentation 
            </a>
        </div>

    </div>

</footer>

    </body>
    
</html>

<script>

  
  /*var audio = new Audio('../thinkstar.mp3');
  audio.volume = 0.7;
  audio.play();*/

</script>