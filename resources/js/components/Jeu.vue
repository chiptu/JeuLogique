


<template>
    <div id="grilleJeu" class=" w-8/12  p-12 ">
        <div v-for="ligne in leveljson.lignes" :key ="ligne.id" class =" h-1/12 w-full inline-flex  justify-center content-center ">

                <div   v-for="maCase in ligne.cases" :key ="maCase.idCase">

                    <div :id="'ligne-' +ligne.idLigne+'-case-'+maCase.idCase" v-if="maCase.visible" 
                    :class=" 'relative border-4 border-gray-900 rounded p-0 m-0 flex justify-center items-center w-20 h-full  bg-opacity-75 '+maCase.couleur ">
                        <i v-if="maCase.etoileBool" class=" fa fa-star text-yellow-500 fa-3x"></i>
                        <i v-if="maCase.departBool" class="fa fa-space-shuttle text-white fa-3x"></i>
                    </div>

                    <div v-else class="  relative rounded p-0 m-0 flex justify-center items-center w-20 h-full ">
                       
                    </div>

                </div>
                
                
        </div>

        <div class ="grid grid-cols-2">

        <Boutons @time="time" @play="play"/>


        <Listeactions/>

        </div>


    </div>
</template>



<script>

    import Boutons from './Boutons'
    import Listeactions from './ListeActions'

    
    export default {
        props: ['leveljson'],

        mounted() {
            console.log('Component Jeu mounted.')
        } ,

        
        components:
        {
            Listeactions,
            Boutons
        },

        methods:
        {
            time(value)
            {
                this.$emit('time',value);
            },
            play()
            {
                this.$emit('play');
            }
        }

    }
</script>