
<?php

session_start();
//Défintion des varibles: ATTENTION "  LE FAIRE TOUJOURS AVANT LA CONNEXION"

if(isset($_GET['pr'])) $pr=$_GET['pr'];
//if(!isset($_GET['pr'])) $pr=$_GET['pr'];

if(empty($_GET['pr'])) $pr=$_GET['pr'];
//if(!empty($_GET['pr'])) $pr=$_GET['pr'];
$pr=ltrim($pr);// Voilà la solution MASHA ALLAH. Un espace s'est glissé en début de chaîne, il fallait le supprimer
$pr=rtrim($pr);// pour supprimer un eventuel espace en fin de chaîne

 
$_SESSION["envoi"]=$pr;//pour le calcul de la somme envoi (lectureBD.php)
$_SESSION["retour"]=$pr;//pour le calcul de la somme retour (lectureBD.php)

	
//On enleve lechappement si get_magic_quotes_gpc est active
if(get_magic_quotes_gpc()){ $_GET['pr'] = stripslashes($_GET['pr']);}
//$_SESSION['pref']=$pr; // Pour pouvoir afficher la colonne "Imprimer" dans le panel  "yivawo"  tjrs dans la mm prefecture

//1.Connexion
include("connection_PDO.php");
//2.Requête

$requete='SELECT * FROM passport WHERE nom_demandeur="'.$pr.'"';
$reponse = $conn->query($requete) or die(mysq_error()) ;//Stockage de la requête dans une variable tampon

//3.Affichage
//3.1 On construit une table d'affichage:REMARQUE IMPORTANT i fo fo faire la page de reception (modif_passport) en PHP et non en html
if($reponse->rowCount()>0){
		$table='<table >'; 
		$table.='<tr><th>NOM</th><th>PRENOM</th><th> ENVOI </th><th>RETOUR  </th><th>DISTRIBUTION </th><th>OBSERVATION</th><th> €  </th> <th>DATE </th> <th> </th> <tr>';
		while($ligne = $reponse->fetch()){
			 $table.='<tr><td>'.$ligne["nom_demandeur"].'</td><td>'.$ligne["prenom_demandeur"].'</td><td>'.$ligne["dossier_expedie"].'</td><td>'.$ligne["passeport_arrive"].'</td><td>'.$ligne["passeport_livre"].'</td><td>'.$ligne["observation"].'</td><td>'.$ligne["montant"].'</td><td>'.$ligne["date_export"].'</td><td><a href="modif_passport.php?n='.$ligne["idPassport"].'&nom_='.$ligne["nom_demandeur"].'&prenom_='.$ligne["prenom_demandeur"].'&montant_='.$ligne["montant"].'&observation_='.$ligne["observation"].'&envoi_='.$ligne["dossier_expedie"].'&retour_='.$ligne["passeport_arrive"].'&distribue_='.$ligne["passeport_livre"].'&lot_='.$ligne["lot"].'&date_export_='.$ligne["date_export"].'&date_expedie_='.$ligne["date_expedie"].'&date_arrive_='.$ligne["date_arrive"].'&date_livraison_='.$ligne["date_livraison"].' ">Modifier</a> </td></tr>';               
			 //$table.='<tr><td>'.$ligne["nom_demandeur"].'</td><td>'.$ligne["prenom_demandeur"].'</td><td>'.$ligne["dossier_expedie"].'</td><td>'.$ligne["passeport_arrive"].'</td><td>'.$ligne["passeport_livre"].'</td><td>'.$ligne["observation"].'</td><td>'.$ligne["montant"].'</td><td>'.$ligne["date_export"].'</td> <td> <a href="modif_passport.html?n='.$ligne["idPassport"].'  &  nom_='.$ligne["nom_demandeur"].'   &  prenom_='.$ligne["prenom_demandeur"].'   &   montant_='.$ligne["montant"].' &  observation_='.$ligne["observation"].'&  envoi_='.$ligne["dossier_expedie"].'&  retour_='.$ligne["passeport_arrive"].'&  distribue_='.$ligne["passeport_livre"].'&  lot_='.$ligne["lot"].'&  date_export_='.$ligne["date_export"].' "><input type="image" src="img/edit.jpg" /> </a> </td></tr>';               					 										 			
			 if(isset($ligne["montant"])) $_SESSION["paye"]=$ligne["montant"];
			 if(isset($ligne["idPassport"])) $_SESSION["idpasseport"]=$ligne["idPassport"];		// variables à transmettre à la pop	 		 
		 }				 					 
		//$_SESSION["identifiant_passeport"]=$ligne["nom_demandeur"];				
		$table.='<tr><td></td><td></td><td>  </td><td>  </td><td> </td><td><span style="color:red;  font-size: 17px; font-style: bold;" >Payé :</span> </td><td><span style="color:red;  font-size: 17px; font-style: bold;" >'.$_SESSION["paye"].'€</span> </td><td> </td> <td> </td> <tr>'; 
		$table.='</table>';	
		echo $table;
}else{
	    echo "
		<br><br>Aucun document ne correspond aux termes de recherche spécifiés<br> (<b>".$pr."</b>).<br><br>
		Suggestions :<br><br>
        <ul style=\"text-align : left; margin-left:30%;\">
			<li>Vérifiez l’orthographe des termes de recherche.</li>
			<li>Essayez d'autres mots.</li>
			<li>Utilisez des mots clés plus généraux.</li>
		</ul>
		";
}	
				
								
unset($pr);
//$reponse->closeCursor();


?>


