	
	     $(document).ready(function(){
			 $("ul.navigation").hide();
			 $("div#m2018").hide();
			 //$("#contenu").css('width', '99%');
			 $("img#iconemenu").hide();
			 
			 // Dégager la table affichée( lue dans la base de données)		  
			 $("#afficher_pendant_la_saisaie_recette").mousedown(function(){			 
			       location.reload();
             });
			 
			 $("#afficher_pendant_la_saisaie_recette").mouseenter(function(){		 			      
				   $("#afficher_pendant_la_saisaie_recette").focus();
				   // $("span").css("display", "inline").fadeOut(2000); //permet de faire un toast               
             });
			 
			//	Affichée la saise ( en utlisant AngularJS - cf la div yivawo )
			 
			 $(".afficher_pendant_la_saisaie_recette").click(function(){
				 $("div#m2018").hide();
                 
                 $("#contenu").css('width', '124%');				 
				 $("img#iconemenu").hide();
				 $("img#imagemenu").show();
				 $("#contenu").addClass("extended_width");//toggleClass("larger")
				 
				 $("#yivawo").slideDown("normal"); //affiche le contenu
				 $("ul.navigation").show("slow");// affiche le menu de droite
				 $(" ul#panel2 ").slideDown("slow");// affiche le sous-menu de passeport
				 
				return false; // On empêche le navigateur de suivre le lien :
			
				 
             });
			 

			 


  
         });    
	