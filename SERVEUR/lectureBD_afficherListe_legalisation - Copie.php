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
//2.Requête

//??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
$requete='SELECT * FROM passport WHERE (dossier_expedie="'.$pr.'" AND passeport_arrive !="Retours" AND passeport_livre !="Distribué" ) OR (passeport_arrive="'.$pr.'" AND passeport_livre !="Distribué")  ';// LE PROBLEME EST Là .Pourquoi Mysql ne voit pas la variable $p?Résolu 3 jours de galère mais résolu: supprimer l'espace en début de chaîne:$pr=ltrim($pr); ?????????????
//???????????????????????????????La connaissance vient de l'expérience.Le reste n'est que information???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
$reponse = $conn->query($requete) or die(mysq_error()) ;//Stockage de la requête dans une variable tampon

   //calcul du total_envoi
	$total4=0;
	$requete4='SELECT SUM(montant) FROM passport WHERE (dossier_expedie="'.$_SESSION["envoi"].'" AND passeport_arrive !="Retours" AND passeport_livre !="Distribué" ) ';				
	$reponse4 = $conn->query($requete4) ;//Stockage de la requête dans une variable tampon
	while($ligne4 = $reponse4->fetch()){

		$total4=$ligne4["SUM(montant)"];
		$_SESSION["total_envoi"]=$total4;
		//if(!empty($total4)) echo "<pre> </pre> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; TOTAL:".$_SESSION["total_envoi"]."€";
				
	}
	//calcul du total_Retour
	$total5=0;
	$requete5='SELECT SUM(montant) FROM passport WHERE (passeport_arrive="'.$_SESSION["retour"].'" AND passeport_livre !="Distribué")   ';				
	$reponse5 = $conn->query($requete5) ;//Stockage de la requête dans une variable tampon
	while($ligne5 = $reponse5->fetch()){

		$total5=$ligne5["SUM(montant)"];
		$_SESSION["total_retour"]=$total5;
	    //if(!empty($total5)) echo "<pre> </pre> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; TOTAL: ".$_SESSION["total_retour"]."€";
				
	}
	if(!empty($total4)){ $somme=$_SESSION["total_envoi"];}
	else  if(!empty($total5)) { $somme=$_SESSION["total_retour"];}



//3.Affichage

//3.1 On construit une table d'affichage
				$table='<table  >'; 
				$table.='<tr id="th_noir" ><th></th><th colspan="2">Légalisations</th><th colspan="2">Concordance</th><th colspan="2">Coutume</th><th colspan="2">Celibat</th><th colspan="2">SC</th><th colspan="2">PP</th><th colspan="2">Dépôt&Ren</th> <th colspan="2">LP </th> <th >Montant</th><th></th><th>Nbre</th> <tr>';
				$table.='<tr><th style="background:black;">Date</th><th style="background:red;">Nbre</th><th style="background:red;">Mtant</th><th style="background:red;">Nbre</th><th style="background:red;">Mtant</th><th style="background:red;">Nbre</th><th style="background:red;">Mtant</th><th style="background:red;">Nbre</th><th style="background:red;">Mtant</th><th style="background:red;">Nbre</th><th style="background:red;">Mtant</th><th style="background:red;">Nbre</th><th style="background:red;">Mtant</th><th style="background:red;">Nbre</th><th style="background:red;">Mtant</th> <th style="background:red;">Nbre </th><th style="background:red;">Mtant</th> <th style="background:black;">total </th><th style="background:black;">Observation </th><th style="background:black;">total doc</th> <tr>';
				while($ligne = $reponse->fetch()){// en utlisant FOREACH ça marche pas .j'sais pas pourquoi
				 //$table.='<tr><td>'.$ligne["nom_demandeur"].'</td><td>'.$ligne["prenom_demandeur"].'</td><td>'.$ligne["dossier_expedie"].'</td><td>'.$ligne["passeport_arrive"].'</td><td>'.$ligne["passeport_livre"].'</td><td>'.$ligne["observation"].'</td><td>'.$ligne["montant"].'</td><td>'.$ligne["date_export"].'</td> <td> <a href="modif_passport.php? n='.$ligne["idPassport"].'  &  nom_='.$ligne["nom_demandeur"].'   &  prenom_='.$ligne["prenom_demandeur"].'   &   montant_='.$ligne["montant"].' &  observation_='.$ligne["observation"].'&  envoi_='.$ligne["dossier_expedie"].'&  retour_='.$ligne["passeport_arrive"].'&  distribue_='.$ligne["passeport_livre"].'&  lot_='.$ligne["lot"].'&  date_export_='.$ligne["date_export"].' ">Modifier</a> </td></tr>';
				 $table.='<tr id="border_"><td>Date</td><td style="background:yellow;">Nbre</td><td >Mtant</td><td style="background:yellow;">Nbre</td><td >Mtant</td><td style="background:yellow;">Nbre</td><td >Mtant</td><td >Nbre</td><td >Mtant</td><td >Nbre</td><td >Mtant</td><td>Nbre</td><td >Mtant</td><td >Nbre</td><td >Mtant</td> <td >Nbre </td><td >Mtant</td> <td>total </td><td>Observation </td><td>total doc</td> <tr>';
				 }
				 $table.='<tr><td style="background:green;">Total</td><td style="background:green;">Nbre</td><td >Mtant</td><td style="background:green;">Nbre</td><td >Mtant</td><td style="background:green;">Nbre</td><td >Mtant</td><td style="background:green;" >Nbre</td><td >Mtant</td><td style="background:green;">Nbre</td><td >Mtant</td><td style="background:green;">Nbre</td><td style="background:green;" >Mtant</td><td  style="background:green;">Nbre</td><td  style="background:green;">Mtant</td> <td style="background:green;">Nbre </td><td >Mtant</td> <td>total </td><td>Observation </td><td>total doc</td> <tr>';				 
				 $table.='<tr><th style="background:red;">Total</th><th style="background:red;">Nbre</th><th style="background:red;">Mtant</th><th style="background:red;">Nbre</th><th style="background:red;">Mtant</th><th style="background:red;">Nbre</th><th style="background:red;">Mtant</th><th style="background:red;">Nbre</th><th style="background:red;">Mtant</th><th style="background:red;">Nbre</th><th style="background:red;">Mtant</th><th style="background:red;">Nbre</th><th style="background:red;">Mtant</th><th style="background:red;">Nbre</th><th style="background:red;">Mtant</th> <th style="background:red;">Nbre </th><th style="background:red;">Mtant</th> <th style=" background:white; color:red;"> - </th><th style="background:#fffff0; color:black"> - </th><th style="background:#fffff0; color:red"> - </th> <tr>';
				//$table.='<tr><td></td><td></td><td>  </td><td>  </td><td> </td><td><span style="color:green;  font-size: 17px; font-style: bold;" >TOTAL :</span> </td><td><span style="color:green;  font-size: 17px; font-style: bold;" >'.$somme.'€</span> </td><td> </td> <td> </td> <tr>'; 
				$table.='</table>';
//3.2 on vide $pr et on libere la memoir occupée par cet "interrogation serveur"
//unset($pr);

//$reponse->closeCursor(); // mysql_close(); i parait que ça sert à rien puisque MySQL le fait tout seul
//3.3 On affiche le résultat

echo $table;
//$reponse->closeCursor();



	
	unset($pr);
	$reponse->closeCursor();
	$reponse4->closeCursor();
	$reponse5->closeCursor();


?>


