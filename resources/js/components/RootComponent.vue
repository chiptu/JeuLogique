<template>



<div class ="flex justify-end  h-11/12  " >

<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <div id="stars"></div>
        <div id="stars2"></div>
        <div id="stars3"></div>
    


    <!--<article class="card card--mercury">
    <div class="card__planet">
        <div class="planet__atmosphere">
            <div class="planet__surface"></div>
        </div>
    </div>
</article>
<article class="card card--venus">
    <div class="card__planet">
        <div class="planet__atmosphere">
            <div class="planet__surface"></div>
        </div>
    </div>
</article>
<article class="card card--earth">
    <div class="card__planet">
        <div class="planet__atmosphere">
            <div class="planet__surface"></div>
        </div>
    </div>
</article>-->

    <div class="card__planet mt-48">
        <div class="planet__atmosphere">
            <div class="planet__surface"></div>
        </div>
    </div>
<!--
<article class="card card--jupiter">
    <div class="card__planet">
        <div class="planet__atmosphere">
            <div class="planet__surface"></div>
        </div>
    </div>
</article>
<article class="card card--saturn">
    <div class="card__planet">
        <div class="planet__atmosphere">
            <div class="planet__surface"></div>
        </div>
    </div>
</article>
<article class="card card--uranus">
    <div class="card__planet">
        <div class="planet__atmosphere">
            <div class="planet__surface"></div>
        </div>
    </div>
</article>
<article class="card card--neptune">
    <div class="card__planet">
        <div class="planet__atmosphere">
            <div class="planet__surface"></div>
        </div>
    </div>
</article>
<article class="card card--pluto">
    <div class="card__planet">
        <div class="planet__atmosphere">
            <div class="planet__surface"></div>
        </div>
    </div>
</article>
<article class="card card--sun">
    <div class="card__planet">
        <div class="planet__atmosphere">
            <div class="planet__surface"></div>
        </div>
    </div>
</article>-->
       
        <video autoplay muted loop  id="bgvid" class="w-full h-full absolute top left">
  
            <source :src="this.video()" type="video/mp4">

        </video>
        

        <Jeu :leveljson = "this.parse()" @time="time" @play="play"/>

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

            time(value)
            {
                
                this.delayTime = value;
            },

            play()
            {
               var mesFonctions = this.getFonctions()
               

               var grilleJeu = document.getElementById("grilleJeu").childNodes;

               var position = this.infoGrille(grilleJeu);

              // console.log(mesFonctions);
              //console.log(grilleJeu);
               //console.log(position);

               this.setRotatiton(grilleJeu,position.vaisseau[0],position.vaisseau[1],"right");

             this.setShuttle(grilleJeu,position.vaisseau[0],position.vaisseau[1],position.vaisseau[0]+1,position.vaisseau[1]+1);

               setTimeout(function(){
                
               
                }, 1000);

            },

            setRotatiton(grilleJeu,a,b,direction) // Fais une rotation de 90 en 90 avec la position du vaisseau et la direction
            {
                
                if (grilleJeu[b].childNodes[a].childNodes[0].childNodes[2].classList.contains("fa-rotate-90"))
                {
                    if (direction =="right")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[2].classList.replace("fa-rotate-90","fa-rotate-180")}

                    if (direction =="left")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[2].classList.remove("fa-rotate-90")}
                }
                else if ( grilleJeu[b].childNodes[a].childNodes[0].childNodes[2].classList.contains("fa-rotate-180") )
                {
                    if (direction =="right")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[2].classList.replace("fa-rotate-180","fa-rotate-270")}

                    if (direction =="left")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[2].classList.replace("fa-rotate-180","fa-rotate-90")}
                }
                else if ( grilleJeu[b].childNodes[a].childNodes[0].childNodes[2].classList.contains("fa-rotate-270") )
                {
                    if (direction =="right")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[2].classList.remove("fa-rotate-270")}

                    if (direction =="left")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[2].classList.replace("fa-rotate-270","fa-rotate-180")}
                }
                else
                {
                    if (direction =="right")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[2].classList.add("fa-rotate-90")}

                    if (direction =="left")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[2].classList.add("fa-rotate-270")}
                }
                
                
            },

            setShuttle(grilleJeu,a,b,c,d) // Repositionne le vaisseau (a,b = ancienne position à supprimer, c,d = nouvelle position)
            {
                
                let shuttleClass = grilleJeu[b].childNodes[a].childNodes[0].childNodes[2].className;
                grilleJeu[b].childNodes[a].childNodes[0].innerHTML = "";

                grilleJeu[c].childNodes[d].childNodes[0].removeChild(grilleJeu[c].childNodes[d].childNodes[0].childNodes[0]);

                let newShuttle = document.createElement("i");
                newShuttle.className = shuttleClass;
                grilleJeu[c].childNodes[d].childNodes[0].appendChild(newShuttle); 

                var grilleJeu = document.getElementById("grilleJeu").childNodes;
                console.log(this.infoGrille(grilleJeu));

            },

             getLastAction()// Retourne la derniere action et desempile le reste
            {
                var tableauAction =[];

                for (var i = 0; i< 8;i++)
                {
                    var actionListe = document.getElementById("ListeAction"+(i+1));
                    tableauAction.push(actionListe);
                }
               
                var result = tableauAction[0].childNodes[0];

                var tableauSave = tableauAction;
                if (tableauSave[1].childNodes[0]== null) // dans le cas où il reste uniquement une action
                {
                    tableauAction[0].removeChild(tableauAction[0].childNodes[0]); 
                    tableauAction[0].className = tableauAction[0].className.replace(/(^|\s)bg-\S+/g, " ");
                }
                else    // dans le cas ou il reste plusieurs actions on desempile le contenu et la couleur dans le classname
                {
                    
                    tableauAction[0].replaceChild(tableauSave[1].childNodes[0],tableauAction[0].childNodes[0]); 
                    tableauAction[0].className = tableauSave[1].className;;
                    for (var i = 0; i< 8;i++)
                    {
                        let couleur = " ";
                        
                        if (tableauSave[i+2].classList.contains('bg-gray-400'))
                        {
                            couleur = 'bg-gray-400' 
                        }
                        if (tableauSave[i+2].classList.contains('bg-gray-600'))
                        {
                            couleur = 'bg-gray-600' 
                        }
                        if (tableauSave[i+2].classList.contains('bg-gray-800'))
                        {
                            couleur = 'bg-gray-800' 
                        }
     
                        tableauAction[i+1].className = tableauAction[i+2].className.replace(/(^|\s)bg-\S+/g, couleur);
                        
                        tableauAction[i+1].appendChild(tableauSave[i+2].childNodes[0]);       
                       
                    }

                }
                
                return result;
            },

            infoGrille(grilleJeu) // Retourne la position du vaisseau et le nb d etoile restant (si 0 = gagne)
            {
                var position = {vaisseau:[],nbEtoile:0}

                 for (var i = 0; i< 10;i++)
                 {
                     for (var j = 0; j< 10;j++)
                    {
                    
                     if (grilleJeu[i].childNodes[j].childNodes[0].childNodes[0] != null)
                     {
                        
                         
                         if (grilleJeu[i].childNodes[j].childNodes[0].childNodes[0].className != null && grilleJeu[i].childNodes[j].childNodes[0].childNodes[0].className.includes("fa-star"))
                         {
                             position.nbEtoile ++;
                         }
                         if (grilleJeu[i].childNodes[j].childNodes[0].childNodes[2].className !=null && grilleJeu[i].childNodes[j].childNodes[0].childNodes[2].className.includes("fa-space-shuttle"))
                         {
                             position.vaisseau.push(j);
                             position.vaisseau.push(i);
                         }
                     }

                    }
                    
                 }
                 return position;
            },

            command(value) {    // Quand une action est assigne à une fonction

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


            updateAction()// Liste Action qui recupere et s actualise sur F1
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