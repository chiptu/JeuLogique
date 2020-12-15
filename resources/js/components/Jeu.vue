
<!--

<div class="relative border border-gray-500 rounded p-0 m-0 flex justify-center items-center w-20 h-full bg-black">
                    
                </div>

                <div class="relative border border-gray-500 rounded p-0 m-0 flex justify-center items-center w-20 h-full bg-black">
                    
                </div>

-->


<template>
    <div class=" w-8/12  p-12 ">
        
        <div v-for="ligne in leveljson.lignes" :key ="ligne.id" class =" h-1/12 w-full inline-flex  justify-center content-center ">

                <div  v-for="maCase in ligne.cases" :key ="maCase.idCase">

                    <div v-if="maCase.visible" class="  relative border-4 border-gray-500 rounded p-0 m-0 flex justify-center items-center w-20 h-full ">
                        <i v-if="maCase.etoileBool" class=" fa fa-star text-yellow-500 fa-3x"></i>
                        <i v-if="maCase.departBool" class="fa fa-space-shuttle text-white fa-3x"></i>
                    </div>

                    <div v-else class="  relative rounded p-0 m-0 flex justify-center items-center w-20 h-full ">
                       
                    </div>

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
            console.log(this.leveljson)
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