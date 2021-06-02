
<template>
    
    <div id="component-fonction" class =" h-full ">

         

        <div class ="flex flex-col w-full h-full justify-center content-center ml-4 t-0" id="Fonctions">

        <div class="flex flex-row  w-full  justify-center content-center overflow-x-auto h-18 important ">

                <button id="previousLevel" class="bg-black border border-white hover:border-white rounded w-12 h-8 mr-8 mb-2 important" v-on:click="previousLevel()">
                        <i class="text-white fa fa-arrow-left fa-2x"></i>
                </button>

                <div class="text-yellow-200 text-xl mb-6 important mt-0">
                🚀 Level {{leveljson.id}} ⭐ 
                </div>

                <button id="nextLevel" class="bg-black border border-white hover:border-white rounded w-12 h-8 ml-8 mb-2 important" v-on:click="win()">
                        <i class="text-white fa fa-arrow-right fa-2x"></i>
                </button>
    
        </div>
            
        
            <div class ="h-3/12 mr-8"> 
                    

                        <div v-for="fonction in leveljson.fonctions" :key ="fonction.idFonction" 
                        class ="flex flex-row  w-full  justify-center content-center overflow-x-auto h-24 important " style =" white-space: nowrap;">
                        
                        <div v-if ="fonction.nombreCase > 4">
                            <div class ="mt-2 ml-16 text-3xl mr-4 text-white important ">
                                F{{fonction.idFonction}}
                            </div>
                        </div>
                        <div v-else>
                            <div class ="mt-2 ml-8 text-3xl mr-4 text-white important ">
                                F{{fonction.idFonction}}
                            </div>
                        </div>


                            <div  v-for="monNbCase in fonction.nombreCase" :key ="monNbCase" >

                                <button :id="'btn-f' +fonction.idFonction+'-case-'+monNbCase" draggable="true" ondragstart="drag(event)" 
                                class="mt-2  border border-white  rounded w-12 h-12 text-white mr-4 important"  v-on:click="anneau2">
                                </button>
                    
                            </div>

                        </div>

                   

                    
            </div>

            <div class ="h-auto w-full flex  justify-center">

                <button id="btn-clean" class="ml-10 mt-32 bg-white  hover:bg-black border border-white hover:text-white rounded w-12 h-12 text-black text-2xl mt-4 ripple important mt-12 " v-on:click="clearFunctions()">
                    <i class="fas fa-undo "></i>
                </button>
            </div>


        </div>

    </div>
    
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
            //console.log("dans fonctions.vue");
            this.$emit('clearFunctions');
            },

            previousLevel()
            {
                console.log("dans fonctions.vue");
            this.$emit('previousLevel');
            },

            win()
            {
                console.log("dans fonctions.vue");
            this.$emit('win');
            },

            anneau2: function (event) {
            
            if (event) 
                {
                    var elements = document.getElementById("component-fonction").getElementsByClassName('focus-color');

                    while(elements.length > 0)
                    {
                        elements[0].classList.remove('focus-color');
                    }
                    


                    $("#"+event.target.id).addClass('focus-color');
                }
            }
        },
        
        

    }
</script>