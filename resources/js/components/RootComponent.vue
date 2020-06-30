<template>



<div class ="flex justify-end bg-black h-11/12 ">

        <Jeu/>

        <div class ="flex w-4/12">

        <Fonction/>

        <Controle/>
        

        </div>

 </div>



</template>


<script>

    import Jeu from './Jeu'
    import Controle from './Controle'
    import Fonction from './Fonction'

    export default {
        mounted() {
            console.log('Component root mounted.')
        }
        ,
        components:
        {
            Jeu,
            Controle,
            Fonction
        }
        
    }
</script>