<template>



<div class ="flex justify-end  h-11/12 ">
    
        <video autoplay muted loop poster="https://jeu.test/images/bg-black.jpg" id="bgvid" class="w-full h-full">
  
            <source :src="this.video()" type="video/mp4">

        </video>

        <Jeu :leveljson = "this.parse()" />

        <div class ="flex w-4/12">

            <Fonction :leveljson = "this.parse()" />

            <Controle :leveljson = "this.parse()" />
        
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
                let str = "https://jeu.test/videos/"+(json.id)+".mp4";
                return str
            }
        }
       
    }

 
    
    
    

    
</script>