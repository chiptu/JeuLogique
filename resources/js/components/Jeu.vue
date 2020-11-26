<template>
    <div class=" w-8/12  p-12 ">
        
        <div v-for="ligne in leveljson.lignes" :key ="ligne.id" class =" h-1/12 w-full inline-flex  justify-center content-center ">


                <div v-for="case in lignes.cases" :key ="case.idCase" class="  relative border border-gray-500 rounded p-0 m-0 flex justify-center items-center w-20 h-full bg-black">
                    <i class=" fa fa-star text-yellow-500 fa-3x"></i>
                </div>
                
                <div class="relative border border-gray-500 rounded p-0 m-0 flex justify-center items-center w-20 h-full bg-black">
                    
                </div>

                <div class="relative border border-gray-500 rounded p-0 m-0 flex justify-center items-center w-20 h-full bg-black">
                    <i class="fa fa-space-shuttle text-white fa-3x"></i>
                </div>
                
        </div>




        
        

        <Boutons/>


    </div>
</template>



<script>

    import Boutons from './Boutons'

    
    export default {
        props: ['leveljson'],

        mounted() {
            console.log('Component Jeu mounted.')
            console.log(typeof this.leveljson)
        } ,

        /*data () {
        return {
            nbLignes: this.leveljson.lignes.length 
        }
        },*/

        
        components:
        {
            Boutons
        }



    }
</script>