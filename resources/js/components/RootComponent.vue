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
       
        

        

        <Jeu :leveljson = "this.parse()" @time="time" @play="play" @stop="stop"/>

        <div class ="flex w-4/12 flex-col">

            
                <Fonction :leveljson = "this.parse()" @clearFunctions="clearFunctions" />

             
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
                boolStop:true,
            }
        },
        props: ['leveljson'],
        mounted() {
            console.log('Component root mounted.')

            let grilleJeu = document.getElementById("grilleJeu").childNodes;

            this.nettoyageGrille(grilleJeu);
            this.nettoyageGrille(grilleJeu);
            this.nettoyageListeAction();

           
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
            stop()
            {
                console.log("fonction stop")
                this.boolStop=true;

                this.resetShuttle();
                this.resetStars();
                this.resetPaint();
                this.cleanListeAction();
                this.updateFunctionAction(1, false);



            },
            

            play()
            {
                console.log("debut fct play ");

               // VERIFIER ICI EN 1er si win 
               this.boolStop= false;
                
               let grilleJeu = document.getElementById("grilleJeu").childNodes;

                console.log("avant infoGrille");
               let position = this.infoGrille(grilleJeu);

               //console.log({grilleJeu,position});
               if (position.nbEtoile ==0)
               {
                   console.log("win");
                   this.win();
               }
            
                console.log("avant action");
                this.getAction(grilleJeu,position.vaisseau[0],position.vaisseau[1]);
                
            
                setTimeout( () => {
                    
                    if(this.boolStop == false)
                    {
                        this.play();
                    }
                
               
                }, 1000/this.delayTime);

            },

            win() // Charger le niveau avec le json suivant
            {
                let numero = parseInt(this.parse().id)+1;
                if ( numero < 11)
                {
                    document.location.replace( "https://jeu.app/rocket/"+numero);
                }
                else
                {
                    document.location.replace( "https://jeu.app/win");
                }
                
            },

            getAction(grilleJeu,a,b) // ici on verifie la couleur et l action pour appeller la fct de l action
            {
                let action = this.getLastAction();
                console.log("dans action ");
                //console.log({action, a,b, grilleJeu});
                //console.log(action[0].className);
                if (action[0].className == "") // plus  d action = lose
                {
                     console.log("////////plus d action");
                     this.stop();
                     return null
                }

                if (action[0] !=null ) // action 
                {
                    console.log("////////action");
                    if (action[1] != null ) // cas avec couleur
                    {
                        
                        console.log("/////////couleur existe");
                        //console.log(grilleJeu[b].childNodes[a].childNodes[0].className);
                        //console.log( !grilleJeu[b].childNodes[a].childNodes[0].className.includes("bg-gray") );
                        //console.log( grilleJeu[b].childNodes[a].childNodes[0].classList.contains(action[1]) );
                        if ( grilleJeu[b].childNodes[a].childNodes[0].classList.contains(action[1]) ) // si la couleur est respecte ou si absence de couleur
                        {
                            console.log("condition couleur verifie test");

                            if (action[0].className.includes("share"))
                            {
                                this.setRotation(grilleJeu,a,b,"right");
                            }
                            if (action[0].className.includes("reply"))
                            {
                                this.setRotation(grilleJeu,a,b,"left");
                            }
                            if (action[0].className.includes("arrow-up"))
                            {
                                this.move(grilleJeu,a,b);
                            }
                            if (action[0].className.includes("F"))
                            {
                                this.updateFunctionAction( parseInt(action[0].innerHTML[1]), true );
                            }
                            if (action[0].className.includes("paint"))
                            {
                                this.paint(grilleJeu,a,b,action[0].className);
                            }
                        }

                    }

                    if (action[1] == null ) // cas sans couleur
                    {
                        console.log("///////// couleur n existe pas ");
                        
                        if (action[0].className.includes("share"))
                        {
                            this.setRotation(grilleJeu,a,b,"right");
                        }
                        if (action[0].className.includes("reply"))
                        {
                            this.setRotation(grilleJeu,a,b,"left");
                        }
                        if (action[0].className.includes("arrow-up"))
                        {
                            this.move(grilleJeu,a,b);
                        }
                        if (action[0].className.includes("F"))
                        {
                            this.updateFunctionAction( parseInt(action[0].innerHTML[1]), true );
                        }
                        if (action[0].className.includes("paint"))
                        {
                            this.paint(grilleJeu,a,b,action[0].className);
                        }
                    }
                }  
                

            },

            movementPossible(grilleJeu,a,b) // verifie si une position va en dehors du jeu visible ou de la grille
            {
                console.log("debut movement possible");
                //console.log({a,b});
                //console.log(!grilleJeu[b].childNodes[a].childNodes[0].className.includes("border"));
                if (a >9 || b>9 || a<0 || b<0)
                {
                    console.log("mouvement sort du cadre")
                    return false;
                }
                if ( !grilleJeu[b].childNodes[a].childNodes[0].className.includes("border") )
                {
                    console.log("mouvement sort du jeu visible")
                    return false
                }
                return true;
            },

            updateFunctionAction(numFunction, desempilement) // Quand une action tombe sur f on empile le contenu de f
            {
                console.log("update function action");
                let monTableau = this.getFonctions();

                let nbAction = this.countUsedAction();
                let nbActionTotal = this.countTotalAction();

                let difference = nbActionTotal - (monTableau[numFunction-1].cases.length + nbAction);

                if (difference < 0)
                {
                   for (var i=0; i < Math.abs(difference);i++)
                   {
                       console.log("Ajout case");
                       console.log({difference});
                       this.ajouterCaseAction();
                   }
                }
                //console.log({monTableau});
                //console.log("longueur de la fonction "+numFunction)
                //console.log(monTableau[numFunction-1].cases.length);
                //console.log({nbAction,nbActionTotal,numFunction});

                if (nbAction != 0 && desempilement ==true) // si il reste des actions apres l appel de fct on les placent apres la fonction
                {
                    let nbActionFonction = monTableau[numFunction-1].cases.length;
                    //console.log(nbActionFonction);
                    for (var i = nbAction; i> 0 ;i--)
                    {
                   
                        //console.log("placement après");
                        //console.log("i: "+i);
                        //console.log(nbActionFonction);

                        let tab =[];

                        let actionListe = document.getElementById("ListeAction"+(i));

                        let actionListe2 = document.getElementById("ListeAction"+(i+nbActionFonction));

                        //let actionListe2 = document.getElementById("ListeAction"+(nbAction+i+1));

                        tab.push(actionListe, actionListe2)

                        //console.log({actionListe,actionListe2})
                        
                        //actionListe2.childNodes[0] = actionListe.childNodes[0]; 
                        actionListe2.replaceChild(actionListe.childNodes[0],actionListe2.childNodes[0]) //new old

                        let icon = document.createElement("i");
                        actionListe.appendChild(icon);

                    }
                }                

                for (var i = 0; i< monTableau[numFunction-1].cases.length;i++)
                {
                   
                    let monAction = monTableau[numFunction-1].cases[i].action;

                    let actionListe = document.getElementById("ListeAction"+(i+1));

                    //console.log({monAction, actionListe, i});
                    
                    actionListe.className = monTableau[numFunction-1].cases[i].couleur+ " border border-white hover:border-black rounded w-12 h-12 text-white  mr-1 pointer-events-none "
                    actionListe.innerHTML = "";
                    

                    if (monAction != null)
                    {
                         if  (monAction.includes("F"))
                        {
                            let place = monAction.indexOf("F");
                            
                            $("#"+actionListe.id).append('<div class ="text-3xl '+ "F"+monAction[place+1] +' pointer-events-none ">'+"F"+monAction[place+1] +'</div>')
                        }
                        else
                        {
                            $("#"+actionListe.id).append('<i class="' + monAction +'"></i>' )
                        }
                    }
                    else
                    {   
                        $("#"+actionListe.id).append('<i></i>' )
                    }
                    
                }
            },

            move (grilleJeu, a,b)// fais un mouvement avec les positions actuelles
            {
                console.log("debut move ");
                

                if (grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].classList.contains("fa-rotate-90"))// mouvement bas
                {
                    if (this.movementPossible(grilleJeu,a,b+1) == false) { this.stop(); }
                    else {this.setShuttle(grilleJeu,a,b,a,b+1);}
                }
                else if ( grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].classList.contains("fa-rotate-180") ) //mouvement gauche
                {
                    if (this.movementPossible(grilleJeu,a-1,b) == false) { this.stop(); }
                   else {this.setShuttle(grilleJeu,a,b,a-1,b);}
                }
                else if ( grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].classList.contains("fa-rotate-270") ) // mouvement haut
                {
                    if (this.movementPossible(grilleJeu,a,b-1) == false) { this.stop(); }
                   else{ this.setShuttle(grilleJeu,a,b,a,b-1);}
                }
                else // mouvement droite
                {
                    if (this.movementPossible(grilleJeu,a+1,b) == false) { this.stop(); }
                  else {this.setShuttle(grilleJeu,a,b,a+1,b);}
                }
            },


            setRotation(grilleJeu,a,b,direction) // Fais une rotation de 90 en 90 avec la position du vaisseau et la direction
            {
                console.log("debut setRotation");
                //console.log({grilleJeu,a,b,direction});
                //console.log(grilleJeu[b]);
                //var test =grilleJeu[b].childNodes[a].childNodes[0].childNodes[0];
                //console.log({ test, i});
                if (grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].classList.contains("fa-rotate-90"))
                {
                    if (direction =="right")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].classList.replace("fa-rotate-90","fa-rotate-180")}

                    if (direction =="left")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].classList.remove("fa-rotate-90")}
                }
                else if ( grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].classList.contains("fa-rotate-180") )
                {
                    if (direction =="right")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].classList.replace("fa-rotate-180","fa-rotate-270")}

                    if (direction =="left")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].classList.replace("fa-rotate-180","fa-rotate-90")}
                }
                else if ( grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].classList.contains("fa-rotate-270") )
                {
                    if (direction =="right")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].classList.remove("fa-rotate-270")}

                    if (direction =="left")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].classList.replace("fa-rotate-270","fa-rotate-180")}
                }
                else
                {
                    if (direction =="right")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].classList.add("fa-rotate-90")}

                    if (direction =="left")    {  grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].classList.add("fa-rotate-270")}
                }
                
                
            },

            setShuttle(grilleJeu,a,b,c,d) // Repositionne le vaisseau (a,b = ancienne position à supprimer, c,d = nouvelle position) abcisse puis ordonnee
            {
                console.log("debut setShuttle")
                //console.log({grilleJeu, a,b,c,d});
                
                let shuttleClass = grilleJeu[b].childNodes[a].childNodes[0].childNodes[0].className;
    
                //console.log(shuttleClass);

                grilleJeu[b].childNodes[a].childNodes[0].innerHTML = "";

                //console.log(grilleJeu[d].childNodes[c].childNodes[0]);
                if (grilleJeu[d].childNodes[c].childNodes[0].childNodes[0] != null)
                {
                    try{
                        grilleJeu[d].childNodes[c].childNodes[0].removeChild(grilleJeu[d].childNodes[c].childNodes[0].childNodes[0]);
                    }catch(error){
                        console.log("remove setshuttle du reset remove pb");
                    }
                }
                
                let newShuttle = document.createElement("i");

                newShuttle.className = shuttleClass;
                
                grilleJeu[d].childNodes[c].childNodes[0].appendChild(newShuttle); 
                

                //var grilleJeu = document.getElementById("grilleJeu").childNodes;
                //console.log(this.infoGrille(grilleJeu));

            },

             getLastAction()// Retourne la derniere action avec couleur et desempile le reste
            {
                let tableauAction =[];
                console.log("debut Last Action");

                let nbActionTotal = this.countTotalAction();

                //console.log({nbActionTotal});

                for (var i = 0; i< nbActionTotal;i++) // on recupere le tableau des actions
                {
                    let actionListe = document.getElementById("ListeAction"+(i+1));
                    tableauAction.push(actionListe);
                }
                
               //try
                //{
                    let result = [];
                    result.push(tableauAction[0].childNodes[0]);
                    //console.log({result,tableauAction});
                    let tableauSave = tableauAction;
                    if (tableauSave[1].childNodes[0]== null) // dans le cas où il reste uniquement une action
                    {
                        if (tableauSave[0].classList.contains('bg-gray-400'))
                        {
                            result.push('bg-gray-400')
                        }
                        if (tableauSave[0].classList.contains('bg-gray-600'))
                        {
                            result.push('bg-gray-600')
                        }
                        if (tableauSave[0].classList.contains('bg-gray-800'))
                        {
                            result.push('bg-gray-800')
                        }
                        if (tableauSave[0].firstChild)
                        {
                            tableauAction[0].removeChild(tableauAction[0].childNodes[0]); 
                        }
                        
                        tableauAction[0].className = tableauAction[0].className.replace(/(^|\s)bg-\S+/g, " "); // on enleve tout ce qui commentce par bg (couleurs)

                    }
                    else    // dans le cas ou il reste plusieurs actions on desempile le contenu et la couleur dans le classname
                    {
                        if (tableauSave[0].classList.contains('bg-gray-400'))
                        {
                            result.push('bg-gray-400')
                        }
                        if (tableauSave[0].classList.contains('bg-gray-600'))
                        {
                            result.push('bg-gray-600')
                        }
                        if (tableauSave[0].classList.contains('bg-gray-800'))
                        {
                            result.push('bg-gray-800')
                        }
                        
                        tableauAction[0].replaceChild(tableauSave[1].childNodes[0],tableauAction[0].childNodes[0]); 
                        tableauAction[0].className = tableauSave[1].className;
                        
                        //console.log({tableauAction});
                        for (var i = 0; i< nbActionTotal;i++)
                        {
                            let couleur = " ";
                            
                            try
                            {
                                /////// On a deux series de if l une pour avoir la couleur de l action l autre pour desempiler les couleurs
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
                                
                                if (tableauSave[i+2].firstChild)
                                {
                                    tableauAction[i+1].appendChild(tableauSave[i+2].childNodes[0]);  
                                }
                            }
                            catch(error)
                            {
                                
                                //console.log({error,i});
                                if (i ==nbActionTotal-2)
                                {
                                    let icon = document.createElement("i");
                                    //console.log(tableauAction[i+1]);
                                    tableauAction[i+1].appendChild(icon);
                                }
                                
                            }
                            

                                 
                        }

                    }
                    
            //}
            /*catch(error)
            {
                console.log(error);
                console.log("getLastAction vide ou erreur");
                
            }*/
            
                return result;
            },

            nettoyageGrille(grilleJeu) //dans les divs de la grille efface les commentaires sauf pour etoile
            {
                NodeList.prototype.forEach = Array.prototype.forEach


                  for (var i = 0; i< 10;i++)
                 {
                     for (var j = 0; j< 10;j++)
                    {
                        var children = grilleJeu[i].childNodes[j].childNodes[0].childNodes;
                        children.forEach(function(item){
                            if (item.nodeType == 3 ||  item.nodeType == 8)
                            {
                                item.remove();
                            }
                        });
                    }
                 }

            },
            nettoyageListeAction() //dans les divs de lliste action efface le text
            {
                //console.log("Nettoyage liste action");

                let mesActions = document.getElementById("mesActions");

                //console.log(mesActions);
                //console.log("longueur mes actions childnodes length");
                //console.log(mesActions.childNodes);

                for (var i = 0; i < mesActions.childNodes.length; i++) // si il n y a pas de classe a l icon ou au div(f1) alors case vide
                {
                   
                    if (mesActions.childNodes[i].nodeType == 3 )
                    {
                        mesActions.childNodes[i].remove();
                    }
                        
                }
                //let mesActions2 = document.getElementById("mesActions");
                //console.log(mesActions2.childNodes);
            },

            infoGrille(grilleJeu) // Retourne la position du vaisseau et le nb d etoile restant 
            {
                var position = {vaisseau:[],nbEtoile:0}

                 for (var i = 0; i< 10;i++)
                 {
                     for (var j = 0; j< 10;j++)
                    {
                    
                     if (grilleJeu[i].childNodes[j].childNodes[0].childNodes[0] != null)
                     {
                        //console.log("dans info grille");
                        //console.log(grilleJeu[i].childNodes[j].childNodes[0]);
                        //console.log(grilleJeu[i].childNodes[j].childNodes[0].childNodes[0]);
                         
                         if (grilleJeu[i].childNodes[j].childNodes[0].childNodes[0].className != null && grilleJeu[i].childNodes[j].childNodes[0].childNodes[0].className.includes("fa-star"))
                         {
                             position.nbEtoile ++;
                         }
                        
                         if (grilleJeu[i].childNodes[j].childNodes[0].childNodes[0] !=null && grilleJeu[i].childNodes[j].childNodes[0].childNodes[0].className.includes("fa-space-shuttle"))
                         {
                             position.vaisseau.push(j);
                             position.vaisseau.push(i);
                         }
            
                     }

                    }
                    
                 }
                 
                 //console.log({position});
                 return position;
            },

            command(value) // Quand une action est assigne à une fonction
            {    

                console.log("fct command");
                //console.log({value});

                var selectCase = document.getElementById("component-fonction").getElementsByClassName('focus-color');
                var selectColor = document.getElementById("component-controle").getElementsByClassName('focus-color');

                if (selectCase[0] != null)
                {
                    if (selectColor[0] !=null )// cas avec couleur 
                    {
                         selectCase[0].className =  selectColor[0].id+ " mt-4 border border-white rounded w-12 h-12 text-white mr-4 focus-color important";   
                    }
                    
                    if (value == 1 || value ==2 || value ==3) // cas ou la case est une fonction
                    {
                        selectCase[0].innerHTML = "";
                        $("#"+selectCase[0].id).append('<div class ="text-3xl '+ "F"+value +' pointer-events-none ">'+"F"+value+'</div>');
                    }
                    
                    if (value == "fa fa-arrow-up fa-2x pointer-events-none" || value == "fa fa-share fa-2x pointer-events-none" || value == "fas fa-reply fa-2x pointer-events-none") // cas ou la case est une fleche
                    {
                        selectCase[0].innerHTML = "";
                        $("#"+selectCase[0].id).append("<i class=' "+ value +" '></i>")
                    }
                    if (typeof(value) !=='number')
                    {
                        if (value.includes("paint")) // cas ou la case est une fleche
                        {
                            selectCase[0].innerHTML = "";
                            $("#"+selectCase[0].id).append("<i class='"+ value +"'></i>")
                        }
                    }
                    if (value == "null") // cas ou la case est reinitialise
                    {
                        selectCase[0].innerHTML = "";
                        $("#"+selectCase[0].id).append("<i></i>")

                    }
                }
               this.updateFunctionAction(1, false);
               
               if(this.boolStop == false)
                {
                    console.log("stop car action touche en jeu");
                    this.stop();
                }
               

            },


            getFonctions()  // Renvoie tableau objet fonction [ {id:1,cases:[ {action:f1,couleur:aucune} , {action:gauche,couleur:blanc} ] },]
            {
                let monjson = this.parse();
                let monTableau = []
                for (var fonction in monjson.fonctions)
                {
                    let monObjet = {id: parseInt(fonction,10)+1,cases:[]}
                    let mesCases =[];
                   for (var i = 0; i < monjson.fonctions[fonction].nombreCase; i++) //recup by id avec i et fonction // recup info icone ? recup info color ?
                   {
                       let Case = document.getElementById("btn-f"+(parseInt(fonction,10)+1)+"-case-"+(i+1));
                       let caseEnfant = Case.childNodes;

                       let maCase = {action:null,couleur:null}

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
                       if (maCase.action !=null)
                       {
                        mesCases.push(maCase);
                       }
                        
                   }
                    monObjet.cases=mesCases;
                    monTableau[fonction] = monObjet;

                } 
                return monTableau;
            },

            resetShuttle() // repositionne le vaisseau à son point de depart en enlevant toute rotation
            {
                console.log("method reset shuttle");
                var grilleJeu = document.getElementById("grilleJeu").childNodes;

                var position = this.infoGrille(grilleJeu);
                //console.log("apres grille");
                var position2 = this.getShuttleStart();  

                //console.log({position,position2});

                let shuttleClass = "fa fa-space-shuttle text-white fa-3x "+this.parse().rotationStart;

                let newShuttle = document.createElement("i");

                newShuttle.className = shuttleClass;
               
               if (position.vaisseau.length !=0)
               {
                   this.setShuttle(grilleJeu,position.vaisseau[0],position.vaisseau[1],position2[0],position2[1]);
               }
               
             
               grilleJeu[position2[1]].childNodes[position2[0]].childNodes[0].childNodes[0].remove();
                
               grilleJeu[position2[1]].childNodes[position2[0]].childNodes[0].appendChild(newShuttle); 

            },

            getShuttleStart() // renvoie la position de depart du vaisseau en parcourant le json originel pour remettre le jeu a zerp
            {
                let json =this.parse();
                let tab=[];
                
                for (var i=0; i< 10;  i++) 
                {
                    for (var j=0; j< 10 ; j++ ) 
                    {       
                        if (json.lignes[i].cases[j].departBool ==true)
                        {
                            //console.log({i,j})
                            tab.push(json.lignes[i].cases[j].idCase-1);
                            tab.push(json.lignes[i].idLigne-1);
                            
                        }
                    }
                }
                return tab;
            },


            getStarsStart() // renvoie la position de depart des etoiles en parcourant le json originel pour remettre le jeu a zerp
            {
                let json =this.parse();
                let tab=[];
                
                for (var i=0; i< 10;  i++) 
                {
                    for (var j=0; j< 10 ; j++ ) 
                    {       
                        if (json.lignes[i].cases[j].etoileBool ==true)
                        {
                            //console.log({i,j})
                            let etoile = {i:json.lignes[i].cases[j].idCase-1,j:json.lignes[i].idLigne-1}
                            tab.push(etoile);
                            
                        }
                    }
                }
                return tab;
            },

            resetStars() // repositionne les étoiles à son point de depart en enlevant toute rotation
            {
                console.log("method reset stars");
                var grilleJeu = document.getElementById("grilleJeu").childNodes;

                //console.log("apres grille");
                var position = this.getStarsStart();  

                //console.log({position});

                //console.log({position,position2});
               
               
                

               for (var i=0; i<position.length; i++)
               {
                   let starClass = " fa fa-star text-yellow-500 fa-3x ";

                   let newStar = document.createElement("i");

                   newStar.className = starClass;

                   //console.log({newStar});

                   //console.log({i});
                   //console.log(grilleJeu[position[i].j].childNodes[position[i].i].childNodes[0]);
                   //console.log(grilleJeu[position[i].j].childNodes[position[i].i].childNodes[0].childNodes[0]);
                   
                   if (grilleJeu[position[i].j].childNodes[position[i].i].childNodes[0].childNodes[0] == null)
                   {
                       //console.log("dans le if");
                       let element = grilleJeu[position[i].j].childNodes[position[i].i].childNodes[0];
                       element.appendChild(newStar);

                       //console.log({element})
                   }

                  //console.log(grilleJeu[position[i].j].childNodes[position[i].i].childNodes[0].childNodes[0]);
                   
               }

               

            },

            clearFunctions()  // Nettoie les cases fonctions, bouton nettoyer fonction
            {
                console.log("clearfunctions");
                let monjson = this.parse();
                let monTableau = []
                for (var fonction in monjson.fonctions)
                {
                   
                   for (var i = 0; i < monjson.fonctions[fonction].nombreCase; i++) //recup by id avec i et fonction // recup info icone ? recup info color ?
                   {
                       let element = document.getElementById("btn-f"+(parseInt(fonction,10)+1)+"-case-"+(i+1));
                       if (element.childNodes[0] != null)
                       {
                           element.removeChild(element.childNodes[0]);
                       } 
                       element.className = "mt-4 bg-black border border-white  rounded w-12 h-12 text-white mr-4 important";
                       
                   }
                }
                this.cleanListeAction();
            },

            ajouterCaseAction() // ajout une case vide dans la liste d action
            {
                console.log("ajout case action");
                let mesActions = document.getElementById("mesActions");

                let nbCaseAction = this.countTotalAction();


                let element = document.createElement("button");

                element.id = "ListeAction"+(nbCaseAction+1);

                element.className =" border border-white hover:border-black rounded w-12 h-12 text-white mr-1 pointer-events-none ";
                
                
                let element2 = document.createElement("i");

                element.appendChild(element2);


                mesActions.appendChild(element);
                
            },

            countTotalAction() // compte le nombre total d action dans la liste
            {
                //console.log("count case action total");
                let mesActions = document.getElementById("mesActions");

                let nbCaseActions = mesActions.childElementCount-1;

                return nbCaseActions;
            },

            countUsedAction() // compte le nombre d action non vide
            {
                //console.log("count case action non vide");

                let mesActions = document.getElementById("mesActions");

                //console.log(mesActions);
                //console.log("longueur mes actions childnodes length");
                //console.log(mesActions.childNodes);

                for (var i = 0; i < mesActions.childNodes.length; i++) // si il n y a pas de classe a l icon ou au div(f1) alors case vide
                {
                    //console.log(mesActions.childNodes[i]);
                    if (mesActions.childNodes[i].childNodes[0] != null )
                    {
                        //console.log(mesActions.childNodes[i].childNodes[0]);
                        //console.log(mesActions.childNodes[i].childNodes[0].className);
                        //console.log({i});
                       

                        if (mesActions.childNodes[i].childNodes[0].className == "")
                        {
                            //console.log("i final "+ i);
                            return (i-1) ;
                        }
                        
                    }
                    
                }

            },

            cleanListeAction() // reinitialise la liste d action
            {
                console.log("clean liste action");

                let mesActions = document.getElementById("mesActions");
                //console.log({mesActions});
                mesActions.innerHTML ='';

                let element = document.createElement("button");

                element.id = "listeAction";

                element.className =" bg-black border border-white hover:border-black rounded w-12 h-12 text-white mr-1 pointer-events-none";
                
                let element2 = document.createElement("i");

                element2.className = "relative fas fa-terminal";

                element.appendChild(element2);

                mesActions.appendChild(element);

                for (var i = 1; i <11; i++) 
                {
                    let element = document.createElement("button");

                    element.id = "ListeAction"+i;

                    element.className =" border border-white hover:border-black rounded w-12 h-12 text-white mr-1 pointer-events-none";
                        
                    let element2 = document.createElement("i");

                    element.appendChild(element2);

                    mesActions.appendChild(element);

                }
            
            },

            paint(grilleJeu,a,b,paintClasse) // action peindre qui change la couleur d une case 
            {
                //console.log({grilleJeu,a,b,paintClasse});

                console.log("paint")

                //"DATE:20091201T220000\r\nSUMMARY:Dad's birthday".match(/^SUMMARY\:(.*)$/gm);
                let color = paintClasse.match(/(^|\s)text-\S+/g)[0];
                color = color.replace("text","bg");

                let maClasse = grilleJeu[b].childNodes[a].childNodes[0].className;

                maClasse = maClasse.replace(/(^|\s)bg-\S+/g, "");

                maClasse = maClasse +" bg-opacity-75 " +color;

                grilleJeu[b].childNodes[a].childNodes[0].className = maClasse;

            },

            resetPaint() // reinitialise aux couleurs des cases initiales
            {
                console.log("method reset paint");

                let json =this.parse();

                var grilleJeu = document.getElementById("grilleJeu").childNodes;

                 for (var i = 0; i< 10;i++)
                 {
                    for (var j = 0; j< 10;j++)
                    {
                        if (grilleJeu[i].childNodes[j].childNodes[0].className.includes("border"))
                        {
                            //console.log(grilleJeu[i].childNodes[j].childNodes[0].className);
                            //console.log(grilleJeu[i].childNodes[j].childNodes[0]);

                            let color = grilleJeu[i].childNodes[j].childNodes[0].className.match(/(^|\s)bg-\S+/g)[1];

                            if (color == null) // cas sans couleur 
                            {

                                let maClasse = grilleJeu[i].childNodes[j].childNodes[0].className;

                                maClasse = maClasse.replace(/(^|\s)bg-\S+/g, "");

                                grilleJeu[i].childNodes[j].childNodes[0].className = maClasse +" bg-opacity-75 ";

                            }
                            else // cas avec couleur
                            {

                                color = color.trimStart();
                                
                                let oldColor = json.lignes[i].cases[j].couleur;
                                
                                if (oldColor != color) // si la couleur a ete change
                                {
                                    //console.log("remplacement")
                                    //console.log({oldColor,color});

                                    let maClasse = grilleJeu[i].childNodes[j].childNodes[0].className;

                                    maClasse = maClasse.replace(/(^|\s)bg-\S+/g, "");

                                    maClasse = maClasse +" bg-opacity-75 " + oldColor;

                                    grilleJeu[i].childNodes[j].childNodes[0].className = maClasse;
                                }

                            }

                            

                        }
                    

                    }

                 }
            },




        }
       
    }

 
    
    
    

    
</script>

