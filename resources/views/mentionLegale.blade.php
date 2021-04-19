<!DOCTYPE html>
<html class="w-full h-full"lang="en" data-scroll-index="0">

<head>

    <!-- Metas -->
    <meta charset="utf-8">
    

    <!-- Title  -->
    

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
            
            <h1 class=" text-5xl"><u>Web server hosting</u></h1><br>

            <p class="text-xl">This site is hosted with ovh.
            </p><br>

            <h1 class=" text-5xl"><u>Cookies, RGPD</u></h1><br>

            <p class="text-xl">The cookies stored are the strict minimum to be able to measure the number of unique visitors,
                no personal data is taken for resale or for commercial purposes.<br><br>
                At the end of
                the demo of the game you can if you wish give your email to potentially be held
                aware of the progress of the project (steam release, opensource documentation, software development kit).<br><br>

                If you want to remove your mail of the list contact me with the info below.
            </p><br>

            <h1 class=" text-5xl"><u>Contact</u></h1><br>

            <p class="text-xl"> leguilloupro@gmail.com 
            </p>

            
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