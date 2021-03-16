<template>
        
        <!--Espace bouton-->

            <div class = " h-auto w-full flex  justify-center mt-8 important ">

                <button id="start" class="bg-white  hover:bg-black border border-white hover:text-white rounded w-12 h-12 text-black mr-8 mt-4 ripple important" v-on:click="play()">
                    <i class="fa fa-play fa-2x"></i>
                </button>

                <button id="pause" class="bg-white  hover:bg-black border border-white hover:text-white rounded w-12 h-12 text-black mr-8 mt-4 ripple important">
                    <i class="fa fa-pause fa-2x"></i>
                </button>

                <button id="stop" class="bg-white  hover:bg-black border border-white hover:text-white rounded w-12 h-12 text-black mr-8 mt-4 ripple important" v-on:click="stop()">
                    <i class="fa fa-stop fa-2x"></i>
                </button>

                <button id="speed1" class="bg-white  hover:bg-black border border-white hover:text-white rounded w-12 h-12 text-black text-2xl mr-8 mt-4 ripple important" v-on:click="time('1')">
                    x1
                </button>

                <button id="speed2" class="bg-white  hover:bg-black border border-white hover:text-white rounded w-12 h-12 text-black text-2xl mr-8 mt-4 ripple important" v-on:click="time('0.5')">
                    x2
                </button>

                <button id="speed4" class="bg-white  hover:bg-black border border-white hover:text-white rounded w-12 h-12 text-black text-2xl mt-4 ripple important" v-on:click="time('0.25')">
                    x4
                </button>

            </div>

</template>



<script>

    
    export default {
        mounted() {
            console.log('Component Boutons mounted.')
        },

        methods:
        {

        time(value)
            {
                this.$emit('time',value);
            },

        stop()
            {
                this.$emit('stop');
            },

        play()
            {
                this.$emit('play');
            },

        }

    }
</script>