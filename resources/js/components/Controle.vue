
<template>
    
    <div id="component-controle" class =" h-full ">
            
          

            <div class ="flex flex-row w-full h-full justify-center content-center items-center ml-4">

                

                <div class ="w-2/12 ml-16">

                    

                    <button id="btn-up" class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2 important" v-on:click="command('fa fa-arrow-up fa-2x pointer-events-none')">
                        <i class="fa fa-arrow-up fa-2x"></i>
                    </button>
                
                    <button id="btn-right" class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2 important" v-on:click="command('fa fa-share fa-2x pointer-events-none')">
                        <i class="fa fa-share fa-2x "></i>
                    </button>


                    <button id="btn-left" class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2 important" v-on:click="command('fas fa-reply fa-2x pointer-events-none')">
                        <i class="fas fa-reply fa-2x"></i>
                    </button>

                   
                    <div v-for="fonction in leveljson.fonctions" :key ="fonction.idFonction"  >
                     <button :id="'btn-f' +fonction.idFonction" class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2 important" v-on:click="command(fonction.idFonction)">
                        <div class ="text-3xl  text-black">F{{fonction.idFonction}}</div>
                    </button>
                    </div>

                    <button id="btn-left" class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2 important" v-on:click="command('null')">
                        
                    </button>
                  
                </div>


                <div v-if="leveljson.paint" class ="w-2/12">


                    <div v-for="couleur in leveljson.nbCouleur" :key ="couleur"  >

                        <button v-if="couleur == 1" id="paint-gray-400" class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2 important " v-on:click="command('fas fa-paint-roller  fa-2x text-gray-400 pointer-events-none')">
                            <i class="fas fa-paint-roller fa-2x text-gray-400"></i>
                        </button>

                        <button v-if="couleur == 2" id="paint-gray-800" class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2 important " v-on:click="command('fas fa-paint-roller fa-2x text-gray-800 pointer-events-none')">
                            <i class="fas fa-paint-roller fa-2x text-gray-800"></i>
                        </button>

                        <button v-if="couleur == 3" id="paint-gray-600" class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2 important " v-on:click="command('fas fa-paint-roller fa-2x text-gray-600 pointer-events-none')">
                            <i class="fas fa-paint-roller fa-2x text-gray-600"></i>
                        </button>

                        
                    </div>


                   <button v-if="leveljson.nbCouleur != 0" id="paint-black" class="bg-white border border-white hover:border-black rounded w-12 h-12 mr-4 mb-2 important " v-on:click="command('fas fa-paint-roller fa-2x text-black pointer-events-none')">
                            <i class="fas fa-paint-roller fa-2x text-black"></i>
                    </button>
                    

                </div>

                
                <div v-if="leveljson.nbCouleur!=0" class ="w-2/12">
                    


                     <div v-for="couleur in leveljson.nbCouleur" :key ="couleur"  >

                        <button  v-if="couleur == 1" id="bg-gray-400" class="bg-gray-400 border border-white hover:border-black rounded w-12 h-12 mr-4 important" v-on:click="anneau">
                    
                        </button>

                        <button  v-if="couleur == 2" id="bg-gray-800" class="bg-gray-800 border border-white hover:border-black rounded w-12 h-12 mr-4 important" v-on:click="anneau">
                    
                        </button>

                        <button  v-if="couleur == 3" id="bg-gray-600" class="bg-gray-600 border border-white hover:border-black rounded w-12 h-12 mr-4 important" v-on:click="anneau">
                    
                        </button>

                        
                    </div>


                    <button v-if="leveljson.nbCouleur != 0"  id="bg-black" class="bg-black border border-white rounded w-12 h-12 mr-4 mt-4 text-3xl important" v-on:click="anneau">
                        
                    </button>


                
                </div>




            </div>


    </div>

</template>




<script>

    
    export default {
        props: ['leveljson'],
        mounted() {
            console.log('Component Controle mounted.')
        },



        methods: {

            anneau: function (event) 
            {
                if (event) 
                {
                    var elements = document.getElementById("component-controle").getElementsByClassName('focus-color');

                    while(elements.length > 0)
                    {
                    elements[0].classList.remove('focus-color');
                    }

                    

                    $('#'+event.target.id).addClass('focus-color');
                }
                this.command("color");
            },


            command(value)
            {
                this.$emit('command',value);
            }

            
           
  

        }
    }
</script>