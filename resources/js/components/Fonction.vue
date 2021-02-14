
<template>
    
        <div id="component-fonction" class ="w-1/2 h-full ">

            <div class ="text-3xl mr-4 text-white text-center">Fonction</div>

            <div class ="flex flex-col w-full h-full justify-center content-center ml-4">


                <div class ="h-3/12">

                    <div v-for="fonction in leveljson.fonctions" :key ="fonction.idFonction" class =" h-1/12 w-full inline-flex  justify-center content-center mt-12">
                        
                        <div class ="text-3xl mr-4 text-white important">
                            F{{fonction.idFonction}}
                        </div>

                         <div  v-for="monNbCase in fonction.nombreCase" :key ="monNbCase">

                            <button :id="'btn-f' +fonction.idFonction+'-case-'+monNbCase" class="bg-black border border-white  rounded w-12 h-12 text-white mr-4 important"  v-on:click="anneau2">
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
        },

        methods: {
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
        }

    }
</script>