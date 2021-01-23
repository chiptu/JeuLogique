<template>



<div class ="flex justify-end  h-11/12  " >

<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <div id="stars"></div>
        <div id="stars2"></div>
        <div id="stars3"></div>
    
       
        <video autoplay muted loop  id="bgvid" class="w-full h-full absolute top left">
  
            <source :src="this.video()" type="video/mp4">

        </video>
        

        <Jeu :leveljson = "this.parse()" @time="time"/>

        <div class ="flex w-4/12">

            <Fonction :leveljson = "this.parse()" />

            <Controle :leveljson = "this.parse()" @command="command"/>
        
        </div>

 </div>



</template>


<script>

    
    import Jeu from './Jeu'
    import Controle from './Controle'
    import Fonction from './Fonction'

    import Vue from 'vue'

    
    export default {
    
        data: function()
        {
            return {
                delayTime:1,
            }
        },
        props: ['leveljson'],
        mounted() {
            console.log('Component root mounted.')
            
        }
        ,
        components:
        {
            Jeu,
            Controle,
            Fonction
        },
        methods:
        {
            parse()
            {
                return JSON.parse(this.leveljson)
            },
            video()
            {
                let json = this.parse();
                let str = "https://jeu.app/videos/"+(json.id)+".mp4";
                return str
            },

            play()
            {

            },

            time(value)
            {
                this.delayTime = value;
            },

            command(value) {

                var selectCase = document.getElementById("component-fonction").getElementsByClassName('focus-color');
                var selectColor = document.getElementById("component-controle").getElementsByClassName('focus-color');

                if (selectCase[0] != null)
                {

                    if (selectColor[0] !=null )// cas avec couleur 
                    {
                         selectCase[0].className =  selectColor[0].id+ " border border-white hover:border-black rounded w-12 h-12 text-white mr-4 focus-color";   
                    }
                    
                    if (value == 1 || value ==2 || value ==3) // cas ou la case est une fonction
                    {
                        selectCase[0].innerHTML = "";
                        $("#"+selectCase[0].id).append('<div class ="text-3xl '+ "F"+value +' pointer-events-none ">'+"F"+value+'</div>')
                    }
                    
                    if (value == "fa fa-arrow-up fa-2x pointer-events-none" || value == "fa fa-share fa-2x pointer-events-none" || value == "fas fa-reply fa-2x pointer-events-none") // cas ou la case est une fleche
                    {
                        selectCase[0].innerHTML = "";
                        $("#"+selectCase[0].id).append("<i class='fas "+ value +" fa-2x'</i>")
                    }
                    
                }
               this.updateAction();

            },


            updateAction()
            {
                var monTableau = this.getFonctions();

                for (var i = 0; i< monTableau[0].cases.length;i++)
                {
                   
                    var monAction = monTableau[0].cases[i].action;

                    var actionListe = document.getElementById("ListeAction"+(i+1));
                    
                    actionListe.className = monTableau[0].cases[i].couleur+ " border border-white hover:border-black rounded w-12 h-12 text-white mt-4 mr-1 pointer-events-none"
                    actionListe.innerHTML = "";

                    if (monAction != null)
                    {
                         if  (monAction.includes("F1") || monAction.includes("F2") || monAction.includes("F3") || monAction.includes("F4"))
                        {
                            let place = monAction.indexOf("F");
                            
                            $("#"+actionListe.id).append('<div class ="text-3xl '+ "F"+monAction[place+1] +' pointer-events-none ">'+"F"+monAction[place+1] +'</div>')
                        }
                        else
                        {
                            $("#"+actionListe.id).append('<i class="' + monAction +'"</i>' )
                        }
                    }
                   
                    
                }

            },

            getFonctions()  // Renvoie tableau objet fonction [ {id:1,cases:[ {action:f1,couleur:aucune} , {action:gauche,couleur:blanc} ] },]
            {
                var monjson = this.parse();
                var monTableau = []
                for (var fonction in monjson.fonctions)
                {
                    var monObjet = {id: parseInt(fonction,10)+1,cases:[]}
                    var mesCases =[];
                   for (var i = 0; i < monjson.fonctions[fonction].nombreCase; i++) //recup by id avec i et fonction // recup info icone ? recup info color ?
                   {
                       var Case = document.getElementById("btn-f"+(parseInt(fonction,10)+1)+"-case-"+(i+1));
                       var caseEnfant = Case.childNodes;

                       var maCase = {action:null,couleur:null}

                        if (caseEnfant [0] != null )
                        {
                            maCase.action = caseEnfant[0].className;
                        }

                       if (Case.classList.contains('bg-black'))
                       {
                           maCase.couleur = 'bg-black' 
                       }
                       if (Case.classList.contains('bg-gray-400'))
                       {
                           maCase.couleur = 'bg-gray-400' 
                       }
                       if (Case.classList.contains('bg-gray-600'))
                       {
                          maCase.couleur = 'bg-gray-600' 
                       }
                       if (Case.classList.contains('bg-gray-800'))
                       {
                           maCase.couleur = 'bg-gray-800' 
                       }
                        mesCases[i]=maCase;
                   }
                    monObjet.cases=mesCases;
                    monTableau[fonction] = monObjet;

                } 
                return monTableau;
            },




        }
       
    }

 
    
    
    

    
</script>