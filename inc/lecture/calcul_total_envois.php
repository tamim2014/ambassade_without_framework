<?php
    //SOURCE:lectureBD.php

     //include("SERVEUR/connection_PDO.php");
	 try{
		 $bdd = new PDO('mysql:host=localhost;dbname=etatcivil;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}// Le array active les exception PDO: pour obtenir + de détail sur d'eventuels erreurs
	
	catch(Exception $e){
		die('Erreur de connexion à la base de données: '.$e->getMessage());
	}

	//calcul du total_envoi
	$total4=0;
	$requete4='SELECT SUM(montant) FROM passport WHERE (dossier_expedie="'.$_SESSION["envoi"].'" AND passeport_arrive !="Retours" AND passeport_livre !="Distribué" ) ';				
	$reponse4 = $conn->query($requete4) ;//Stockage de la requête dans une variable tampon
	while($ligne4 = $reponse4->fetch()){
	//if(isset($ligne2["montant"])) $total=$ligne2["montant"];
		$total4=$ligne4["SUM(montant)"];
		//$_SESSION["total4"]=$total4;					
	}
	$reponse4->closeCursor();
				
?> 