
<?php
// NOUS SOMMES CÔTE SERVEUR
session_start();
//Défintion des varibles: ATTENTION "  LE FAIRE TOUJOURS AVANT LA CONNEXION"
if(isset($_GET['pr'])) $pr=$_GET['pr'];// le moi
//if(isset($_GET['moiha'])) $moiha=$_GET['moiha'];

$pr=ltrim($pr);// Voilà la solution MASHA ALLAH. Un espace s'est glissé en début de chaîne, il fallait le supprimer
//$moiha=ltrim($moiha);


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
  $_GET['moiha'] = stripslashes($_GET['moiha']); 
}
$_SESSION['pref']=$pr; // Pour pouvoir afficher la colonne "Imprimer" dans le panel  "yivawo"  tjrs dans la mm prefecture

//1.Connexion
//include("connection_PDO.php");
	try{
		 $conn = new PDO('mysql:host=localhost;dbname=etatcivil;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}// Le array active les exception PDO: pour obtenir + de détail sur d'eventuels erreurs
	
	catch(Exception $e){
		die('Erreur de connexion à la base de données: '.$e->getMessage());
	}


//2.Requête: c là que ça s'passe


//??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
//$requete='SELECT * FROM passport WHERE (dossier_expedie="'.$pr.'" AND passeport_arrive !="Retours" AND passeport_livre !="Distribué" ) OR (passeport_arrive="'.$pr.'" AND passeport_livre !="Distribué")  ';// LE PROBLEME EST Là .Pourquoi Mysql ne voit pas la variable $p?Résolu 3 jours de galère mais résolu: supprimer l'espace en début de chaîne:$pr=ltrim($pr); ?????????????
$requete='SELECT * FROM caisse WHERE mois="'.$pr.'"  ORDER BY date DESC' ;// WHERE (mois="'.$pr.'")  AND (mois LIKE "'.$pr.'%")';
//???????????????????????????????La connaissance vient de l'expérience.Le reste n'est que information???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????

$reponse = $conn->query($requete) or die(mysq_error()) ;//Stockage de la requête dans une variable tampon

   //calcul du DEBIT
	$debit=0;
	$requete_D='SELECT SUM(debit) FROM caisse WHERE mois="'.$pr.'"' ;				
	$reponse_D = $conn->query($requete_D) ;//Stockage de la requête dans une variable tampon
	while($ligneD = $reponse_D->fetch()){

		$debit=$ligneD["SUM(debit)"];
		$_SESSION["total_debit"]=$debit;						
	}
	//calcul du CREDIT
	$credit=0;			
	$requete_C='SELECT SUM(credit) FROM caisse  WHERE mois="'.$pr.'"' ;				
	$reponse_C = $conn->query($requete_C) ;//Stockage de la requête dans une variable tampon
	while($ligneC = $reponse_C->fetch()){

		$credit=$ligneC["SUM(credit)"];
		$_SESSION["total_credit"]=$credit;				
	}
	
	  $solde =$credit - $debit ;
	 		




//3.Affichage

//3.1 On construit une table d'affichage
				$table='<table >'; 
				$table.='<tr  ><th style="border-radius:4px;">DATE</th><th style="border-radius:4px;">PIECE</th><th style="border-radius:4px;"> IMPUTATION </th><th colspan="4" style="border-radius:4px;">LIBELLE  </th><th style="border-radius:4px;">DEBIT </th><th style="border-radius:4px;">CREDIT</th><th style="border-radius:4px;">SOLDE</th><tr>';
				while($ligne = $reponse->fetch()){// en utlisant FOREACH ça marche pas .j'sais pas pourquoi
				 $table.='<tr><td>'.$ligne["date"].'</td><td>'.$ligne["piece"].'</td><td>'.$ligne["imputation"].'</td><td style="border-radius:0px;">'.$ligne["libelle"].'</td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td>'.$ligne["debit"].'</td><td >'.$ligne["credit"].'</td></tr>';               
				 //$table.='<tr><td>'.$ligne["nom_demandeur"].'</td><td>'.$ligne["prenom_demandeur"].'</td><td>'.$ligne["dossier_expedie"].'</td><td>'.$ligne["passeport_arrive"].'</td><td>'.$ligne["passeport_livre"].'</td><td>'.$ligne["observation"].'</td><td>'.$ligne["montant"].'</td><td>'.$ligne["date_export"].'</td> <td> <a href="modif_passport.php? n='.$ligne["idPassport"].'  &  nom_='.$ligne["nom_demandeur"].'   &  prenom_='.$ligne["prenom_demandeur"].'   &   montant_='.$ligne["montant"].' &  observation_='.$ligne["observation"].'&  envoi_='.$ligne["dossier_expedie"].'&  retour_='.$ligne["passeport_arrive"].'&  distribue_='.$ligne["passeport_livre"].'&  lot_='.$ligne["lot"].'&  date_export_='.$ligne["date_export"].' ">Modifier</a> </td></tr>';               
				  $_SESSION["mois"] =$ligne["mois"];
				 }
			     $table.='<tr><td style="border-radius:0px; Font-Weight: Bold; color:green;">TOTAL :</td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td colspan="4" style="border-radius:0px;"></td><td style="border-radius:0px;color:red; Font-Weight: Bold;">-'.$debit.' €</td><td style="border-radius:0px; color:green; Font-Weight: Bold;">+'.$credit.' €</td></tr>';
				 $table.='<tr><td></td><td></td><td></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td></td><td></td></tr>'; 
				 $table.='<tr><td></td><td></td><td></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td></td><td></td></tr>'; 
				 $table.='<tr><td></td><td></td><td></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td></td><td></td></tr>'; 
				 $table.='<tr><td></td><td></td><td></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td></td><td></td></tr>'; 
				 $table.='<tr><td></td><td></td><td></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td></td><td></td></tr>'; 
				 $table.='<tr><td></td><td></td><td></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td></td><td></td></tr>'; 
				 $table.='<tr><td></td><td></td><td></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td></td><td></td></tr>'; 
			     //$table.='<tr><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td></tr>';
				 $table.='<tr><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td colspan="4" style="border-radius:0px;"></td><td style="border-radius:0px;"></td><td style="border-radius:0px;">'.$_SESSION["mois"].'</td><td style="color:green; text-size:32px;Font-Weight: Bold;">'.$solde.' €</td></tr>';
			    
				//$table.='<tr><td></td><td></td><td>  </td><td>  </td><td> </td><td><span style="color:green;  font-size: 17px; font-style: bold;" >TOTAL :</span> </td><td><span style="color:green;  font-size: 17px; font-style: bold;" >'.$somme.'€</span> </td><td> </td> <td> </td> <tr>'; 
				$table.='</table>';
//3.2 on vide $pr et on libere la memoir occupée par cet "interrogation serveur"
//unset($pr);

//$reponse->closeCursor(); // mysql_close(); i parait que ça sert à rien puisque MySQL le fait tout seul
//3.3 On affiche le résultat

       //echo $table;
	   echo " <br><b>La saisie est enregistrée ci-dessous : </b><br><br>";
	   $_SESSION["table_caisse"]= $table;
        echo $_SESSION["table_caisse"];
//$reponse->closeCursor();



	
	unset($pr);
	$reponse->closeCursor();
	$reponse_D->closeCursor();
	$reponse_C->closeCursor();


?>


