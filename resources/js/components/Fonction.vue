
<template>
    
        <div class ="w-1/2 h-full border-l-2 border-r-2 border-white">

            <div class ="text-3xl mr-4 text-white text-center">Fonction</div>

            <div class ="flex flex-col w-full h-full justify-center content-center ml-4">


                <div class ="h-3/12">

                    <div v-for="fonction in leveljson.fonctions" :key ="fonction.idFonction" class =" h-1/12 w-full inline-flex  justify-center content-center mt-12">
                        
                        <div class ="text-3xl mr-4 text-white">
                            F{{fonction.idFonction}}
                        </div>

                         <div  v-for="monNbCase in fonction.nombreCase" :key ="monNbCase">

                            <button :id="'btn-f' +fonction.idFonction+'-case-'+monNbCase" class="bg-white border border-white hover:border-black rounded w-12 h-12 text-black mr-4">
                            </button>
                
                        </div>

                </div>
            </div>


            </div>

        </div>
    
</template>




<script>

    
    export default {
        props: ['leveljson'],
        mounted() {
            console.log('Component Fonction mounted.')
        }
    }
</script>