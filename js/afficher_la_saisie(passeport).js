	     
	$(document).ready(function(){
			 $("ul.navigation").hide();
			 $("div#m2018").hide();
			 //$("#contenu").css('width', '99%');
			 $("img#iconemenu").hide();
			 
			 // Dégager la table affichée( lue dans la base de données)		  
			 $("#afficher_pendant_la_saisaie_passeport").mousedown(function(){			 
			       location.reload();
             });
			 
			 $("#afficher_pendant_la_saisaie_passeport").mouseenter(function(){		 			      
				   $("#afficher_pendant_la_saisaie_passeport").focus();
				   // $("span").css("display", "inline").fadeOut(2000); //permet de faire un toast               
             });
			 
			//	1 . Afficher la saise ( en utlisant AngularJS - cf la div yivawo )
			 $("#afficher_pendant_la_saisaie_passeport").click(function(){
				 $("div#m2018").hide();
				              
                 $("#contenu").css('width', '124%');				 
				 $("img#iconemenu").hide();
				 $("img#imagemenu").show();
				 $("#contenu").addClass("extended_width");//toggleClass("larger")
				 			
				 $("#yivawo ").slideDown("normal"); //affiche la saisie
				  			
				 $("ul.navigation").show("slow");// affiche le menu de droite
				 $(" ul#seulement_les_passeports ").slideDown("slow");// affiche le sous-menu de passeport
				 
				return false; // On empêche le navigateur de suivre le lien :			 
             });
			 
			 
             
		    //2.open the input viewer when the page is loaded.
			$(window).load(function(){
				 $("div#m2018").hide();
                 
                 $("#contenu").css('width', '124%');				 
				 $("img#iconemenu").hide();
				 $("img#imagemenu").show();
				 $("#contenu").addClass("extended_width");//toggleClass("larger")
				 
				 $("#yivawo").slideDown("normal"); //affiche le contenu
				 $("ul.navigation").show("slow");// affiche le menu de droite
				 $(" ul#seulement_les_passeports ").slideDown("slow");// affiche le sous-menu de passeport				 
				return false;						
			});
			
		    //3. When you submit the form, a function is triggered, which displays a database view (sorted by date entered)
			$("#submit_load").mouseenter(function(){				
				/***********************************************************************************
				*
                * PROBLEME: LES 2 ACTIONS(submit et load) NE VONT PAS ENSEMBLE( soit l'un , soit l'autre)
				*           donc impossible  de surcharger l'evenem: soit elle enregistre, soit elle affiche la vue BD 
				* SOLUTION: ?????????
				* POURQUOI? car le traitement php du formulaire renvoie à la page index(this) qui se recharge. L'evenement click est donc ignoré
                * SOLUTION : changer le type d'evennement( mouseenter en lieu et place du click)
                * tjrs consulter  D ABORD la liste des evennement pour résoudre un  problème d'interraction Homme/Machnie	
                * source: https://openclassrooms.com/fr/courses/1567926-un-site-web-dynamique-avec-jquery/1568731-jquery-et-les-evenements
				* Attention ! j'ai perdu une journée sur ce blem
				*
                ************************************************************************************/ 
				 // $("form").submit();		
                   $("#yivawo").load("submit_load_ajax/passeports_envoyes.php?pr=Envois");	                 				   
			}); 			
    });    
	