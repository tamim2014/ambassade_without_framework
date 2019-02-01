
//AJAX    
   
		// instance XMLHttpRequest  for all browsers. Attention! c'est peut être cette fonction qui pose problème à IE
		function instanceXMLHttpRequest() {
                if (window.XMLHttpRequest) {
                     // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                } else {
                     // code for IE6, IE5
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
		}
		

/*
   accueil_choisir_naissance.php (c'1 include de accueil_prefecture.php, qui est lui même include de accueil.php)
   str represente la prefecture cliquée par l'utilisateur dans la liste déroulante de la page d'accueil
*/
        function captureCombo(str) { 
            if (str == "") { 
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 
                instanceXMLHttpRequest();// instance XMLHttpRequest for IE7+, Firefox, Chrome, Opera, Safari // code for IE6, IE5
                //Connection[au serveur php] et Paramèttrage[str est la prefecture choisie] 
				xmlhttp.open("GET","SERVEUR/colonne_afficher_naissance.php?p="+str,true);
                // Envoi
				xmlhttp.send(); 
				//Réception de la réponse du serveur [xmlhttp.responseText] et affichage la div panel[document.getElementById("panel").innerHTML ]
				xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { document.getElementById("panel").innerHTML = xmlhttp.responseText;}};

            }
        }
		
/*************************************CAPTURE item DU SOUS-MENU******************************************************************************************************/		


//lectureBD.php
          //jQuery : Recuperation des clics sur les  sous menu(sousmenu.php)
		  //AJAX:    Transmissions (des clics recuperés) vers la div #yivawo de la page lectureBD.php
		 $(document).ready(function(){
						/* sousmenu.php: Pour capter les clics sur les sous-menus*/
					$("div#m2018  ul.panel3 li a ").click(function() {  /* Attention! pas d'ESPACE entre l'elt et sa classe  */ /* ICI ??a marche  */
							   captureSousMenu(this.textContent);
						
					});
					
					$("div#m2019  ul.panel3 li a").click(function() {  
							   captureSousMenu(this.textContent);
					}); 
					
					$("div#m2020  ul.panel3 li a").click(function() { 
							   captureSousMenu(this.textContent);
					}); 

					/*************************Essai sur le mnayvawo**********************
					$("ul li.sousmenu3  ul.panel3 li a").click(function() { 
							   var msg='<?PHP echo $_SESSION["pref"];?>'; // Passage d'une variable php à javaScript
							   $("annonce").html(msg); //document.getElementById("annonce").innerHTML= msg;
							 
					});
					********************************************************************/
		 });


		function captureSousMenu(str){ // str represente la préfecture selectionnée dans le sous-menu
            if (str == "") { 
			     document.getElementById("yivawo").innerHTML = ""; return; 
			} else { 
                instanceXMLHttpRequest();// instance XMLHttpRequest for IE7+, Firefox, Chrome, Opera, Safari // code for IE6, IE5
               
                //Connection[au serveur php] et Paramèttrage[str est le "moi" choisi]  
				xmlhttp.open("GET","SERVEUR/lectureBD_afficherListe_caisse.php?pr="+str,true); // On DEVRAI reutileSER le mm script car c'est le mm traitement MAIS LA VARIABLE SESSION se la ramene et m'emmerde!
                // Envoi
				xmlhttp.send(); 
				//Réception de la réponse du serveur [xmlhttp.responseText] et affichage la div yivawo[document.getElementById("yivawo").innerHTML ]

				xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
					document.getElementById("yivawo").innerHTML = xmlhttp.responseText;}
				};
            }
        }
/*************************************CAPTURE item DU MENU( necessaire si le nom du sous menu n'est pas unique): test sans succes****************************************************************/		
		
		 $(document).ready(function(){
					/* sousmenu.php: Pour capter les clics sur les sous-menus*/
					$("div.kangalaheMenu ul#panel2 li a.island1   ").click(function() {  /* Attention! pas d'ESPACE entre l'elt et sa classe  */ /* ICI ??a marche  */
							   captureMenu(this.textContent);
						
					});
					
					$("div.kangalaheMenu ul#panel2 li a.island2   ").click(function() {  /* Attention! pas d'ESPACE entre l'elt et sa classe  */ /* ICI ??a marche  */
							   captureMenu(this.textContent);
						
					});
					
					$("div.kangalaheMenu ul#panel2 li a.island3   ").click(function() {  /* Attention! pas d'ESPACE entre l'elt et sa classe  */ /* ICI ??a marche  */
							   captureMenu(this.textContent);
						
					});
						
		 });
		 
		function captureMenu(annees){ // str represente la préfecture selectionnée dans le sous-menu
            if (annees == "") { 
			     document.getElementById("yivawo").innerHTML = ""; return; 
			} else { 
                instanceXMLHttpRequest();// instance XMLHttpRequest for IE7+, Firefox, Chrome, Opera, Safari // code for IE6, IE5
               
                //Connection[au serveur php] et Paramèttrage[str est le "moi" choisi]  
				xmlhttp.open("GET","SERVEUR/lectureBD_afficherListe_caisse.php?moiha="+annees,true); // On DEVRAI reutileSER le mm script car c'est le mm traitement MAIS LA VARIABLE SESSION se la ramene et m'emmerde!
                // Envoi
				xmlhttp.send(); 
				//Réception de la réponse du serveur [xmlhttp.responseText] et affichage la div yivawo[document.getElementById("yivawo").innerHTML ]

            }
        }

		
		
		

     