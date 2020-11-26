<template>
        
        <!--Espace bouton-->

            <div class = " h-auto w-full flex  justify-center mt-8 border-t-2 border-white">

                <button class="bg-white  hover:bg-black border border-white hover:text-white rounded w-12 h-12 text-black mr-8 mt-4 ripple">
                    <i class="fa fa-play fa-2x"></i>
                </button>

                <button class="bg-white  hover:bg-black border border-white hover:text-white rounded w-12 h-12 text-black mr-8 mt-4 ripple">
                    <i class="fa fa-pause fa-2x"></i>
                </button>

                <button class="bg-white  hover:bg-black border border-white hover:text-white rounded w-12 h-12 text-black mr-8 mt-4 ripple">
                    <i class="fa fa-stop fa-2x"></i>
                </button>

                <button class="bg-white  hover:bg-black border border-white hover:text-white rounded w-12 h-12 text-black text-2xl mr-8 mt-4 ripple">
                    x1
                </button>

                <button class="bg-white  hover:bg-black border border-white hover:text-white rounded w-12 h-12 text-black text-2xl mr-8 mt-4 ripple">
                    x2
                </button>

                <button class="bg-white  hover:bg-black border border-white hover:text-white rounded w-12 h-12 text-black text-2xl mt-4 ripple">
                    x4
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