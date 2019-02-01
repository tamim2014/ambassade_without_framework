		
		
	    $(document).ready(function(){
			$("div#m2018").hide();			 
			$("div#m2019").hide();			 
			$("div#m2020").hide();			 
			$("div#yivawo").hide();			 
			$(".topnav").hide();
            		
	        /* gestion du sous-sous-menu verical(mois)- je vais implementer les autre année dans la topnav avec une autre technologie moins compliquée */
			$("li  a.island1").click(function(){
				   $("ul.navigation li.toggleSubMenu ul.subMenu li ul.panel3").show();
				   $("div#m2018").toggle("slow");
				   $("div#m2019").hide();
				   $("div#m2020").hide();				   												   				 		
             });
		     $("li  a.island2").click(function(){
				   $("ul.navigation li.toggleSubMenu ul.subMenu li ul.panel3").show();
				   $("div#m2018").hide();
				   $("div#m2019").toggle("slow");				   
				   $("div#m2020").hide();				   				   												   				 		
             });
			 $("li  a.island3").click(function(){
				   $("ul.navigation li.toggleSubMenu ul.subMenu li ul.panel3").show();
				   $("div#m2018").hide();
				   $("div#m2019").hide();
				   $("div#m2020").toggle("slow");
				   				   												   				 		
             });		  		
		    /* cacher la ceinture(le menu horizontale) pour pas poluer la vue de l utilisateur */
			$("div#nav").click(function(){
				    
				   $("div.topnav").toggle("slow");
				   $("#search_span").toggle("slow");			 				                     				   
            });
			/* empecher la ceinture de s'barrer quant on click sur le moteur de recherche */
			$("#search").click(function(){
				   $("div.topnav").slideUp();// putain quelle delire!!!!ça marche avec un effet de ouf !!!!!!!!!!!
			});
			
			 /* Idem pour le panneau d 'affichage( yivawo) */
			 $("img#iconemenu").click(function(){
				 $("div#yivawo").slideToggle("slow");
			 }); 
			$("img#imagemenu").click(function(){
				 $("div#yivawo").slideToggle("slow");
			 });
			  /* Le moteur de recherche ouvre aussi , tous les outils de travail */
			$("body div#wrap div#main div#navgauche div#s_recherche input#recherche").click(function(){
				 $("div#yivawo").show();
				 $("ul.navigation").show();
				 $("div.topnav").show();
				
			 });
		}); 							
								
	