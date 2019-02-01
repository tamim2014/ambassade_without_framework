    $(document).ready(function(){
	 //Masquer/afficher  le formulaire de saisie
	    $("#close").hide();
		$("#write").show();
		$("#write").click(function(){
			$("div").show();
			$("#write").hide();
			$("#close").show();
			$("#contenu").css('width', '55.5%'); 
		});
		$("#close").click(function(){
			$("#f").hide();
			$("#close").hide();
			$("#write").show();
			$("#contenu").css('width', '82%');  
		});
		// Afficher le contenu en smoll( mode responsive design)
		$("input#afficher").click(function(){
			$("#f").hide();
			
			$("#close").hide();
			$("#write").hide();
			$("#openread").hide();
			
			$("#closeread").show();

			$("div#contenu").css('width', 'auto');
			$("div#contenu").css('top', '50px');
			$("div#contenu").css('left', '1px');
			$("div#contenu").css('right', '1px');

			$("div#contenu").show(); 
			$("input.txt").attr('maxlength', '18'); 
		});
		//Masquer/afficher le questionaire

		$("#openread").click(function(){
			$("#f").hide();
			$("#close").hide();
			$("#write").hide();
			$("#openread").hide();
			
			$("#closeread").show();
			$("div#contenu").show();
			
			$("div#contenu").css('width', 'auto');
			$("div#contenu").css('top', '50px');
			$("div#contenu").css('left', '1px');
			$("div#contenu").css('right', '1px');
		});
		$("#closeread").click(function(){
			$("div#contenu").hide();
			
			$("#close").hide();
			$("#closeread").hide();

			$("#write").show();
			$("#openread").show();
			
		});
		

	 // MENUS :Sources :http://www.alsacreations.com/tuto/lire/604-Creer-un-menu-accordeon-avec-jQuery.html
					 // On cache les sous-menus :
				$(".navigation ul.subMenu").hide();
				// On sélectionne tous les items de liste portant la classe "toggleSubMenu"

				// et on remplace l'élément span qu'ils contiennent par un lien :
				$(".navigation li.toggleSubMenu span").each( function () {
					// On stocke le contenu du span :
					var TexteSpan = $(this).text();
					$(this).replaceWith('<a href="" title="Afficher le sous-menu">' + TexteSpan + '<\/a>') ;
				} ) ;

				// On modifie l'évènement "click" sur les liens dans les items de liste
				// qui portent la classe "toggleSubMenu" :
				$(".navigation li.toggleSubMenu > a").click( function () {
					// Si le sous-menu était déjà ouvert, on le referme :
					if ($(this).next("ul.subMenu:visible").length != 0) {
						$(this).next("ul.subMenu").slideUp("normal");
					}
					// Si le sous-menu est caché, on ferme les autres et on l'affiche :
					else {
						$(".navigation ul.subMenu").slideUp("normal");
						$(this).next("ul.subMenu").slideDown("normal");
					}
					// On empêche le navigateur de suivre le lien :
					return false;
				});    
    });