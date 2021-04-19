<!DOCTYPE html>
<html class="w-full h-full"lang="en" data-scroll-index="0">

<head>

    <!-- Metas -->
    <meta charset="utf-8">
    

   

    <!-- Favicon -->
    <link rel="icon" href="{{ URL::asset('/images/spaceship.png') }}" type="image/x-icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>ThinkStar</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>

<body class="h-full w-full bg-black">
     

    <div  class="w-full h-full flex justify-center " >

    <a href='/' class="text-white"> <i class="fas fa-arrow-left fa-5x mb-12  "></i> </a>
    
        
        <div id= "test" class="ml-32 mr-32 text-white"><br>

        
            <h1 class=" text-5xl"><u>Documentation in progress </u></h1><br>

            <h1 class=" text-5xl"><u>Configuration </u></h1><br>

            <p class="text-xl">This application uses laravel, vuejs, tailwind. 

            </p><br>

            <h1 class=" text-5xl"><u>Links </u></h1><br>

            <p class="text-xl text-blue-600"> <a href='https://github.com/chiptu/JeuLogique'>Git</a><br><br>
            
            </p><br>

           

            

           
        </div>

    </div>


</body>

<style>
#test p,h1  {
    

    -webkit-animation: fadein 3s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 3s; /* Firefox < 16 */
        -ms-animation: fadein 3s; /* Internet Explorer */
         -o-animation: fadein 3s; /* Opera < 12.1 */
            animation: fadein 3s;
}

@keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Firefox < 16 */
@-moz-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Safari, Chrome and Opera > 12.1 */
@-webkit-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Internet Explorer */
@-ms-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Opera < 12.1 */
@-o-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}
</style>