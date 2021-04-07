<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
       
    
    </head>

    <body class="h-full bg-black overflow-hidden">

    <div id="space">
        <div class="stars22"></div>
        <div class="stars22"></div>
        <div class="stars22"></div>
        <div class="stars22"></div>
        <div class="stars22"></div>
    </div>

    
    <div class ="flex flex-row  w-full h-full justify-center content-center items-center important">
    
    <!-- Note change after dev, log too obvious-->

    <form action="{{ route('secret') }}" method="post" class="box">
    @csrf
      <h1>Login</h1>
       <input type="text" name="user" placeholder="User Name">
       <input type="password" name="password" placeholder="password">
       <input type="submit" value="Enter">
     </form>
    
    </div>


    


    <footer class="bg-white absolute bottom-0 w-full">
    

        <div class ="flex h-1/2 w-full justify-center ">

        <div class="text-black mr-2">2021</div>

        <span class="copyleft">&copy;</span>

             <a class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 ml-5" href ="https://github.com/chiptu/JeuLogique">
                <i class="fab fa-github  "></i>
            </a>
        </div>
    
    </footer>

    </body>
    
</html>


<style>

    .box {
    
    /*    Propriedades FLEX*/
        display: flex;
        flex-direction: column;
        width: 500px;
        padding: 40px;
        background:#0a3d62;
        text-align: center;
        border-radius:5px;
    }
    
    .box h1 {
        color: #f1f1f1;
        font-weight: 1000;
        text-transform: uppercase;
    }
    
    .box input[type="text"],
    .box input[type="password"] {
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
    
    .box input[type="text"]:focus,
    .box input[type="password"]:focus {
        border-color: #2ecc71;
        width: 280px;
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


</script>