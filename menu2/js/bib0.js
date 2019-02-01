// Question33		
		function reponse33(){  
		  var R33=document.getElementById("R33").textContent;
          document.getElementById("d33").style.display="block";  
		  document.getElementById("d33").innerHTML=R33;
		  document.getElementById("bt33").style.display="inline"; 
		  document.getElementById("bt33_").style.display="inline"; 
		  
		}
		function effacer33(){
           var box=document.getElementById("d33");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t33").value="" ; 		   
		}
		function enlever33(){
             
		   document.getElementById("d33").style.display="none"; 
		   document.getElementById("bt33").style.display="none"; 
		   document.getElementById("bt33_").style.display="none"; 
		}
// Question34		
		function reponse34(){  
		  var R34=document.getElementById("R34").textContent;
          document.getElementById("d34").style.display="block";  
		  document.getElementById("d34").innerHTML=R34;
		  document.getElementById("bt34").style.display="inline"; 
		  document.getElementById("bt34_").style.display="inline"; 
		  
		}
		function effacer34(){
           var box=document.getElementById("d34");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t34").value="" ; 		   
		}
		function enlever34(){
             
		   document.getElementById("d34").style.display="none"; 
		   document.getElementById("bt34").style.display="none"; 
		   document.getElementById("bt34_").style.display="none"; 
		}
// Question35		
		function reponse35(){  
		  var R35=document.getElementById("R35").textContent;
          document.getElementById("d35").style.display="block";  
		  document.getElementById("d35").innerHTML=R35;
		  document.getElementById("bt35").style.display="inline"; 
		  document.getElementById("bt35_").style.display="inline"; 
		  
		}
		function effacer35(){
           var box=document.getElementById("d35");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t35").value="" ; 		   
		}
		function enlever35(){
             
		   document.getElementById("d35").style.display="none"; 
		   document.getElementById("bt35").style.display="none"; 
		   document.getElementById("bt35_").style.display="none"; 
		}
// Question36		
		function reponse36(){  
		  var R36=document.getElementById("R36").textContent;
          document.getElementById("d36").style.display="block";  
		  document.getElementById("d36").innerHTML=R36;
		  document.getElementById("bt36").style.display="inline"; 
		  document.getElementById("bt36_").style.display="inline"; 
		  
		}
		function effacer36(){
           var box=document.getElementById("d36");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t36").value="" ; 		   
		}
		function enlever36(){
             
		   document.getElementById("d36").style.display="none"; 
		   document.getElementById("bt36").style.display="none"; 
		   document.getElementById("bt36_").style.display="none"; 
		}
// Question37		
		function reponse37(){  
		  var R37=document.getElementById("R37").textContent;
          document.getElementById("d37").style.display="block";  
		  document.getElementById("d37").innerHTML=R37;
		  document.getElementById("bt37").style.display="inline"; 
		  document.getElementById("bt37_").style.display="inline"; 
		  
		}
		function effacer37(){
           var box=document.getElementById("d37");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t37").value="" ; 		   
		}
		function enlever37(){
             
		   document.getElementById("d37").style.display="none"; 
		   document.getElementById("bt37").style.display="none"; 
		   document.getElementById("bt37_").style.display="none"; 
		}
// Question38		
		function reponse38(){  
		  var R38=document.getElementById("R38").textContent;
          document.getElementById("d38").style.display="block";  
		  document.getElementById("d38").innerHTML=R38;
		  document.getElementById("bt38").style.display="inline"; 
		  document.getElementById("bt38_").style.display="inline"; 
		  
		}
		function effacer38(){
           var box=document.getElementById("d38");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t38").value="" ; 		   
		}
		function enlever38(){
             
		   document.getElementById("d38").style.display="none"; 
		   document.getElementById("bt38").style.display="none"; 
		   document.getElementById("bt38_").style.display="none"; 
		}
// Question39		
		function reponse39(){  
		  var R39=document.getElementById("R39").textContent;
          document.getElementById("d39").style.display="block";  
		  document.getElementById("d39").innerHTML=R39;
		  document.getElementById("bt39").style.display="inline"; 
		  document.getElementById("bt39_").style.display="inline"; 
		  
		}
		function effacer39(){
           var box=document.getElementById("d39");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t39").value="" ; 		   
		}
		function enlever39(){
             
		   document.getElementById("d39").style.display="none"; 
		   document.getElementById("bt39").style.display="none"; 
		   document.getElementById("bt39_").style.display="none"; 
		}
// Question40		
		function reponse40(){  
		  var R40=document.getElementById("R40").textContent;
          document.getElementById("d40").style.display="block";  
		  document.getElementById("d40").innerHTML=R40;
		  document.getElementById("bt40").style.display="inline"; 
		  document.getElementById("bt40_").style.display="inline"; 
		  
		}
		function effacer40(){
           var box=document.getElementById("d40");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t40").value="" ; 		   
		}
		function enlever40(){
             
		   document.getElementById("d40").style.display="none"; 
		   document.getElementById("bt40").style.display="none"; 
		   document.getElementById("bt40_").style.display="none"; 
		}
// Question41
        function reponse41(){
         //1. Définition d'une instance xhr, de l'objet XMLHttpRequest
			var xhr=null;
			if(window.XMLHttpRequest){ var xhr=new XMLHttpRequest();}
			else if(window.ActiveXObject){ var xhr=new ActiveXObject("Microsft.XMLHTTP");}
			else { "Votre navigateur est incompatible avec AJAX..."}
		//2.Requête client vers le SERVEUR web
			xhr.open("GET","fichiersTexte/reponse0.41.txt",true);// OUVRIR UNE URL
			xhr.send(null);                  // ENVOYER LA REQUETTE
		    document.getElementById("d41").style.display="block"; // La div où on va afficher la réponse   
		//3.Affichage:
			xhr.onreadystatechange=function(){
			if(xhr.readyState ==4 && xhr.status==200){ //si chargement complete && fichier mages.txt trouvé
					   document.getElementById('d41').innerHTML=xhr.responseText;}
			}		    
		// Les boutons de control(rien avoir avec AJAX)  
		  document.getElementById("bt41").style.display="inline"; 
		  document.getElementById("bt41_").style.display="inline"; 
		}
		function effacer41(){
           var box=document.getElementById("d41");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t41").value="" ; 		   
		}
		function enlever41(){
             
		   document.getElementById("d41").style.display="none"; 
		   document.getElementById("bt41").style.display="none"; 
		   document.getElementById("bt40_").style.display="none"; 
		}
// Question42		
		function reponse42(){  
		  var R42=document.getElementById("R42").textContent;
          document.getElementById("d42").style.display="block";  
		  document.getElementById("d42").innerHTML=R42;
		  document.getElementById("bt42").style.display="inline"; 
		  document.getElementById("bt42_").style.display="inline"; 
		  
		}
		function effacer42(){
           var box=document.getElementById("d42");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t42").value="" ; 		   
		}
		function enlever42(){
             
		   document.getElementById("d42").style.display="none"; 
		   document.getElementById("bt42").style.display="none"; 
		   document.getElementById("bt42_").style.display="none"; 
		}
// Question43
        function reponse43(){
         //1. Définition d'une instance xhr, de l'objet XMLHttpRequest
			var xhr=null;
			if(window.XMLHttpRequest){ var xhr=new XMLHttpRequest();}
			else if(window.ActiveXObject){ var xhr=new ActiveXObject("Microsft.XMLHTTP");}
			else { "Votre navigateur est incompatible avec AJAX..."}
		//2.Requête client vers le SERVEUR web
			xhr.open("GET","fichiersTexte/reponse0.43.txt",true);// OUVRIR UNE URL
			xhr.send(null);                  // ENVOYER LA REQUETTE
		    document.getElementById("d43").style.display="block"; // La div où on va afficher la réponse   
		//3.Affichage:
			xhr.onreadystatechange=function(){
			if(xhr.readyState ==4 && xhr.status==200){ //si chargement complete && fichier mages.txt trouvé
					   document.getElementById('d43').innerHTML=xhr.responseText;}
			}		    
		// Les boutons de control(rien avoir avec AJAX)  
		  document.getElementById("bt43").style.display="inline"; 
		  document.getElementById("bt43_").style.display="inline"; 
		}
		function effacer43(){
           var box=document.getElementById("d43");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t43").value="" ; 		   
		}
		function enlever43(){
             
		   document.getElementById("d43").style.display="none"; 
		   document.getElementById("bt43").style.display="none"; 
		   document.getElementById("bt43_").style.display="none"; 
		}
// Question44		
		function reponse44(){  
		  var R44=document.getElementById("R44").textContent;
          document.getElementById("d44").style.display="block";  
		  document.getElementById("d44").innerHTML=R44;
		  document.getElementById("bt44").style.display="inline"; 
		  document.getElementById("bt44_").style.display="inline"; 
		  
		}
		function effacer44(){
           var box=document.getElementById("d44");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t44").value="" ; 		   
		}
		function enlever44(){
             
		   document.getElementById("d44").style.display="none"; 
		   document.getElementById("bt44").style.display="none"; 
		   document.getElementById("bt44_").style.display="none"; 
		}
// Question45
        function reponse45(){
         //1. Définition d'une instance xhr, de l'objet XMLHttpRequest
			var xhr=null;
			if(window.XMLHttpRequest){ var xhr=new XMLHttpRequest();}
			else if(window.ActiveXObject){ var xhr=new ActiveXObject("Microsft.XMLHTTP");}
			else { "Votre navigateur est incompatible avec AJAX..."}
		//2.Requête client vers le SERVEUR web
			xhr.open("GET","fichiersTexte/reponse0.45.txt",true);// OUVRIR UNE URL
			xhr.send(null);                  // ENVOYER LA REQUETTE
		    document.getElementById("d45").style.display="block"; // La div où on va afficher la réponse   
		//3.Affichage:
			xhr.onreadystatechange=function(){
			if(xhr.readyState ==4 && xhr.status==200){ //si chargement complete && fichier mages.txt trouvé
					   document.getElementById('d45').innerHTML=xhr.responseText;}
			}		    
		// Les boutons de control(rien avoir avec AJAX)  
		  document.getElementById("bt45").style.display="inline"; 
		  document.getElementById("bt45_").style.display="inline"; 
		}
		function effacer45(){
           var box=document.getElementById("d45");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t45").value="" ; 		   
		}
		function enlever45(){
             
		   document.getElementById("d45").style.display="none"; 
		   document.getElementById("bt45").style.display="none"; 
		   document.getElementById("bt45_").style.display="none"; 
		}
// Question46		
		function reponse46(){  
		  var R46=document.getElementById("R46").textContent;
          document.getElementById("d46").style.display="block";  
		  document.getElementById("d46").innerHTML=R46;
		  document.getElementById("bt46").style.display="inline"; 
		  document.getElementById("bt46_").style.display="inline";   
		}
		function effacer46(){
           var box=document.getElementById("d46");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t46").value="" ; 		   
		}
		function enlever46(){
             
		   document.getElementById("d46").style.display="none"; 
		   document.getElementById("bt46").style.display="none"; 
		   document.getElementById("bt46_").style.display="none"; 
		}
// Question47
        function reponse47(){
         //1. Définition d'une instance xhr, de l'objet XMLHttpRequest
			var xhr=null;
			if(window.XMLHttpRequest){ var xhr=new XMLHttpRequest();}
			else if(window.ActiveXObject){ var xhr=new ActiveXObject("Microsft.XMLHTTP");}
			else { "Votre navigateur est incompatible avec AJAX..."}
		//2.Requête client vers le SERVEUR web
			xhr.open("GET","fichiersTexte/reponse0.47.txt",true);// OUVRIR UNE URL
			xhr.send(null);                  // ENVOYER LA REQUETTE
		    document.getElementById("d47").style.display="block"; // La div où on va afficher la réponse   
		//3.Affichage:
			xhr.onreadystatechange=function(){
			if(xhr.readyState ==4 && xhr.status==200){ //si chargement complete && fichier mages.txt trouvé
					   document.getElementById('d47').innerHTML=xhr.responseText;}
			}		    
		// Les boutons de control(rien avoir avec AJAX)  
		  document.getElementById("bt47").style.display="inline"; 
		  document.getElementById("bt47_").style.display="inline"; 
		}
		function effacer47(){
           var box=document.getElementById("d47");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t47").value="" ; 		   
		}
		function enlever47(){
             
		   document.getElementById("d47").style.display="none"; 
		   document.getElementById("bt47").style.display="none"; 
		   document.getElementById("bt47_").style.display="none"; 
		}
// Question48
        function reponse48(){
         //1. Définition d'une instance xhr, de l'objet XMLHttpRequest
			var xhr=null;
			if(window.XMLHttpRequest){ var xhr=new XMLHttpRequest();}
			else if(window.ActiveXObject){ var xhr=new ActiveXObject("Microsft.XMLHTTP");}
			else { "Votre navigateur est incompatible avec AJAX..."}
		//2.Requête client vers le SERVEUR web
			xhr.open("GET","fichiersTexte/reponse0.48.txt",true);// OUVRIR UNE URL
			xhr.send(null);                  // ENVOYER LA REQUETTE
		    document.getElementById("d48").style.display="block"; // La div où on va afficher la réponse   
		//3.Affichage:
			xhr.onreadystatechange=function(){
			if(xhr.readyState ==4 && xhr.status==200){ //si chargement complete && fichier mages.txt trouvé
					   document.getElementById('d48').innerHTML=xhr.responseText;}
			}		    
		// Les boutons de control(rien avoir avec AJAX)  
		  document.getElementById("bt48").style.display="inline"; 
		  document.getElementById("bt48_").style.display="inline"; 
		}
		function effacer48(){
           var box=document.getElementById("d48");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t48").value="" ; 		   
		}
		function enlever48(){
             
		   document.getElementById("d48").style.display="none"; 
		   document.getElementById("bt48").style.display="none"; 
		   document.getElementById("bt48_").style.display="none"; 
		}
// Question49
        function reponse49(){
         //1. Définition d'une instance xhr, de l'objet XMLHttpRequest
			var xhr=null;
			if(window.XMLHttpRequest){ var xhr=new XMLHttpRequest();}
			else if(window.ActiveXObject){ var xhr=new ActiveXObject("Microsft.XMLHTTP");}
			else { "Votre navigateur est incompatible avec AJAX..."}
		//2.Requête client vers le SERVEUR web
			xhr.open("GET","fichiersTexte/reponse0.49.txt",true);// OUVRIR UNE URL
			xhr.send(null);                  // ENVOYER LA REQUETTE
		    document.getElementById("d49").style.display="block"; // La div où on va afficher la réponse   
		//3.Affichage:
			xhr.onreadystatechange=function(){
			if(xhr.readyState ==4 && xhr.status==200){ //si chargement complete && fichier mages.txt trouvé
					   document.getElementById('d49').innerHTML=xhr.responseText;}
			}		    
		// Les boutons de control(rien avoir avec AJAX)  
		  document.getElementById("bt49").style.display="inline"; 
		  document.getElementById("bt49_").style.display="inline"; 
		}
		function effacer49(){
           var box=document.getElementById("d47");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t49").value="" ; 		   
		}
		function enlever49(){
             
		   document.getElementById("d49").style.display="none"; 
		   document.getElementById("bt49").style.display="none"; 
		   document.getElementById("bt49_").style.display="none"; 
		}
// Question50
        function reponse50(){
         //1. Définition d'une instance xhr, de l'objet XMLHttpRequest
			var xhr=null;
			if(window.XMLHttpRequest){ var xhr=new XMLHttpRequest();}
			else if(window.ActiveXObject){ var xhr=new ActiveXObject("Microsft.XMLHTTP");}
			else { "Votre navigateur est incompatible avec AJAX..."}
		//2.Requête client vers le SERVEUR web
			xhr.open("GET","fichiersTexte/reponse0.50.txt",true);// OUVRIR UNE URL
			xhr.send(null);                  // ENVOYER LA REQUETTE
		    document.getElementById("d50").style.display="block"; // La div où on va afficher la réponse   
		//3.Affichage:
			xhr.onreadystatechange=function(){
			if(xhr.readyState ==4 && xhr.status==200){ //si chargement complete && fichier mages.txt trouvé
					   document.getElementById('d50').innerHTML=xhr.responseText;}
			}		    
		// Les boutons de control(rien avoir avec AJAX)  
		  document.getElementById("bt50").style.display="inline"; 
		  document.getElementById("bt50_").style.display="inline"; 
		}
		function effacer50(){
           var box=document.getElementById("d50");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t50").value="" ; 		   
		}
		function enlever50(){
             
		   document.getElementById("d50").style.display="none"; 
		   document.getElementById("bt50").style.display="none"; 
		   document.getElementById("bt50_").style.display="none"; 
		}
// Question51
        function reponse51(){
         //1. Définition d'une instance xhr, de l'objet XMLHttpRequest
			var xhr=null;
			if(window.XMLHttpRequest){ var xhr=new XMLHttpRequest();}
			else if(window.ActiveXObject){ var xhr=new ActiveXObject("Microsft.XMLHTTP");}
			else { "Votre navigateur est incompatible avec AJAX..."}
		//2.Requête client vers le SERVEUR web
			xhr.open("GET","fichiersTexte/reponse0.51.txt",true);// OUVRIR UNE URL
			xhr.send(null);                  // ENVOYER LA REQUETTE
		    document.getElementById("d51").style.display="block"; // La div où on va afficher la réponse   
		//3.Affichage:
			xhr.onreadystatechange=function(){
			if(xhr.readyState ==4 && xhr.status==200){ //si chargement complete && fichier mages.txt trouvé
					   document.getElementById('d51').innerHTML=xhr.responseText;}
			}		    
		// Les boutons de control(rien avoir avec AJAX)  
		  document.getElementById("bt51").style.display="inline"; 
		  document.getElementById("bt51_").style.display="inline"; 
		}
		function effacer51(){
           var box=document.getElementById("d51");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t51").value="" ; 		   
		}
		function enlever51(){
             
		   document.getElementById("d51").style.display="none"; 
		   document.getElementById("bt51").style.display="none"; 
		   document.getElementById("bt51_").style.display="none"; 
		}

// Question1

        function reponse1(){
         //1. Définition d'une instance xhr, de l'objet XMLHttpRequest
			var xhr=null;
			if(window.XMLHttpRequest){ var xhr=new XMLHttpRequest();}
			else if(window.ActiveXObject){ var xhr=new ActiveXObject("Microsft.XMLHTTP");}
			else { "Votre navigateur est incompatible avec AJAX..."}
		//2.Requête client vers le SERVEUR web
			xhr.open("GET","fichiersTexte/reponse0.1.txt",true);// OUVRIR UNE URL
			xhr.send(null);                  // ENVOYER LA REQUETTE
		
		  //var R1=document.getElementById("R1").textContent; // le paragraphe qui contient la reponse  
          //document.getElementById("out1").innerHTML=R1;
		  document.getElementById("out1").style.display="block"; // La div où on va afficher la réponse 
		  
		//3.Affichage: 45           Utilisation de xhr pour l'affichage(côté CLIENT) de la réponse du SERVEUR
			xhr.onreadystatechange=function(){
			if(xhr.readyState ==4 && xhr.status==200){ //si chargement complete && fichier mages.txt trouvé
					   document.getElementById('out1').innerHTML=xhr.responseText;}
			}		    
		// Les boutons de control(rien avoir avec AJAX)  
		  document.getElementById("bt1").style.display="inline"; 
		  document.getElementById("bt1_").style.display="inline"; 
		}
		
		function effacer1(){
           var box=document.getElementById("out1");    
		   box.removeChild(box.childNodes[0]) ; 
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t1").value="" ; 
		}
		function enlever1(){
           var box=document.getElementById("out1");    
		   document.getElementById("out1").style.display="none"; 
		   document.getElementById("bt1").style.display="none"; 
		   document.getElementById("bt1_").style.display="none"; 
		}
// Question2

        function reponse2(){
         //1. Définition d'une instance xhr, de l'objet XMLHttpRequest
			var xhr=null;
			if(window.XMLHttpRequest){ var xhr=new XMLHttpRequest();}
			else if(window.ActiveXObject){ var xhr=new ActiveXObject("Microsft.XMLHTTP");}
			else { "Votre navigateur est incompatible avec AJAX..."}
		//2.Requête client vers le SERVEUR web
			xhr.open("GET","fichiersTexte/reponse0.2.txt",true);// OUVRIR UNE URL
			xhr.send(null);                  // ENVOYER LA REQUETTE
		
		  //var R1=document.getElementById("R1").textContent; // le paragraphe qui contient la reponse  
          //document.getElementById("out1").innerHTML=R1;
		  document.getElementById("d2").style.display="block"; // La div où on va afficher la réponse 
		  
		//3.Affichage: 45           Utilisation de xhr pour l'affichage(côté CLIENT) de la réponse du SERVEUR
			xhr.onreadystatechange=function(){
			if(xhr.readyState ==4 && xhr.status==200){ //si chargement complete && fichier mages.txt trouvé
					   document.getElementById('d2').innerHTML=xhr.responseText;}
			}		    
		// Les boutons de control(rien avoir avec AJAX)  
		  document.getElementById("bt2").style.display="inline"; 
		  document.getElementById("bt2_").style.display="inline"; 
		}
		
		function effacer2(){
           var box=document.getElementById("d2");    
		   box.removeChild(box.childNodes[0]) ; 
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t2").value="" ; 
		}
		function enlever2(){
           var box=document.getElementById("d2");    
		   document.getElementById("d2").style.display="none"; 
		   document.getElementById("bt2").style.display="none"; 
		   document.getElementById("bt2_").style.display="none"; 
		}

// Question3		
		function reponse3(){  
		  var R3=document.getElementById("R3").textContent;
          document.getElementById("d3").style.display="block";  
		  document.getElementById("d3").innerHTML=R3;
		  document.getElementById("bt3").style.display="inline"; 
		  document.getElementById("bt3_").style.display="inline"; 
		  
		}
		function effacer3(){
           var box=document.getElementById("d3");    
		   box.removeChild(box.childNodes[0]) ;
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t3").value="" ; 		   
		}
		function enlever3(){
               
		   document.getElementById("d3").style.display="none"; 
		   document.getElementById("bt3").style.display="none"; 
		   document.getElementById("bt3_").style.display="none"; 
		}
		
//Question4		
		function reponse4(){  
		  var R4=document.getElementById("R4").textContent;
          document.getElementById("d4").style.display="block";  
		  document.getElementById("d4").innerHTML=R4;
		  document.getElementById("bt4").style.display="inline"; 
		  document.getElementById("bt4_").style.display="inline"; 
		  
		}
		function effacer4(){
           var box=document.getElementById("d4");    
		   box.removeChild(box.childNodes[0]) ; 
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t4").value="" ; 
		}
		function enlever4(){
           //var box=document.getElementById("d4");    
		   document.getElementById("d4").style.display="none"; 
		   document.getElementById("bt4").style.display="none"; 
		   document.getElementById("bt4_").style.display="none"; 
		   
		}
//Question5		
		function reponse5(){  
		  var R5=document.getElementById("R5").textContent;
          document.getElementById("d5").style.display="block";  
		  document.getElementById("d5").innerHTML=R5;
		  document.getElementById("bt5").style.display="inline"; 
		  document.getElementById("bt5_").style.display="inline"; 
		  
		}
		function effacer5(){
           var box=document.getElementById("d5");    
		   box.removeChild(box.childNodes[0]) ; 
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t5").value="" ; 
		}
		function enlever5(){
           //var box=document.getElementById("d5");    
		   document.getElementById("d5").style.display="none"; 
		   document.getElementById("bt5").style.display="none"; 
		   document.getElementById("bt5_").style.display="none"; 
		}
//Question6	
        function reponse6(){
         //1. Définition d'une instance xhr, de l'objet XMLHttpRequest
			var xhr=null;
			if(window.XMLHttpRequest){ var xhr=new XMLHttpRequest();}
			else if(window.ActiveXObject){ var xhr=new ActiveXObject("Microsft.XMLHTTP");}
			else { "Votre navigateur est incompatible avec AJAX..."}
		//2.Requête client vers le SERVEUR web
			xhr.open("GET","fichiersTexte/reponse0.6.txt",true);// OUVRIR UNE URL
			xhr.send(null);                  // ENVOYER LA REQUETTE
		    document.getElementById("d6").style.display="block"; // La div où on va afficher la réponse 
		  
		//3.Affichage:            Utilisation de xhr pour l'affichage(côté CLIENT) de la réponse du SERVEUR
			xhr.onreadystatechange=function(){
			if(xhr.readyState ==4 && xhr.status==200){ //si chargement complete && fichier mages.txt trouvé
					   document.getElementById('d6').innerHTML=xhr.responseText;}
			}		    
		// Les boutons de control(rien avoir avec AJAX)  
		  document.getElementById("bt6").style.display="inline"; 
		  document.getElementById("bt6_").style.display="inline"; 
		}	

		function effacer6(){
           var box=document.getElementById("d6");    
		   box.removeChild(box.childNodes[0]) ; 
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t6").value="" ; 
		}
		function enlever6(){
           //var box=document.getElementById("d6");    
		   document.getElementById("d6").style.display="none"; 
		   document.getElementById("bt6").style.display="none"; 
		   document.getElementById("bt6_").style.display="none"; 
		}
//Question7		
		function reponse7(){  
		  var R7=document.getElementById("R7").textContent;
          document.getElementById("d7").style.display="block";  
		  document.getElementById("d7").innerHTML=R7;
		  document.getElementById("bt7").style.display="inline"; 
		  document.getElementById("bt7_").style.display="inline"; 
		  
		}
		function effacer7(){
           var box=document.getElementById("d7");    
		   box.removeChild(box.childNodes[0]) ; 
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t7").value="" ; 
		}
		function enlever7(){
           //var box=document.getElementById("d7");    
		   document.getElementById("d7").style.display="none"; 
		   document.getElementById("bt7").style.display="none"; 
		   document.getElementById("bt7_").style.display="none"; 
		}
		
// Question8

        function reponse8(){
         //1. Définition d'une instance xhr, de l'objet XMLHttpRequest
			var xhr=null;
			if(window.XMLHttpRequest){ var xhr=new XMLHttpRequest();}
			else if(window.ActiveXObject){ var xhr=new ActiveXObject("Microsft.XMLHTTP");}
			else { "Votre navigateur est incompatible avec AJAX..."}
		//2.Requête client vers le SERVEUR web
			xhr.open("GET","fichiersTexte/reponse8.txt",true);// OUVRIR UNE URL
			xhr.send(null);                  // ENVOYER LA REQUETTE
		

		  document.getElementById("d8").style.display="block"; // La div où on va afficher la réponse 
		  
		//3.Affichage: 45           Utilisation de xhr pour l'affichage(côté CLIENT) de la réponse du SERVEUR
			xhr.onreadystatechange=function(){
			if(xhr.readyState ==4 && xhr.status==200){ //si chargement complete && fichier mages.txt trouvé
					   document.getElementById('d8').innerHTML=xhr.responseText;}
			}		    
		// Les boutons de control(rien avoir avec AJAX)  
		  document.getElementById("bt8").style.display="inline"; 
		  document.getElementById("bt8_").style.display="inline"; 
		}
		
		function effacer8(){
           var box=document.getElementById("d8");    
		   box.removeChild(box.childNodes[0]) ; 
		   //Effacer aussi le contenu du textarea
		   document.getElementById("t8").value="" ; 
		}
		function enlever8(){
           //var box=document.getElementById("d8");    
		   document.getElementById("d8").style.display="none"; 
		   document.getElementById("bt8").style.display="none"; 
		   document.getElementById("bt8_").style.display="none"; 
		}
		