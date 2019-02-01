
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
 if($pr=="Distrib(annuel)"){
				$requete='SELECT * FROM passport WHERE   YEAR(date_livraison) = YEAR(NOW())  ORDER BY date_livraison ASC';				
				$reponse = $conn->query($requete) ;				
				//calcul du total_annuel
				$total=0;
				$requete3='SELECT SUM(montant) FROM passport WHERE   YEAR(date_livraison) = YEAR(NOW()) ';				
				$reponse3 = $conn->query($requete3) ;
				while($ligne3 = $reponse3->fetch()){					
					$total=$ligne3["SUM(montant)"];					
				}
				//3.Affichage
				//3.1 On construit une table d'affichage
				$table='<table >'; 
				$table.='<tr><th>NOM</th><th>PRENOM</th><th> ENVOI </th><th>RETOUR  </th><th>DISTRIBUTION </th><th>OBSERVATION</th><th> € </th><th>DATE </th>  <tr>';
				while($ligne = $reponse->fetch()){// en utlisant FOREACH ça marche pas .j'sais pas pourquoi
				 	    // D'abord on ré-écrit la date au format français
				   		$date=$ligne["date_livraison"];
						 $a_date = explode("-", $date); //découpage de la date selon les -
						 $date = $a_date[2]."/".$a_date[1]."/".$a_date[0]; //Construction de la date au format jour/mois/annee
				 //$table.='<tr><td>'.$ligne["nom_demandeur"].'</td><td>'.$ligne["prenom_demandeur"].'</td><td>'.$ligne["dossier_expedie"].'</td><td>'.$ligne["passeport_arrive"].'</td><td>'.$ligne["passeport_livre"].'</td><td>'.$ligne["observation"].'</td><td>'.$ligne["montant"].'</td> <td  > <a href="afficher.php?n='.$ligne["idPassport"].'"     onclick=" window.open(this.href, \'Popup\', \'scrollbars=1,resizable=1,height=409,width=918 ,  top=258, left=175 \'); return false; "   >Afficher</a> </td></tr>';
				 $table.='<tr><td>'.$ligne["nom_demandeur"].'</td><td>'.$ligne["prenom_demandeur"].'</td><td>'.$ligne["dossier_expedie"].'</td><td>'.$ligne["passeport_arrive"].'</td><td>'.$ligne["passeport_livre"].'</td><td>'.$ligne["observation"].'</td><td>'.$ligne["montant"].'</td><td>'.$date.'</td> </tr>';
				 }
				$table.='<tr><td></td><td></td><td>  </td><td>  </td><td> </td><td><span style="color:green;  font-size: 17px; font-style: bold;" >TOTAL :</span> </td><td> <span style="color:green;  font-size: 17px; font-style: bold;" >'.$total.'€</span> </td><td> </td>  <tr>'; 
				$table.='</table>';
				//3.2 on vide $pr et on libere la memoir occupée par cet "interrogation serveur"
				unset($pr);
                $reponse3->closeCursor();
				$reponse->closeCursor(); 	
}
//3.3 On affiche le résultat 
$_SESSION["table_passeport"]= $table;
echo $_SESSION["table_passeport"];
//$reponse->closeCursor();	
unset($pr);
//$reponse->closeCursor();


?>


