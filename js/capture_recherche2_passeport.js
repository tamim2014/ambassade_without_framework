   
		//AJAX: instance XMLHttpRequest  for all browsers. Attention! c'est peut être cette fonction qui pose problème à IE
		function instanceXMLHttpRequest() {
                if (window.XMLHttpRequest) {
                     // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                } else {
                     // code for IE6, IE5
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
		}
        //jQuery : Recuperation de la valeur du champs  #search_span , suite au clic sur le bouton ENTER du clavier
		//AJAX:    Transmissions (des clics recuperés) vers la div #yivawo de la page lectureBD.php après le bouton ENTER
		 $(document).ready(function(){
                    var contenu=document.getElementById("search"); 			 
					$("#search").keyup(function(e) {  
							
						if(e.keyCode == 13) {	
							captureContenu(contenu.value);													  																	  
					    }
					
					});
		});
		function captureContenu(str){ // str represente la préfecture selectionnée dans le sous-menu
            if (str == "") { 
			     document.getElementById("yivawo").innerHTML = "Oups! Vous n'avez rien saisi..."; return; 
			} else { 		      
                instanceXMLHttpRequest();// instance XMLHttpRequest for IE7+, Firefox, Chrome, Opera, Safari // code for IE6, IE5			
                xmlhttp.open("GET","SERVEUR/lectureBD_resultatMoteur.php?pr="+str,true);
				// Envoi
				xmlhttp.send(); 
				//Réception de la réponse du serveur [xmlhttp.responseText] et affichage la div yivawo[document.getElementById("yivawo").innerHTML ]
				xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
					document.getElementById("yivawo").innerHTML = xmlhttp.responseText;}
				};
            }
        }
		


		
		
		

     