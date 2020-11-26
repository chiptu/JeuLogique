<template>



<div class ="flex justify-end bg-black h-11/12 ">
    
        <Jeu :leveljson = "this.leveljson" />

        <div class ="flex w-4/12">

        <Fonction :leveljson = "this.leveljson" />

        <Controle :leveljson = "this.leveljson" />
        
        </div>

 </div>



</template>


<script>
   /* Vue.component('blog-post', {
    props: {
        author: Person
        }
    })*/

    

    import Jeu from './Jeu'
    import Controle from './Controle'
    import Fonction from './Fonction'

    import Vue from 'vue'
    import axios from 'axios'
    import VueAxios from 'vue-axios'

    
    export default {
        props: ['leveljson'],
        mounted() {
            console.log('Component root mounted.')
            //this.read()
            console.log(this.leveljson)
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
             async read() 
            {
            const { data } = window.axios.get('/rocket/1');

            console.log("data")
            console.log(data)
            console.log("this")
            console.log(this)
            }
        }
       
    }

 
    
    
    

    
</script>