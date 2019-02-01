
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
if($pr=="Envois" || $pr=="Retours"){
//??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
$requete='SELECT * FROM passport WHERE (dossier_expedie="'.$pr.'" AND passeport_arrive !="Retours" AND passeport_livre !="Distribué" ) OR (passeport_arrive="'.$pr.'" AND passeport_livre !="Distribué") ORDER BY date_export ASC ';// LE PROBLEME EST Là .Pourquoi Mysql ne voit pas la variable $p?Résolu 3 jours de galère mais résolu: supprimer l'espace en début de chaîne:$pr=ltrim($pr); ?????????????
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
	if(!empty($total4)&&!empty($_SESSION["total_envoi"]) && isset($_SESSION["total_envoi"])){ $somme=$_SESSION["total_envoi"];}
	else  if(!empty($total5)&& !empty($_SESSION["total_retour"]) && isset($_SESSION["total_retour"])) { $somme=$_SESSION["total_retour"];}
//3.Affichage
//3.1 On construit une table d'affichage:REMARQUE IMPORTANT i fo fo faire la page de reception (modif_passport) en PHP et non en html
				$table='<table >'; 
				$table.='<tr><th>NOM</th><th>PRENOM</th><th> ENVOI </th><th>RETOUR  </th><th>DISTRIBUTION </th><th>OBSERVATION</th><th> €  </th> <th>DATE </th> <th> </th> <tr>';
				while($ligne = $reponse->fetch()){
				 // D'abordon ré-écrit la date au format français
						 $date=$ligne["date_export"];
						 $a_date = explode("-", $date); //découpage de la date selon les -
						 $date = $a_date[2]."/".$a_date[1]."/".$a_date[0]; //Construction de la date au format jour/mois/annee
				 
					 $table.='<tr><td>'.$ligne["nom_demandeur"].'</td><td>'.$ligne["prenom_demandeur"].'</td><td>'.$ligne["dossier_expedie"].'</td><td>'.$ligne["passeport_arrive"].'</td><td>'.$ligne["passeport_livre"].'</td><td>'.$ligne["observation"].'</td><td>'.$ligne["montant"].'</td><td>'.$date.'</td><td><a href="modif_passport.php?n='.$ligne["idPassport"].'&nom_='.$ligne["nom_demandeur"].'&prenom_='.$ligne["prenom_demandeur"].'&montant_='.$ligne["montant"].'&observation_='.$ligne["observation"].'&envoi_='.$ligne["dossier_expedie"].'&retour_='.$ligne["passeport_arrive"].'&distribue_='.$ligne["passeport_livre"].'&lot_='.$ligne["lot"].'&date_export_='.$ligne["date_export"].'&date_expedie_='.$ligne["date_expedie"].'&date_arrive_='.$ligne["date_arrive"].'&date_livraison_='.$ligne["date_livraison"].' ">Modifier</a> </td></tr>';               
					 //$table.='<tr><td>'.$ligne["nom_demandeur"].'</td><td>'.$ligne["prenom_demandeur"].'</td><td>'.$ligne["dossier_expedie"].'</td><td>'.$ligne["passeport_arrive"].'</td><td>'.$ligne["passeport_livre"].'</td><td>'.$ligne["observation"].'</td><td>'.$ligne["montant"].'</td><td>'.$ligne["date_export"].'</td> <td> <a href="modif_passport.html?n='.$ligne["idPassport"].'  &  nom_='.$ligne["nom_demandeur"].'   &  prenom_='.$ligne["prenom_demandeur"].'   &   montant_='.$ligne["montant"].' &  observation_='.$ligne["observation"].'&  envoi_='.$ligne["dossier_expedie"].'&  retour_='.$ligne["passeport_arrive"].'&  distribue_='.$ligne["passeport_livre"].'&  lot_='.$ligne["lot"].'&  date_export_='.$ligne["date_export"].' "><input type="image" src="img/edit.jpg" /> </a> </td></tr>';               
					 $_SESSION["identifiant_passeport"]=$ligne["nom_demandeur"];
				 }
				$table.='<tr><td></td><td></td><td>  </td><td>  </td><td> </td><td><span style="color:green;  font-size: 17px; font-style: bold;" >TOTAL :</span> </td><td><span style="color:green;  font-size: 17px; font-style: bold;" >'.$somme.'€</span> </td><td> </td> <td> </td> <tr>'; 
				$table.='</table>';
				// variables à transmettre à la pop
				 $_SESSION["idpasseport"]=$ligne["idPassport"];	
				 $reponse4->closeCursor();
				 $reponse5->closeCursor();
				
}else if($pr=="Distrib(mensuel)" ){	
				$requete='SELECT * FROM passport WHERE   MONTH(date_livraison) = MONTH(NOW())  ORDER BY date_livraison ASC';				
				$reponse = $conn->query($requete) ;//Stockage de la requête dans une variable tampon				
				//calcul du total_mensuel
				$total=0;
				$requete2='SELECT SUM(montant) FROM passport WHERE   MONTH(date_livraison) = MONTH(NOW()) ';				
				$reponse2 = $conn->query($requete2) ;//Stockage de la requête dans une variable tampon
				while($ligne2 = $reponse2->fetch()){
					//if(isset($ligne2["montant"])) $total=$ligne2["montant"];
					$total=$ligne2["SUM(montant)"];					
				}
				//3.Affichage
				$table='<table >'; 
				$table.='<tr><th>NOM</th><th>PRENOM</th><th> ENVOI </th><th>RETOUR  </th><th>DISTRIBUTION </th><th>OBSERVATION</th><th> € </th> <th>DATE </th>  <tr>';
				while($ligne = $reponse->fetch()){// en utlisant FOREACH ça marche pas .j'sais pas pourquoi
				 // D'abordon ré-écrit la date au format français
				   		$date_m=$ligne["date_livraison"];
						 $a_date = explode("-", $date_m); //découpage de la date selon les -
						 $date_m = $a_date[2]."/".$a_date[1]."/".$a_date[0]; //Construction de la date au format jour/mois/annee
				 
				 //$table.='<tr><td>'.$ligne["nom_demandeur"].'</td><td>'.$ligne["prenom_demandeur"].'</td><td>'.$ligne["dossier_expedie"].'</td><td>'.$ligne["passeport_arrive"].'</td><td>'.$ligne["passeport_livre"].'</td><td>'.$ligne["observation"].'</td><td>'.$ligne["montant"].'</td><td>'.$ligne["date_export"].'</td> <td  > <a href="afficher.php?n='.$ligne["idPassport"].'"     onclick=" window.open(this.href, \'Popup\', \'scrollbars=1,resizable=1,height=409,width=918 ,  top=258, left=175 \'); return false; "   >Afficher</a> </td> </tr>';
				 $table.='<tr><td>'.$ligne["nom_demandeur"].'</td><td>'.$ligne["prenom_demandeur"].'</td><td>'.$ligne["dossier_expedie"].'</td><td>'.$ligne["passeport_arrive"].'</td><td>'.$ligne["passeport_livre"].'</td><td>'.$ligne["observation"].'</td><td>'.$ligne["montant"].'</td><td>'.$date_m.'</td>  </tr>';
				 }				  
				 $table.='<tr><td></td><td></td><td>  </td><td>  </td><td> </td><td><span style="color:green;  font-size: 17px; font-style: bold;" >TOTAL :</span> </td><td> <span style="color:green;  font-size: 17px; font-style: bold;" >'.$total.'€</span> </td><td> </td>  <tr>'; 
				 $table.='</table>';
				//3.2 on vide $pr et on libere la memoir occupée par cet "interrogation serveur"
				unset($pr);
                $reponse2->closeCursor();
				$reponse->closeCursor(); // mysql_close(); i parait que ça sert à rien puisque MySQL le fait tout seul
								
}else if($pr=="Distrib(annuel)"){
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
}else if($pr=="Distributions"){
				$requete_tous='SELECT * FROM passport WHERE   date_livraison != "NON"  ';				
				$reponse_tous = $conn->query($requete_tous) ;
				//3.Affichage
				//3.1 On construit une table d'affichage
				$table='<table >'; 
				$table.='<tr><th>NOM</th><th>PRENOM</th><th> ENVOI </th><th>RETOUR  </th><th>DISTRIBUTION </th><th>OBSERVATION</th><th>€</th><tr>';
				while($ligne = $reponse_tous->fetch()){// en utlisant FOREACH ça marche pas .j'sais pas pourquoi
	
				 
				 
				 //$table.='<tr><td>'.$ligne["nom_demandeur"].'</td><td>'.$ligne["prenom_demandeur"].'</td><td>'.$ligne["dossier_expedie"].'</td><td>'.$ligne["passeport_arrive"].'</td><td>'.$ligne["passeport_livre"].'</td><td>'.$ligne["observation"].'</td><td>'.$ligne["montant"].'</td> <td  > <a href="afficher.php?n='.$ligne["idPassport"].'"     onclick=" window.open(this.href, \'Popup\', \'scrollbars=1,resizable=1,height=409,width=918 ,  top=258, left=175 \'); return false; "   >Afficher</a> </td></tr>';
				 $table.='<tr><td>'.$ligne["nom_demandeur"].'</td><td>'.$ligne["prenom_demandeur"].'</td><td>'.$ligne["dossier_expedie"].'</td><td>'.$ligne["passeport_arrive"].'</td><td>'.$ligne["passeport_livre"].'</td><td>'.$ligne["observation"].'</td><td>'.$ligne["montant"].'</td> </tr>';
				 }
				$table.='</table>';
				//echo $table;
				//3.2 on vide $pr et on libere la memoir occupée par cet "interrogation serveur"
				//unset($pr);
				$reponse_tous->closeCursor();				
}
//3.3 On affiche le résultat 
$_SESSION["table_passeport"]= $table;
echo $_SESSION["table_passeport"];
//$reponse->closeCursor();	
unset($pr);
//$reponse->closeCursor();


?>


