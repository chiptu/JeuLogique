
<template>
    
        <div id="component-fonction" class ="w-1/2 h-full ">

         

            <div class ="flex flex-col  w-full h-full justify-center content-center ml-4">


                <!--<div class ="h-3/12  "> -->

                    <!--<div class="overflow-x-auto  overflow-y-hidden h-24 important"  style =" white-space: nowrap;">  inline-flex justify-center content-center  -->

                    <div v-for="fonction in leveljson.fonctions" :key ="fonction.idFonction" >
                        
                        <div class ="text-3xl mr-4 text-white important">
                            F{{fonction.idFonction}}
                        </div>

                         <div  v-for="monNbCase in fonction.nombreCase" :key ="monNbCase" >

                            <button :id="'btn-f' +fonction.idFonction+'-case-'+monNbCase" class="bg-black border border-white  rounded w-12 h-12 text-white mr-4 important"  v-on:click="anneau2">
                            </button>
                
                        </div>

                    </div>

                    </div>

                    <div class ="h-auto w-full flex  justify-center">
                        <button id="btn-clean" class="bg-white  hover:bg-black border border-white hover:text-white rounded w-12 h-12 text-black text-2xl mt-4 ripple important mt-12 " v-on:click="clearFunctions()">
                            <i class="fas fa-undo "></i>
                        </button>
                    </div>
                </div>


            <!--</div>-->

        <!--</div>-->
    
</template>




<script>

    
    export default {
        props: ['leveljson'],
        mounted() {
            console.log('Component Fonction mounted.')
        },

        methods: {

            clearFunctions()
            {
            console.log("dans fonctions.vue");
            this.$emit('clearFunctions');
            },

            anneau2: function (event) {
            
            if (event) 
                {
                var elements = document.getElementById("component-fonction").getElementsByClassName('focus-color');

                while(elements.length > 0)
                {
                elements[0].classList.remove('focus-color');
                }

                $('#'+event.target.id).addClass('focus-color');
                }
            }
        },
        
        

    }
</script>