   
		//AJAX: instance XMLHttpRequest  for all browsers. Attention! c'est peut �tre cette fonction qui pose probl�me � IE
		function instanceXMLHttpRequest() {
                if (window.XMLHttpRequest) {
                     // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                } else {
                     // code for IE6, IE5
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
		}
        //jQuery : Recuperation de la valeur du champs  #titulaire , suite au clic sur le bouton #recherche
		//AJAX:    Transmissions (des clics recuper�s) vers la div #yivawo de la page lectureBD.php
		 $(document).ready(function(){
                    var contenu=document.getElementById("titulaire"); 			 
					$("body div#wrap div#main div#navgauche form div#s_recherche input#recherche ").click(function() {  /* Attention! pas d'ESPACE entre l'elt et sa classe  */ /* ICI ??a marche  */
							captureContenu(contenu.value);// le blem doit �tre l�(voir utilisation de textContent)													  																	  
					});
		});
		function captureContenu(str){ // str represente la pr�fecture selectionn�e dans le sous-menu
            if (str == "") { 
			     document.getElementById("yivawo").innerHTML = "Oups! Vous n'avez rien saisi..."; return; 
			} else { 		      
                instanceXMLHttpRequest();// instance XMLHttpRequest for IE7+, Firefox, Chrome, Opera, Safari // code for IE6, IE5			
                xmlhttp.open("GET","SERVEUR/lectureBD_resultatMoteur.php?pr="+str,true);
				// Envoi
				xmlhttp.send(); 
				//R�ception de la r�ponse du serveur [xmlhttp.responseText] et affichage la div yivawo[document.getElementById("yivawo").innerHTML ]
				xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
					document.getElementById("yivawo").innerHTML = xmlhttp.responseText;}
				};
            }
        }
		


		
		
		

     