<?php 
session_start(); 
/****************************************************************************
*
*Si clic sur menu accordeon(ces données viennent de): SERVEUR/lectureBD_afficherListePassport.php
*Si clic sur champs de recherche (ces données re-viennent de): SERVEUR/lectureBD_resultatRecherche.php
*
*
******************************************************************************/
$n=$_GET["n"];

if(isset($_GET["nom_"])) $nom_=$_GET["nom_"];
$prenom_=$_GET["prenom_"];
$montant_=$_GET["montant_"];
$observation_=$_GET["observation_"];
$envoi_=$_GET["envoi_"];//colonne dossier_expedie
$retour_=$_GET["retour_"];//colonne passeport_arrive
$distribue_=$_GET["distribue_"];// colonne passeport_livre
$lot_=$_GET["lot_"];
$date_export_=$_GET["date_export_"];
/*
if(isset($_GET["date_expedie_"]))    $date_expedie_=$_GET["date_expedie_"]; 
if(isset($_GET["date_arrive_"]))     $date_arrive_=$_GET["date_arrive_"]; 
if(isset($_GET["date_livraison_"]))  $date_livraison_=$_GET["date_livraison_"]; 
*/
$date_expedie_=$_GET["date_expedie_"]; 
$date_arrive_=$_GET["date_arrive_"]; 
$date_livraison_=$_GET["date_livraison_"]; 

$_SESSION["identif_passport"]=$n;	
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title> Passeports</title>
<meta charset="utf-8"/>
<link rel="stylesheet" href="css/style.css"/>
<link href="css/accueil.css" rel="stylesheet" title="Style" />
<link href="css/base4.css" rel="stylesheet" title="Style" />
<!--  menu accordeon -->
	<link href="menu2/css/menu.css" rel="stylesheet" title="StyleM" />
	<script src="menu2/js/jquery.js"> </script> 
	<script src="menu2/js/menu_accordeon.js"> </script>
	<script src="menu2/js/menu_ajax.js"> </script>
	<script src="js/capture_items_passeport.js"></script>
	<script src="js/capture_recherche_passeport.js"></script>
	 <script src="js/jquery.js"></script>
	<script src="js/lectureBD.js"></script>
	<script src="js/base4_menu_accordeon.js"></script>
	<script>
        function mlipva(){    
				 document.getElementById("lipva").innerHTML = "Mise à jour!";
				 //onload(modif_passport.php); 
		}
    </script>
	
	<!-- build an embossed frame for div yivawo -->
	<style> 
	    #yivawo{
			margin-bottom:4px;   
			box-shadow: 1px 1px 0px 0px #cdbe9f; 
			width:94%; 
			height:100%; 
			scrollbar:auto;
						 
			margin:auto;				  
			box-shadow:
			  0px 8px 8px 0px rgba(0, 0, 0, 0.5) inset,
			   0px 8px 8px 0px rgba(255, 255, 255, 0.5); 		 
		}
	</style>
</head>
<body>
  <div id="wrap">
    <!--  creux du haut -->
    <div id="header"   >	
	     <div  class="hollowTop"> 
		     <input type=image src=img/drapeau.png id="beramu" style="border-radius:0px;" /> 
		     <h1 class="titre" >FICHE EXPORT  </h1>
		 </div>	   	    
	</div>
	
	<div id="nav"></div>
	
	<div id="main">
	   <div id="navgauche">
	       <?php 
		   echo '
	        <form action="SERVEUR/modifier_insertionSQL.php" method="post" name="form1"  >
	            <div class="section">
			        <br>
			        <input type="text" name="nom_demandeur" value="'.$nom_.'"  >
				    <input type="text" name="prenom_demandeur"  value="'.$prenom_.'" >
				    <input type="text" name="montant"  value="'.$montant_.'" >
			    </div>
			    <div class="section">
			       <br>
			        <select title="ob" name="observation" value="'.$observation_.'" >
					    <option>Observation</option>
					    <option>PP+CNI</option>
					    <option>CNI</option>
				    </select>
				 	<select title="lot" name="lot"  value='.$lot_.'>
						<option>Lot</option>
						<option>001</option>
						<option>002</option>
						<option>003</option>
						<option>004</option>
						<option>005</option>
						<option>006</option>
						<option>007</option>
						<option>008</option>
						<option>009</option>
						<option>010</option>
				    </select>				
				    <input type="date"  name="date_export"  value="'.$date_export_.'" style=" height:18px; width:150px;"/>
			    </div>
			    <div class="section">		     
				  <label for="dossier_expedie" style="margin-left:30px; margin-top:14px;  float:left; " >Envoi</label><input type="checkbox" name="dossier_expedie"   value="'.$envoi_.'"       style="float:left; margin-top:-14px;" checked>  <input type="date" name="date_expedie"    value="'.$date_expedie_.'"   style="max-width:60px; margin-top:-18px; float:right; margin-right:35px;"   >
				  <label for="passeport_arrive" style="margin-left:30px; margin-top:0px;  float:left; ">Retour</label><input type="checkbox" name="passeport_arrive"  value="'.$retour_.'"      style="float:left; margin-top:-14px;">          <input type="date" name="date_arrive"     value="'.$date_arrive_.'"   style="max-width:60px; margin-top:-18px; float:right; margin-right:35px;" >
				  <label for="passeport_livre" style="margin-left:30px; margin-top:0px;   float:left; ">Distrb</label><input type="checkbox" name="passeport_livre"    value="'.$distribue_.'"   style="float:left; margin-top:-14px;">         <input type="date" name="date_livraison"  value="'.$date_livraison_.'"    style="max-width:60px; margin-top:-18px; float:right; margin-right:35px;" >
			    </div>
			    <div class="section">		   
					<input type="submit"  id="enregistrer" onclick="mlipva();  "  name="enregistrer" value="Enregistrer" style="background-color: #D4D7C4;  height: 30px; "    />
			    </div>
				<!-- SECTION moteur de recherche -->
				<div class="section" id="s_recherche" >		   
					<input type="button"  id="recherche"  name="" value="Chercher" style="background-color: #D4D7C4;  height: 30px; "    />
					<br><br>
					<input type="text"   id="titulaire"  name="titulaire" placeholder="Nom (ou Prénom)" style="width:150px; height:30px;" />
			    </div>
      				
			</form> 
		';
?>			
	   </div><!-- fin navgauche -->
	   
	   <!-- debut article(affichage resultat de la base de donnée) -->
	   <div id="article"> 	   
	         <div id="yivawo" style="text-align:left; " > <h1>&nbsp; Rappel de mise à jour </h1><hr><?php  echo "&nbsp;&nbsp;&nbsp;&nbsp; Modifiaction Passeport N°:....................<b>".$n."</b><br>&nbsp;&nbsp;&nbsp;&nbsp; Titulaire:.................................................<b>".$nom_." </b> <b>" .$prenom_."</b>  <br>&nbsp;&nbsp;&nbsp;&nbsp; A déjà payé:............................................<span style=\"color:red;\"><b id=\"lipva\">".$montant_."€</span></b> <br>&nbsp;&nbsp;&nbsp;&nbsp;   Le:..........................................................<b>".$date_export_."</b>  <br><br><br><br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp; Passeport envoyé le:..............................<b>".$date_expedie_."</b><br>&nbsp;&nbsp;&nbsp;&nbsp; Passeport arrivé le:...............................<b>".$date_arrive_."</b><br>&nbsp;&nbsp;&nbsp;&nbsp; Passeport distribué le:..........................<b>".$date_livraison_."</b>  " ?></div> 	   
	   </div>
	   <!-- fin article -->
	   
	   <div id="aside"  >
	       <!-- menu accordeon -->		  
		        <img src="img/menu.png" id="iconemenu" style=" z-index=4; position:fixed; top:7%; right:5.5%; " /><br>
                <img src="img/menu.png" id="imagemenu" style=" z-index=4; position:fixed; top:7%; right:5.5%; " /><br>
					    <!-- menu accordeon -->	  
				<ul class="navigation"  >	<!-- margin-top:-19.5%; pour LES GRAND ECRAN-->
					<li class="toggleSubMenu"><span>Passeports</span>
						<ul class="subMenu" style="color:silver;" >
						  <li id="envoi"><a href="#" title=""  style="color:white;" >Envois</a></li>
						  <li id="retour"><a href="#" title=""  style="color:white;" >Retours</a></li>
						  <li id="distrib_mensuel"><a href="#" title=""  style="color:white;" >Distrib(mensuel)</a></li>
						  <li id="distrib_annuel"><a href="#" title=""  style="color:white;" >Distrib(annuel)</a></li>
						  <li id="distrib_tous"><a href="#" title=""  style="color:white;" >Distributions</a></li>
						</ul>
					</li>
					<li class="toggleSubMenu"><span>Recettes Etat civil</span>
						  <ul class="subMenu" style="color:silver;" >						
							<li><a href="lectureBD_recette_legalisation.html" title="" style="color:white;">Légalisation</a></li>
						  </ul><!-- fin ul.subMenu -->
					</li>
					<li class="toggleSubMenu"><span>Caisse</span>
						  <ul class="subMenu" style="color:silver;" >						
							<li><a href="lectureBD_caisse.html" title="" style="color:white;">Journal de caisse</a></li>
						  </ul>
					</li>		
					<li><a href="#" title="">Cartes consulaires</a></li>			
				</ul>  		   
	   </div><!-- fin menu accordeon -->
	   <div class="clear"></div>
	</div>
	<div id="footer"></div>
  </div>   
</body>
</html>





