
<template>
    
    <div class ="w-1/2 h-full ">
            
            <div class ="text-3xl mr-4 text-white text-center ">Contrôle</div>

            <div class ="flex flex-row w-full h-full justify-center content-center items-center ml-4">

                

                <div class ="w-3/12">

                    

                    <button id="btn-up" class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2">
                        <i class="fa fa-arrow-up fa-2x"></i>
                    </button>
                
                    <button id="btn-right" class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2">
                        <i class="fa fa-share fa-2x"></i>
                    </button>


                    <button id="btn-left" class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2">
                        <i class="fas fa-reply fa-2x"></i>
                    </button>

                   
                    <div v-for="fonction in leveljson.fonctions" :key ="fonction.idFonction"  >
                     <button :id="'btn-f' +fonction.idFonction" class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2">
                        <div class ="text-3xl  text-black">F{{fonction.idFonction}}</div>
                    </button>
                    </div>
                  
                </div>

                
                <div class ="w-3/12">

                    
                     <div v-for="couleur in leveljson.nbCouleur" :key ="couleur"  >

                    <button  v-if="couleur == 1" id="btn-green" class="bg-gray-400 border border-white hover:border-black rounded w-12 h-12 mr-4">
                   
                    </button>

                    <button  v-if="couleur == 2" id="btn-gray" class="bg-gray-600 border border-white hover:border-black rounded w-12 h-12 mr-4 ">
                   
                    </button>

                    <button  v-if="couleur == 3" id="btn-purple" class="bg-gray-900 border border-white hover:border-black rounded w-12 h-12 mr-4">
                   
                    </button>
                    </div>
                
                </div>


            </div>


    </div>

</template>




<script>

    
    export default {
        props: ['leveljson'],
        mounted() {
            console.log('Component Controle mounted.')
        }
    }
</script>