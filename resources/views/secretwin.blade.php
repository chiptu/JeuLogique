<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
       
        <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.13.2/TweenMax.min.js"></script>
    
    </head>

    <body class="h-full bg-black overflow-hidden">

   
    <!-- leguilloupro@gmail.com objet jetevois pour la clé steam du jeu-->
    
    


    <svg id="mySVG"> 
        <img>
    </svg>


    </div>


    
    </body>
    
</html>


<style>

img{
  left:50%;
  top:50%;
  position:absolute;
   z-index:-1;
}

#mySVG{
  color:white;
  width:100%; 
  height:100%;
  background-color: rgba(0,0,0, 0.8);
}


@media (max-width: 991px) {
    .menuLarge {
        font-size: 1.8em;
    }
}

</style>



<script>

TweenMax.set("img",{xPercent:"-50%",yPercent:"-50%"})

var svgNS = "http://www.w3.org/2000/svg";  

var total = 70;
var w = $("#mySVG").width();
var h = $("#mySVG").height();
 
for (i=0; i<total; i++){ 
var myCircle = document.createElementNS(svgNS,"circle"); 
myCircle.setAttributeNS(null,"class","dot"); 
myCircle.setAttributeNS(null,"r",5);
document.getElementById("mySVG").appendChild(myCircle);  
TweenMax.set($(".dot")[i],{x:Random(w),y:0 ,scale:Random(0.5)+0.5,fill:"hsl(" + random(0,150) + ",50%,50%)"});
 animm($(".dot")[i]);
 }
 
 function animm(elm){   
 TweenMax.to(elm,Random(5)+3,{y:h,ease:Linear.easeNone,repeat:-1, delay:-5});
 TweenMax.to(elm,Random(5)+1,{x:'+=70', repeat:-1,yoyo:true,ease:Sine.easeInOut})
 TweenMax.to(elm,Random(1)+0.5,{fill:"rgba(0,0,0,0)",repeat:-1,yoyo:true,ease:Sine.easeInOut})
 };

function Random (max) {
return Math.random()*max;
}

function random(min, max) {
return min + Math.floor( Math.random() * (max - min));
}
// a Pen by DIACO : twitter.com/Diaco_ml  ||  codepen.io/MAW


</script>