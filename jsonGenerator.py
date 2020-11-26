# jeu 15 par 15 /// passez dans un json formatter pour les ""

def json (n):
    json ="{'id':1,'nbCouleur':3,'fonctions':[{'idFonction':1,'nombreCase':3}],'lignes':["
    lignes=""
    
    for i in range(n):
        
        cases =""
        json = json + "{'idLigne':"+str(i+1)+", 'cases': ["
        
        for i in range(n):
            
            cases = cases + "{'idCase':"+str(i+1)+ ",'etoileBool':false,'departBool':false,'couleur':'','visible':true,},"
            
            
        json += cases+"]},"
        
    json +="]}"
    
    return json

    
            
    
