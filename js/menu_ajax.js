

// instance XMLHttpRequest  for all browsers_f°perso
        var textehttp=null;
		function instanceTexteHttpRequest() {
		
                if (window.XMLHttpRequest) {
                     // code for IE7+, Firefox, Chrome, Opera, Safari
                     textehttp = new XMLHttpRequest();
                } else {
                     // code for IE6, IE5
                     textehttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
		}
/* ACCES AU SERVEUR(pour lire le fichier message.txt)*/

		
		function page(url){
                
                instanceTexteHttpRequest();// instance XMLHttpRequest for IE7+, Firefox, Chrome, Opera, Safari // code for IE6, IE5
               
                //Connection[au serveur ]   
				textehttp.open("GET",url,true); 
                // Envoi
				textehttp.send(null); 
				//Réception de la réponse du serveur [xmlhttp.responseText] et affichage 

				textehttp.onreadystatechange = function() {  reponse(); };          
        }
		
		function reponse(){

				        if (textehttp.readyState == 4 && textehttp.status == 200) {
							document.getElementById("contenu").innerHTML=textehttp.responseText;
						}else{
							document.getElementById("contenu").innerHTML="<h3>Oups! La page n'est pas disponible.</h3>";
						}
				          
        }