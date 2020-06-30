
<template>
    
    <div class ="w-1/2 h-full ">
            

            <div class ="flex flex-row w-full h-full justify-center content-center items-center ml-4">

                <div class ="w-3/12">

                    <div class ="text-3xl mr-4 text-white">F1</div>

                    <button class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2">
                        <i class="fa fa-arrow-up fa-2x"></i>
                    </button>
                
                    <button class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2">
                        <i class="fa fa-arrow-right fa-2x"></i>
                    </button>

                    <button class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2">
                        <i class="fa fa-arrow-left fa-2x"></i>
                    </button>


                    <button class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2">
                        <div class ="text-3xl  text-black">F1</div>
                    </button>
                
                </div>

                
                <div class ="w-3/12">

                    <div class ="text-3xl mr-4 text-white">F2</div>

                    <button class="bg-yellow-500 border border-white hover:border-black rounded w-12 h-12 mr-4 ">
                   
                    </button>
                
                    <button class="bg-green-500 border border-white hover:border-black rounded w-12 h-12 mr-4">
                   
                    </button>

                    <button class="bg-blue-500 border border-white hover:border-black rounded w-12 h-12 mr-4">
                   
                    </button>
                
                </div>


            </div>


    </div>

</template>




<script>

    
    export default {
        mounted() {
            console.log('Component Controle mounted.')
        }
    }
</script>