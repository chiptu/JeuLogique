<template>



<div class ="flex justify-end bg-black h-11/12 ">
    
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
            //this.read()
            console.log(this.parse().lignes.length)
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
            }
        
        }
       
    }

 
    
    
    

    
</script>