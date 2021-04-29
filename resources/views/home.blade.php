<!DOCTYPE html>
<html class="h-full w-full" id="specialHtml" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <link rel="icon" href="{{ URL::asset('/images/spaceship.png') }}" type="image/x-icon"/>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
       
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

        <script async src="https://www.googletagmanager.com/gtag/js?id=G-FRY7KFMM9P"></script>
        
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-FRY7KFMM9P');
        </script>

        <title>ThinkStar</title>
    </head>

    <!-- /qgpkd-vapsdh  caesar -->
    

    <body class="w-full h-full  bg-black overflow-hidden">

    <h1 class=" text-2xl text-yellow-400 text-center">🖥️ The interface is made for pc, preferably with fullscreen 🖥️ </h1>

    <div class=" w-full h-full  flex  justify-center items-center">
    
    <div id="space">
        <div class="stars22"></div>
        <div class="stars22"></div>
        <div class="stars22"></div>
        <div class="stars22"></div>
        <div class="stars22"></div>
    </div>

    

    <form action="/play" class="flex  justify-center fade-in">
        @csrf
        <input type="image"  id="c4fa" src = "{{ url('/') }}/images/tesla.jpg" class ="relative border rounded p-0 flex flex-col justify-between items-center w-1/2 h-1/2 bg-white 
        transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110  "/>
    </form>

    </div>

    <footer class="bg-gray-500 absolute bottom-0 w-full">
    

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


<style>
.fade-in {
animation: fadeIn ease 5s;
-webkit-animation: fadeIn ease 5s;
-moz-animation: fadeIn ease 5s;
-o-animation: fadeIn ease 5s;
-ms-animation: fadeIn ease 5s;
}
@keyframes fadeIn {
0% {opacity:0;}
100% {opacity:1;}
}

@-moz-keyframes fadeIn {
0% {opacity:0;}
100% {opacity:1;}
}

@-webkit-keyframes fadeIn {
0% {opacity:0;}
100% {opacity:1;}
}

@-o-keyframes fadeIn {
0% {opacity:0;}
100% {opacity:1;}
}

@-ms-keyframes fadeIn {
0% {opacity:0;}
100% {opacity:1;}
}
</style>


<script>

for (let i=1; i<11 ; i++)
{
    if (localStorage.getItem('lvlJson'+i)==null)
    {
        console.log("le lvlJson"+i+ " n etais pas dans le cache");
        $.getJSON('https://jeu.app/rocket/'+i, function(data) {
            data= JSON.stringify(data);
            localStorage.setItem('lvlJson'+i, data);
        });
    }
}



/// FADE IMAGE
var i=0;
var tabImage =["{{ url('/') }}/images/tesla.jpg","{{ url('/') }}/images/vaisseau.jpg"];
var intervalId = window.setInterval(function(){
    i++;
    //console.log({i,tabImage});
    $("#c4fa").fadeTo("slow",1, function() {
      $("#c4fa").attr("src",tabImage[i%2]);
      
     

      /*$("#c4fa").removeClass("fade-in");
      
      void $("#c4fa").offsetWidth;
  
      $("#c4fa").addClass("fade-in");*/

      //$("#c4fa").removeClass("fade-in").addClass("fade-in");
  })

}, 5000);
  

</script>