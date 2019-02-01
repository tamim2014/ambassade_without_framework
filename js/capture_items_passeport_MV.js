//AJAX    
   
		// instance XMLHttpRequest  for all browsers. Attention! c'est peut �tre cette fonction qui pose probl�me � IE
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
   accueil_choisir_naissance.php (c'1 include de accueil_prefecture.php, qui est lui m�me include de accueil.php)
   str represente la prefecture cliqu�e par l'utilisateur dans la liste d�roulante de la page d'accueil
*/
        function captureCombo(str) { 
            if (str == "") { 
			     document.getElementById("panel").innerHTML = ""; return; 
			} else { 
                instanceXMLHttpRequest();// instance XMLHttpRequest for IE7+, Firefox, Chrome, Opera, Safari // code for IE6, IE5
                //Connection[au serveur php] et Param�ttrage[str est la prefecture choisie] 
				xmlhttp.open("GET","SERVEUR/colonne_afficher_naissance.php?p="+str,true);
                // Envoi
				xmlhttp.send(); 
				//R�ception de la r�ponse du serveur [xmlhttp.responseText] et affichage la div panel[document.getElementById("panel").innerHTML ]
				xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { document.getElementById("panel").innerHTML = xmlhttp.responseText;}};

            }
        }


//lectureBD.php
          //jQuery : Recuperation des clics sur les  sous menu(sousmenu.php)
		  //AJAX:    Transmissions (des clics recuper�s) vers la div #yivawo de la page lectureBD.php
		 $(document).ready(function(){
						/* sousmenu.php: Pour capter les clics sur les sous-menus*/
					$("div#aside ul.navigation  li.toggleSubMenu  ul.subMenu li#envoi a ").click(function() {  /* Attention! pas d'ESPACE entre l'elt et sa classe  */ /* ICI ??a marche  */
							   captureSousMenu(this.textContent);						
					});
					
					$("div#aside ul.navigation  li.toggleSubMenu  ul.subMenu li#retour a").click(function() {  
							   captureSousMenu(this.textContent);
					}); 
					
					$("div#aside ul.navigation  li.toggleSubMenu  ul.subMenu li#distrib_mensuel a").click(function() { 
							   captureSousMenu(this.textContent);
					}); 
					$("div#aside ul.navigation  li.toggleSubMenu  ul.subMenu li#distrib_annuel a").click(function() { 
							   captureSousMenu(this.textContent);
					});
					$("div#aside ul.navigation  li.toggleSubMenu  ul.subMenu li#distrib_tous a").click(function() { 
							   captureSousMenu(this.textContent);
					});
					


	

					/*** la redirection apres le submit ne fonctionne pas en javascript. i fo le faire en PHP(donc dans la page de control du formulaire) *************
												
					$("#enregistrer").click(function(){
						var str_submt = "Envois";
                        $("#yivawo").load("SERVEUR/lectureBD_afficherListePasseport.php?pr=+str_submt");
                    });
					
					// Afficher aussi la liste des passeports envoy�s suite au clic sur lebouton submit
					$("div#wrap div#main div#navgauche form  div.section input#enregistrer ").click(function() { 
						       
                         //$jq(window).attr("location ", "https://www.google.com ");						
						//document.location.href="SERVEUR/lectureBD_afficherListePasseport.php?pr="Envois" ; 
						//$(location).attr("href","https://www.google.com/ ");
						//window.location.href="http://www.nicotouch.com/2009/08/jquery-location-href-redirection-javascript-url/" ; 
							   
					});
					
					*******************************************************************************************************/

					/*************************Essai sur le mnayvawo*******************************************************
					$("ul li.sousmenu3  ul.panel3 li a").click(function() { 
							   var msg='<?PHP echo $_SESSION["pref"];?>'; // Passage d'une variable php � javaScript
							   $("annonce").html(msg); //document.getElementById("annonce").innerHTML= msg;
							 
					});
					****************************************************************************************************/
		});


		function captureSousMenu(str){ // str represente la pr�fecture selectionn�e dans le sous-menu
            if (str == "") { 
			     document.getElementById("yivawo").innerHTML = "Oups!"; return; 
			} else { 
                instanceXMLHttpRequest();// instance XMLHttpRequest for IE7+, Firefox, Chrome, Opera, Safari // code for IE6, IE5
               
                //Connection[au serveur php] et Param�ttrage[str est la prefecture choisie]  
				//xmlhttp.open("GET","SERVEUR/lectureBD_afficherNaissance.php?pr="+str,true); // On DEVRAI reutileSER le mm script car c'est le mm traitement MAIS LA VARIABLE SESSION se la ramene et m'emmerde!
                xmlhttp.open("GET","SERVEUR/lectureBD_afficherListePasseport.php?pr="+str,true);
				// Envoi
				xmlhttp.send(); 
				//R�ception de la r�ponse du serveur [xmlhttp.responseText] et affichage la div yivawo[document.getElementById("yivawo").innerHTML ]

				xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
					document.getElementById("yivawo").innerHTML = xmlhttp.responseText;}
				};
											
            }
			
			
        }
		
		

		


		
		
		

     