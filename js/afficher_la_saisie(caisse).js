	
	     $(document).ready(function(){
			 $("ul.navigation").hide();
			 $("div#m2018").hide();
			 //$("#contenu").css('width', '99%');
			 $("img#iconemenu").hide();
			 // Dégager la table affichée( lue dans la base de données)		  
			 $("#afficher_pendant_la_saisaie_caisse").mousedown(function(){			 
			       location.reload();
             });
			 
			 $("#afficher_pendant_la_saisaie_caisse").mouseenter(function(){		 			      
				   $("#afficher_pendant_la_saisaie_caisse").focus();
				   // $("span").css("display", "inline").fadeOut(2000); //permet de faire un toast               
             });
			 
			//	1.AffichER la saise ( en utlisant AngularJS - cf la div yivawo )
			 $("#afficher_pendant_la_saisaie_caisse").click(function(){
				 $("div#m2018").hide();
                 
                 $("#contenu").css('width', '124%');				 
				 $("img#iconemenu").hide();
				 $("img#imagemenu").show();
				 $("#contenu").addClass("extended_width");//toggleClass("larger")
				 
				 $("#yivawo").slideDown("normal"); //affiche le contenu
				 $("ul.navigation").show("slow");// affiche le menu de droite
				 $(" ul#panel202 ").slideDown("slow");// affiche le sous-menu de passeport
				 
				return false; // On empêche le navigateur de suivre le lien :
							 
             });
			//3. When you submit the form, a function is triggered, which displays a database view (sorted by date entered)
			$("#submit_load").mouseenter(function(){
                   // last month ( formaliser le mois courant au lieu d'ecrire en dur "Novembre-2018" 
				   
                      	var ladate=new Date();	
						var tab_mois=new Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");	
						var mois = tab_mois[ladate.getMonth()];
						var annee = ladate.getFullYear();
						var mwezi= mois+"-"+annee;

				   
			       //load ajax jquery
			
                   //$("#yivawo").load("submit_load_ajax/lectureBD_afficherListe_caisse_last_month.php?pr=Novembre-2018");	                 				   
                   $("#yivawo").load("submit_load_ajax/lectureBD_afficherListe_caisse_last_month.php?pr="+mwezi);	                 				   
			});
			 
 
         });    
	