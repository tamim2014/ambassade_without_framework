<style>
table,tr,th,td {border-radius:1px; }
table tr#th_noir th {background:black; }
/*impossible de mettre un border sur la table.pourquoi? */
body table tr#border_ td {border:1px; border-color:black;  }
		
		 table tr#border_ :nth-child(2n+2) td {
				color:Peru ;
				background: silver;
				border-radius:4px;
				-webkit-border-radius:4px;
				-moz-border-radius:4px;
                -khtml-border-radius:4px;
		 }
		 
		 
		table.color_line_middle tr#border_:nth-child(2n+1) td {
				color:Peru ;
				background:silver;
				-webkit-border-radius:1px;
        }
		
/*************************** pour voir la structure de mes interfaces************************		
table {
 border-width:1px; 
 border-style:solid; 
 border-color:black;
  width:50%;
 
 }
td { 
 border-width:1px;
 border-style:solid; 
 border-color:red;
  width:50%;
  padding:0px;
   height:5px;/* impossible de reduire la tailles des cellules. Pourquoi? il le faut car la table doit tenir 30 jours en une page (comme le fait  Excel)*/
  
 }
 
 *******************************************************************************************/
.borer__  { 
 border-width:1px;
 border-style:solid; 
 border-color:red;
  width:50%;
 
}
 
</style>
<?php
// NOUS SOMMES CÔTE SERVEUR
session_start();
//Défintion des varibles: ATTENTION "  LE FAIRE TOUJOURS AVANT LA CONNEXION"
$pr=$_GET['pr'];

$pr=ltrim($pr);// Voilà la solution MASHA ALLAH. Un espace s'est glissé en début de chaîne, il fallait le supprimer
//$pr=rtrim($pr);// pour supprimer un eventuel espace en fin de chaîne

/**************** A RETENIR *********
* Exemple:
*   $_SESSION["envoi"]; OK
*   $_SESSION['envoi']; KO
* 
***********************************/
$_SESSION["envoi"]=$pr;//pour le calcul de la somme envoi (lectureBD.php)
$_SESSION["retour"]=$pr;//pour le calcul de la somme retour (lectureBD.php)

	
//On enleve lechappement si get_magic_quotes_gpc est active
if(get_magic_quotes_gpc())
{
	
	$_GET['pr'] = stripslashes($_GET['pr']);

}
$_SESSION['pref']=$pr; // Pour pouvoir afficher la colonne "Imprimer" dans le panel  "yivawo"  tjrs dans la mm prefecture

//1.Connexion
include("connection_PDO.php");
//2.Requête: c là que ça s'passe


//??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
//$requete='SELECT * FROM passport WHERE (dossier_expedie="'.$pr.'" AND passeport_arrive !="Retours" AND passeport_livre !="Distribué" ) OR (passeport_arrive="'.$pr.'" AND passeport_livre !="Distribué")  ';// LE PROBLEME EST Là .Pourquoi Mysql ne voit pas la variable $p?Résolu 3 jours de galère mais résolu: supprimer l'espace en début de chaîne:$pr=ltrim($pr); ?????????????
  $requete='SELECT * FROM recette_legalisation WHERE mois="'.$pr.'"';
 //$requete='SELECT * FROM recette_legalisation WHERE nbre_legalisation NOT IN ("")';// affiche seulement les legalisation
//???????????????????????????????La connaissance vient de l'expérience.Le reste n'est que information???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
$reponse = $conn->query($requete) or die(mysq_error()) ;//Stockage de la requête dans une variable tampon

    //calcul nombre de legalisation
	$nombre_leg=null;
	$requete_nombre_leg='SELECT SUM(nbre_leg) FROM recette_legalisation WHERE mois="'.$pr.'"';				
	$reponse_nombre_leg = $conn->query($requete_nombre_leg) ;//Stockage de la requête dans une variable tampon
	while($ligne_nombre_leg = $reponse_nombre_leg->fetch()){

		$nombre_leg=$ligne_nombre_leg["SUM(nbre_leg)"];
		$_SESSION["nombre_leg"]=$nombre_leg;						
	}

   //calcul montant legalisation
    $montant_leg=$nombre_leg*15;
	$_SESSION["mtant_leg"]=$montant_leg;						
	
	
	//$requete_montant_leg='SELECT SUM(mtant_leg) FROM passport WHERE (dossier_expedie="'.$_SESSION["envoi"].'" AND passeport_arrive !="Retours" AND passeport_livre !="Distribué" ) ';				
	/**********************************************************************************************************
	$montant_leg=0;
	$requete_montant_leg='SELECT SUM(nbre_leg) FROM recette_legalisation  ';				
	$reponse_montant_leg = $conn->query($requete_montant_leg) ;
	while($ligne_montant_leg = $reponse_montant_leg->fetch()){

		$montant_leg=$ligne_montant_leg["SUM(nbre_leg)"]*15;
		$_SESSION["montant_leg"]=$montant_leg;						
	}
	***********************************************************************************************************/
	//calcul nombre concordance
	$nombre_concord=0;
	//$requete5='SELECT SUM(montant) FROM passport WHERE (passeport_arrive="'.$_SESSION["retour"].'" AND passeport_livre !="Distribué")   ';				
	$requete_nombre_concord='SELECT SUM(nbre_concord) FROM recette_legalisation  WHERE mois="'.$pr.'"';
	$reponse_nombre_concord = $conn->query($requete_nombre_concord) ;//Stockage de la requête dans une variable tampon
	while($ligne_nombre_concord = $reponse_nombre_concord->fetch()){

		$nombre_concord=$ligne_nombre_concord["SUM(nbre_concord)"];
		$_SESSION["_nombre_concord"]=$nombre_concord;
	    				
	}
	//if(!empty($total4)){ $somme=$_SESSION["total_envoi"];}
	//else  if(!empty($total5)) { $somme=$_SESSION["total_retour"];}
	
	//calcul montant concordance
	$montant_concord=$nombre_concord*15;
	$_SESSION["mtant_leg"]=$montant_concord;
	
	//calcul nombre coutume
	$nombre_coutume=0;
	//$requete5='SELECT SUM(montant) FROM passport WHERE (passeport_arrive="'.$_SESSION["retour"].'" AND passeport_livre !="Distribué")   ';				
	$requete_nombre_coutume='SELECT SUM(nbre_coutume) FROM recette_legalisation  WHERE mois="'.$pr.'"';
	$reponse_nombre_coutume = $conn->query($requete_nombre_coutume) ;//Stockage de la requête dans une variable tampon
	while($ligne_nombre_coutume = $reponse_nombre_coutume->fetch()){

		$nombre_coutume=$ligne_nombre_coutume["SUM(nbre_coutume)"];
		$_SESSION["_nombre_concord"]=$nombre_concord;
	    				
	}
	//calcul montant coutume
	$montant_coutume=$nombre_coutume*20;
	$_SESSION["mtant_coutume"]=$montant_coutume;
	
	//calcul nombre celibat
	$nombre_celibat=0;
	//$requete5='SELECT SUM(montant) FROM passport WHERE (passeport_arrive="'.$_SESSION["retour"].'" AND passeport_livre !="Distribué")   ';				
	$requete_nombre_celibat='SELECT SUM(nbre_celibat) FROM recette_legalisation  WHERE mois="'.$pr.'"';
	$reponse_nombre_celibat = $conn->query($requete_nombre_celibat) ;//Stockage de la requête dans une variable tampon
	while($ligne_nombre_celibat = $reponse_nombre_celibat->fetch()){

		$nombre_celibat=$ligne_nombre_celibat["SUM(nbre_celibat)"];
		$_SESSION["_nombre_celibat"]=$nombre_celibat;
	    				
	}
	//calcul montant celibat
	$montant_celibat=$nombre_celibat*20;
	$_SESSION["mtant_celibat"]=$montant_celibat;
	
	//calcul nombre sc
	$nombre_sc=0;
	//$requete5='SELECT SUM(montant) FROM passport WHERE (passeport_arrive="'.$_SESSION["retour"].'" AND passeport_livre !="Distribué")   ';				
	$requete_nombre_sc='SELECT SUM(nbre_sc) FROM recette_legalisation   WHERE mois="'.$pr.'"';//ORDER BY date("d") ASC';
	$reponse_nombre_sc = $conn->query($requete_nombre_sc) ;//Stockage de la requête dans une variable tampon
	while($ligne_nombre_sc = $reponse_nombre_sc->fetch()){

		$nombre_sc=$ligne_nombre_sc["SUM(nbre_sc)"];
		$_SESSION["_nombre_sc"]=$nombre_sc;
	    				
	}
	//calcul montant sc
	$montant_sc=$nombre_sc*30;
	$_SESSION["mtant_sc"]=$montant_sc;
	
	//calcul nombre pp
	$nombre_pp=0;
	//$requete5='SELECT SUM(montant) FROM passport WHERE (passeport_arrive="'.$_SESSION["retour"].'" AND passeport_livre !="Distribué")   ';				
	$requete_nombre_pp='SELECT SUM(nbre_pp) FROM recette_legalisation  WHERE mois="'.$pr.'"';
	$reponse_nombre_pp = $conn->query($requete_nombre_pp) ;//Stockage de la requête dans une variable tampon
	while($ligne_nombre_pp = $reponse_nombre_pp->fetch()){

		$nombre_pp=$ligne_nombre_pp["SUM(nbre_pp)"];
		$_SESSION["_nombre_pp"]=$nombre_pp;
	    				
	}
	//calcul montant pp
	$montant_pp=$nombre_pp*30;
	$_SESSION["mtant_pp"]=$montant_pp;
	
	
	//calcul nombre depot
	$nombre_depot=0;
	//$requete5='SELECT SUM(montant) FROM passport WHERE (passeport_arrive="'.$_SESSION["retour"].'" AND passeport_livre !="Distribué")   ';				
	$requete_nombre_depot='SELECT SUM(nbre_depot) FROM recette_legalisation  WHERE mois="'.$pr.'"';
	$reponse_nombre_depot = $conn->query($requete_nombre_depot) ;//Stockage de la requête dans une variable tampon
	while($ligne_nombre_depot = $reponse_nombre_depot->fetch()){
		$nombre_depot=$ligne_nombre_depot["SUM(nbre_depot)"];
		$_SESSION["_nombre_depot"]=$nombre_depot;	    				
	}
	//calcul montant depot
	$montant_depot=$nombre_depot*5;
	$_SESSION["mtant_depot"]=$montant_depot;
	
	//calcul nombre lp
	$nombre_lp=0;
	//$requete5='SELECT SUM(montant) FROM passport WHERE (passeport_arrive="'.$_SESSION["retour"].'" AND passeport_livre !="Distribué")   ';				
	$requete_nombre_lp='SELECT SUM(nbre_lp) FROM recette_legalisation  WHERE mois="'.$pr.'"';
	$reponse_nombre_lp = $conn->query($requete_nombre_lp) ;//Stockage de la requête dans une variable tampon
	while($ligne_nombre_lp = $reponse_nombre_lp->fetch()){
		$nombre_lp=$ligne_nombre_lp["SUM(nbre_lp)"];
		$_SESSION["_nombre_lp"]=$nombre_lp;	    				
	}
	//calcul montant lp
	$montant_lp=$nombre_lp*30;
	$_SESSION["mtant_lp"]=$montant_lp;
	// $
	$total = $montant_leg + $montant_concord + $montant_coutume + $montant_celibat + $montant_sc + $montant_pp + $montant_depot + $montant_lp ;
	$total_doc = $nombre_leg + $nombre_concord + $nombre_coutume + $nombre_celibat + $nombre_sc + $nombre_pp + $nombre_depot + $nombre_lp ;
	
	

	
	
//3.Affichage

//3.1 On construit une table d'affichage
				$table='<table >'; 
				$table.='<tr id="th_noir" ><th></th><th colspan="2">Légalisations</th><th colspan="2">Concordance</th><th colspan="2">Coutume</th><th colspan="2">Celibat</th><th colspan="2">SC</th><th colspan="2">PP</th><th colspan="2">Dépôt&Ren</th> <th colspan="2">LP </th> <th >Montant</th><th></th><th>Nbre</th> <tr>';
				$table.='<tr><td style="background:black; color:white;">Date</td><td style="background:red; color:white; ">Nbre</td><td style="background:red; color:white;">Mtant</td><th style="background:red;">Nbre</th><td style="background:red; color:white;">Mtant</td><th style="background:red;">Nbre</th><td style="background:red;color:white;">Mtant</td><th style="background:red;">Nbre</th><td style="background:red; color:white;">Mtant</td><th style="background:red;">Nbre</th><td style="background:red; color:white;">Mtant</td><th style="background:red;">Nbre</th><td style="background:red; color:white;">Mtant</td><th style="background:red;">Nbre</th><td style="background:red;color:white;">Mtant</td> <th style="background:red;">Nbre </th><td style="background:red;color:white;">Mtant</td> <th style="background:black;">total </th><th style="background:black;">Observation </th><th style="background:black;">total doc</th> <tr>';
				while($ligne = $reponse->fetch()){// en utlisant FOREACH ça marche pas .j'sais pas pourquoi
				 //$table.='<tr><td>'.$ligne["nom_demandeur"].'</td><td>'.$ligne["prenom_demandeur"].'</td><td>'.$ligne["dossier_expedie"].'</td><td>'.$ligne["passeport_arrive"].'</td><td>'.$ligne["passeport_livre"].'</td><td>'.$ligne["observation"].'</td><td>'.$ligne["montant"].'</td><td>'.$ligne["date_export"].'</td> <td> <a href="modif_passport.php? n='.$ligne["idPassport"].'  &  nom_='.$ligne["nom_demandeur"].'   &  prenom_='.$ligne["prenom_demandeur"].'   &   montant_='.$ligne["montant"].' &  observation_='.$ligne["observation"].'&  envoi_='.$ligne["dossier_expedie"].'&  retour_='.$ligne["passeport_arrive"].'&  distribue_='.$ligne["passeport_livre"].'&  lot_='.$ligne["lot"].'&  date_export_='.$ligne["date_export"].' ">Modifier</a> </td></tr>';
				 		// D'abord on ré-écrit la date au format français
				   		$date=$ligne["date"];
						$a_date = explode("-", $date); //découpage de la date selon les -
						$date = $a_date[2]."/".$a_date[1]."/".$a_date[0]; //Construction de la date au format jour/mois/annee
				 
				 // attention: ne pas factoriser car c pas les bons coeficient
				 $total_item_montant= $ligne["nbre_leg"]*15 + $ligne["nbre_concord"]*15 + $ligne["nbre_coutume"]*20 + $ligne["nbre_celibat"]*20 + $ligne["nbre_sc"]*30 + $ligne["nbre_pp"]*30 + $ligne["nbre_depot"]*5 + $ligne["nbre_lp"]*30 ;
				 $total_item_doc= $ligne["nbre_leg"] + $ligne["nbre_concord"] + $ligne["nbre_coutume"] + $ligne["nbre_celibat"] + $ligne["nbre_sc"] + $ligne["nbre_pp"] + $ligne["nbre_depot"] + $ligne["nbre_lp"] ;
				 $table.='<tr style="border:1px solid black; "><td style="border:5px solid black; ">'.$date.'</td><td style="background:yellow; border:1px solid black; ">'.$ligne["nbre_leg"].'</td><td style="border:1px solid black;" >'.$ligne["nbre_leg"]*15 .'</td><td style="background:yellow; border:1px solid black;">'.$ligne["nbre_concord"].'</td><td style="border:1px solid black;">'.$ligne["nbre_concord"]*15 .'</td><td style="background:yellow; border:1px solid black;">'.$ligne["nbre_coutume"].'</td><td style="border:1px solid black;" >'.$ligne["nbre_coutume"]*20 .'</td><td style="border:1px solid black;">'.$ligne["nbre_celibat"].'</td><td style="border:1px solid black;">'.$ligne["nbre_celibat"]*20 .'</td><td style="border:1px solid black;">'.$ligne["nbre_sc"].'</td><td style="border:1px solid black;">'.$ligne["nbre_sc"]*30 .'</td><td style="border:1px solid black;">'.$ligne["nbre_pp"].'</td><td style="border:1px solid black;">'.$ligne["nbre_pp"]*30 .'</td><td style="border:1px solid black;">'.$ligne["nbre_depot"].'</td><td style="border:1px solid black;">'.$ligne["nbre_depot"]*5 .'</td> <td style="border:1px solid black;">'.$ligne["nbre_lp"].' </td><td style="border:1px solid black;">'.$ligne["nbre_lp"]*30 .'</td> <td style="border:5px solid black;">'.$total_item_montant.'</td><td style="border:1px solid black;"> </td><td style="border:5px solid black;">'.$total_item_doc.' </td><tr>';
				 }	
				 $table.='<tr><td style="background:green;">Total</td><td style="background:green;">'.$nombre_leg.'</td><td >'.$montant_leg.'</td><td style="background:green;">'.$nombre_concord.'</td><td >'.$montant_concord.'</td><td style="background:green;">'.$nombre_coutume.'</td><td >'.$montant_coutume.'</td><td style="background:green;" >'.$nombre_celibat.'</td><td >'.$montant_celibat.'</td><td style="background:green;">'.$nombre_sc.'</td><td >'.$montant_sc.'</td><td style="background:green;">'.$nombre_pp.'</td><td style="background:green;" >'.$montant_pp.'</td><td  style="background:green;">'.$nombre_depot.'</td><td  style="background:green;">'.$montant_depot.'</td> <td style="background:green;">'.$nombre_lp.'</td><td >'.$montant_lp.'</td> <td>-</td><td> </td><td></td> <tr>';				 
				 $table.='<tr><td style="background:red;">Total</td><td style="background:red;"></td><td style="background:red;"></td><td style="background:red;"></td><td style="background:red;"></td><td style="background:red;"></td><td style="background:red;"></td><td style="background:red;"></td><td style="background:red;"></td><td style="background:red;"></td><td style="background:red;"></td><td style="background:red;"></td><td style="background:red;"></td><td style="background:red;"></td><td style="background:red;"></td> <td style="background:red;"></td><td style="background:red;"></td> <th style=" background:white; color:red;">'.$total.'€</th><th style="background:#fffff0; color:black">'.$pr.'</th><th style="background:#fffff0; color:red">'.$total_doc.'</th> <tr>';
				//$table.='<tr><td></td><td></td><td>  </td><td>  </td><td> </td><td><span style="color:green;  font-size: 17px; font-style: bold;" >TOTAL :</span> </td><td><span style="color:green;  font-size: 17px; font-style: bold;" >'.$somme.'€</span> </td><td> </td> <td> </td> <tr>'; 
				$table.='</table>';
				
				// eliminer les zero dans les cases vides(car ça poluela vue)
				
//3.2 on vide $pr et on libere la memoir occupée par cet "interrogation serveur"
//unset($pr);

//$reponse->closeCursor(); // mysql_close(); i parait que ça sert à rien puisque MySQL le fait tout seul
//3.3 On affiche le résultat

//echo $table;
$_SESSION["table_legalisation"]= $table;
echo $_SESSION["table_legalisation"];
//$reponse->closeCursor();



	
	unset($pr);
	$reponse->closeCursor();
	$reponse_nombre_leg->closeCursor();
	$reponse_nombre_concord->closeCursor();	
	$reponse_nombre_coutume->closeCursor();
	$reponse_nombre_celibat->closeCursor();
	$reponse_nombre_sc->closeCursor();
	$reponse_nombre_pp->closeCursor();
	$reponse_nombre_depot->closeCursor();
	$reponse_nombre_lp->closeCursor();


?>


