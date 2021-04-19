<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <link rel="icon" href="{{ URL::asset('/images/spaceship.png') }}" type="image/x-icon"/>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
       
        <title>ThinkStar</title>
    </head>

    <body class="h-full bg-black overflow-hidden">

    
    

            <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
            <div id="stars"></div>
            <div id="stars2"></div>
            <div id="stars3"></div>
    
      
   
        <div class ="flex flex-row  w-full h-full justify-center content-center items-center important">
    
        

        <form action="/win" method="post" class="box">
        @csrf 
        
        <h1 >👏🏆  Congratulations 🏆👏</h1>
        <h2>You just reached the end of the game demo</h2>
        <input type="text" name="name" placeholder="Your name ">
        <textarea id="avis" rows="3" type="text" name="feedback" placeholder="Your feedback,suggestions"></textarea>
        <h3>(Optional) If you want to stay tuned about steam release, Sdk</h3>
        <input type="text" name="mail" placeholder="Your mail ">
        <input type="submit" value="Send">
        </form>
    
        </div>

    


   

    </body>
    
</html>

<style>

h1{
  font-size: 48px;
}

.galaxy {
	position: absolute;
	-webkit-transform: translateZ(0);
	-moz-transform: translateZ(0);
	-ms-transform: translateZ(0);
	-o-transform: translateZ(0);
	transform: translateZ(0);
	background-color: #ffff00;
	width: 10px;
	height: 8px;
	border-radius: 50%;
}

body {
	margin: 0;
	background-color: #000;
	color: #fff;
	-webkit-perspective: 1000;
  perspective: 1000;
  overflow: hidden;
}

.box {
    
    /*    Propriedades FLEX*/
        display: flex;
        flex-direction: column;
        width: 500px;
        padding: 40px;
        
        text-align: center;
        border-radius:5px;
    }
    
    .box h1 {
        color: #f1f1f1;
        font-weight: 1000;
        text-transform: uppercase;
    }
    
    .box input[type="text"]{
        border: 0px;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: solid 2px #3498db;
        padding: 14px 10px;
        width: 200px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        font-size: 16px;
    }

    #avis[type="text"]{
        border: 0px;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: solid 2px #3498db;
        padding: 14px 10px;
        width: 400px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        font-size: 16px;
    }
    
   
    .box input[type="text"]:focus,
    .box input[type="password"]:focus {
        border-color: #2ecc71;
        width: 280px;
    }

    #avis:focus{
        border-color: #2ecc71;
        width: 350px;
    }
    
    .box input[type="submit"]{
        border: 0px;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: solid 2px #2ecc71;
        padding: 14px 20px;
        width: 200px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        cursor: pointer;
        font-size: 18px;
    }
    
    .box input[type="submit"]:hover{
        background: #2ecc71;
    }

</style>


<script>

// Big Bang by @neave https://codepen.io/neave/pen/auAcm

var TOTAL = 300;
var galaxies = [];

var Galaxy = function() {
	this.x = 0;
	this.y = 0;
	this.z = 0;
	this.vx = 0;
	this.vy = 0;
	this.vz = 0;
	this.speed = 1;
	this.angle = 0;
	this.div = document.createElement('div');
	this.div.classList.add('galaxy');
};

Galaxy.prototype.move = function() {
	this.x += this.vx * this.speed;
	this.y += this.vy * this.speed;
	this.z += this.vz * this.speed;
  this.div.style.transform = this.div.style.webkitTransform = this.getTransform();
};

Galaxy.prototype.setSize = function(width, height) {
	this.div.style.width = width + 'px';
	this.div.style.height = height + 'px';
};

Galaxy.prototype.getTransform = function() {
	return 'translate3d(' + this.x + 'px' + ',' + this.y + 'px,' + this.z + 'px) rotateZ(' + this.angle + 'deg)';
};

function addGalaxy(g) {
	document.body.appendChild(g.div);
	galaxies.push(g);
}

function removeGalaxies() {
	for (var i = galaxies.length; i--; ) {
		document.body.removeChild(galaxies[i].div);
	}
	galaxies = [];
}

function createGalaxies(total, x, y) {
	for (var i = total; i--; ) {


        //var rect = element.getBoundingClientRect();


		var b = new Galaxy();
		b.x = x || window.innerWidth / 3;
		b.y = y || window.innerHeight / 1000;
		var v = Math.random() * Math.PI * 2;
		b.vx = Math.cos(v);
		b.vy = Math.sin(v);
		b.vz = Math.random() * 4 - 2;
		var speed = Math.random() * 2 + 0.1;
		b.speed = speed * speed;
		b.angle = Math.random() * 360;
		b.setSize(Math.random() * 23 + 2, Math.random() * 13 + 2);
		addGalaxy(b);
	}
}

function update() {
	updateID = requestAnimationFrame(update);

	for (var i = galaxies.length; i--; ) {
		galaxies[i].move();
	}
}

function init(x, y) {
    console
    console.log(x,y);
	removeGalaxies();
	createGalaxies(TOTAL, x, y);
}

//document.addEventListener('mousedown', function(event) {
//  init(event.x, event.y);
//});

document.addEventListener('touchstart', function(event) {
    console.log(event.targetTouches[0].pageX, event.targetTouches[0].pageY-1000)
  init(event.targetTouches[0].pageX, event.targetTouches[0].pageY-1000);
  console.log(event.targetTouches[0].pageX, event.targetTouches[0].pageY-1000)
});

// requestAnimationFrame shim
var i = 0,
    lastTime = 0,
    vendors = ['ms', 'moz', 'webkit', 'o'];

while (i < vendors.length && !window.requestAnimationFrame) {
  window.requestAnimationFrame = window[vendors[i] + 'RequestAnimationFrame'];
  window.cancelAnimationFrame = window[vendors[i] + 'CancelAnimationFrame'] || window[vendors[i] + 'CancelRequestAnimationFrame'];
  i++;
}

if (!window.requestAnimationFrame) {
  window.requestAnimationFrame = function(callback, element) {
    var currTime = new Date().getTime(),
        timeToCall = Math.max(0, 1000 / 60 - currTime + lastTime),
        id = setTimeout(function() { callback(currTime + timeToCall); }, timeToCall);
    
    lastTime = currTime + timeToCall;
    return id;
  };
}

if (!window.cancelAnimationFrame) {
  window.cancelAnimationFrame = function(id) {
    clearTimeout(id);
  };
}

setTimeout(function() {
  init();
  update();
}, 200);

</script>