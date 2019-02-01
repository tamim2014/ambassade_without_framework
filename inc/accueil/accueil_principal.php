<?php
/*
	try{$conn = new PDO('mysql:host=localhost;dbname=etatcivil;charset=utf8', 'root', ''); }
	catch(Exception $e){die('Erreur de connexion à la base de données: '.$e->getMessage());}
	
	$reponse = $conn->query('SELECT * FROM liste WHERE ID='.$id );
	$donnees = $reponse->fetch();
*/


session_start();
    $BD_serveur     = "localhost";
    $BD_utilisateur = "root";
    $BD_motDePasse  = "";
    $BD_base        = "etatcivil";

  
  	$db = mysqli_connect($BD_serveur,$BD_utilisateur,'',$BD_base)or die('Erreur de connection :'.mysqli_error());
	$db->set_charset("utf8");
  
 // moteur de recherche 
  if(isset($_POST['acte_']))  $numero=$_POST['acte_'];
  if(isset($_POST['nom_']))   $nomm=$_POST['nom_'];

	// moteur de recherche 
	$message ="Pour trouver un document, entrer ci-haut, son num&eacute;ro, ou son nom";
	//if(isset($_POST['acte_']) && !ctype_digit($numero) ){$message = ' le numero est mal saisi'; }
	
    if(!empty($numero) && ctype_digit($numero) )
    {	  
	  $sql="SELECT * FROM liste WHERE acte =".$numero; // PAS DE SLASH POUR UN ENTIER
	  $req=mysqli_query($db,$sql) or die('Erreur SQl !<br>'.$sql.'<br>'.mysqli_error($db));
	  $result = mysqli_fetch_row($req);
	    if ($result[0] == 0){
			$message = ' aucun resultat trouv&eacute;'; 
		}else{
		 // --- enregistrement en session de l'utilisateur
			$_SESSION["acte"] = $numero;
		 // --- redirection en fonction de l'utilisateur
			header("Location: lectureBD2.php?num=".$numero );
		}
	}
	//ctype_digit($nombre) verifie si c est un nombre entier
	if(!empty($numero) && !ctype_digit($_POST['acte_'])) {$message = 'le numero est mal saisi'; }

		  
    if(!empty($nomm) )
    {
	  $sql2="SELECT * FROM `liste` WHERE `nom`='$nomm';";
	  $req2=mysqli_query($db,$sql2) or die('Erreur SQl !<br>'.$sql2.'<br>'.mysqli_error($db));
	  $result2 = mysqli_fetch_row($req2);
	    if ($result2[0] == 0){$message = ' aucun resultat trouv&eacute;'; 
		}else{
		 // --- enregistrement en session de l'utilisateur
			$_SESSION["nom"]=$nomm;
		 // --- redirection en fonction de l'utilisateur
			header("Location: lectureBD2.php?nom=".$nomm);
		}
	}
	
?>
 