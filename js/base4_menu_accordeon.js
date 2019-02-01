	
	     $(document).ready(function(){
			 $("ul.navigation").hide();
			 $("div#m2018").hide();
			 //$("#contenu").css('width', '99%');
			 $("img#iconemenu").hide();
			 
			 $("img#iconemenu").click(function(){
				 $("div#m2018").hide();
                 $("ul.navigation").toggle("slow");// affiche le menu
                 $("#contenu").css('width', '124%');				 
				 $("img#iconemenu").hide();
				 $("img#imagemenu").show();
				 $("#contenu").addClass("extended_width");//toggleClass("larger")
				 
             });
			 
             $("img#imagemenu").click(function(){
				 $("div#m2018").hide();
                 $("ul.navigation").toggle("slow");// cache le menu
				 $("#contenu").css('width', '100%');
				  $(" ul.navigation li.toggleSubMenu ul.subMenu li ul.panel3").hide();				  
				// $("#contenu").css('background', '#e5eec1');				 
				 $("img#iconemenu").show();
				 $("img#imagemenu").hide();
				 $("#contenu").removeClass("extended_width");
			     $("#contenu").addClass("reduced_width");
				 

             }); 
			 


  
         });    
	