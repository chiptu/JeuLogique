<template>



<div class ="flex justify-end  h-11/12  " >

<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <div id="stars"></div>
        <div id="stars2"></div>
        <div id="stars3"></div>
    
       
        <video autoplay muted loop  id="bgvid" class="w-full h-full absolute top left">
  
            <source :src="this.video()" type="video/mp4">

        </video>
        

        <Jeu :leveljson = "this.parse()" />

        <div class ="flex w-4/12">

            <Fonction :leveljson = "this.parse()" />

            <Controle :leveljson = "this.parse()" @command="command"/>
        
        </div>

 </div>



</template>


<script>

    
    import Jeu from './Jeu'
    import Controle from './Controle'
    import Fonction from './Fonction'

    import Vue from 'vue'

    
    export default {
        props: ['leveljson'],
        mounted() {
            console.log('Component root mounted.')
            
        }
        ,
        components:
        {
            Jeu,
            Controle,
            Fonction
        },
        methods:
        {
            parse()
            {
                return JSON.parse(this.leveljson)
            },
            video()
            {
                let json = this.parse();
                let str = "https://jeu.app/videos/"+(json.id)+".mp4";
                return str
            },
            command(value) {
                
                var selectCase = document.getElementById("component-fonction").getElementsByClassName('focus-color');
                var selectColor = document.getElementById("component-controle").getElementsByClassName('focus-color');

                if (selectCase[0] != null)
                {
                    selectCase[0].innerHTML = "";
                    
                    if (value == 1 || value ==2 || value ==3) // cas ou la case est une fonction
                    {
                        $("#"+selectCase[0].id).append('<div class ="text-3xl  pointer-events-none ">'+"F"+value+'</div>')
                    }
                    else // cas ou la case est une fleche
                    {
                        $("#"+selectCase[0].id).append("<i class='fas "+ value +" fa-2x'</i>")
                    }
                    
                        
                    if (selectColor[0] !=null || selectColor[0].id != "btn-noColor")// cas avec couleur 
                    {
                        
                         selectCase[0].className =  selectColor[0].id+ " border border-white hover:border-black rounded w-12 h-12 text-white mr-4 focus-color";   
                    }
                    else
                    {
                        selectCase[0].className = "bg-yellow-500 border border-white hover:border-black rounded w-12 h-12 text-white focus-color mr-4";
                    }
                }


            }
        }
       
    }

 
    
    
    

    
</script>