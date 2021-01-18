<template>
        
        <!--Espace bouton-->

            <div class = " h-auto w-full flex  justify-center mt-8 border-t-2 border-white">

                <button id="listeAction" class=" bg-white hover: border border-white  rounded w-12 h-12 text-black mr-8 mt-4 pointer-events-none">
                    <i class="fas fa-terminal"></i>
                </button>

                <button id="ListeAction1" class="bg-white border border-white hover:border-black rounded w-12 h-12 text-black mt-4 mr-1 pointer-events-none">
                    
                </button>

                <button id="ListeAction2" class="bg-white border border-white hover:border-black rounded w-12 h-12 text-black mt-4 mr-1 pointer-events-none">
                </button>

                <button id="ListeAction3" class="bg-white border border-white hover:border-black rounded w-12 h-12 text-black mt-4 mr-1 pointer-events-none">
                </button>

                <button id="ListeAction4" class="bg-white border border-white hover:border-black rounded w-12 h-12 text-black mt-4 mr-1 pointer-events-none">
                </button>

                <button id="ListeAction5" class="bg-white border border-white hover:border-black rounded w-12 h-12 text-black mt-4 mr-1 pointer-events-none">
                </button>

               

            </div>

</template>



<script>

    
    export default {
        mounted() {
            console.log('Component Boutons mounted.')
        }
    }
</script>