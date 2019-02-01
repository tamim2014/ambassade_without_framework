<?php
error_reporting(E_ALL);
//1. recup des données saisie au formulaire( dans la table $_POST[] )

//Panneau de gauche
//date(strtotime($mysql_date), "d-m-Y"))
//if(!empty($_POST["date"]) || isset($_POST["date"]) ){$date=$_POST["date"];}else{die('');}
if(!empty($_POST["date"]) || isset($_POST["date"]) ){$date=date(strtotime($_POST["date"]), "d-m-Y");}else{die('');}

if(isset($_POST['nb_legalisation']))  $nb_legalisation=$_POST['nb_legalisation'];
//if(isset($_POST['mt_legalisation']))$mt_legalisation=$_POST['mt_legalisation'];

$nb_concordance=$_POST['nb_concordance'];
//$mt_concordance=$_POST['mt_concordance'];

$nb_coutume=$_POST['nb_coutume'];
//$mt_coutume=$_POST['mt_coutume'];

$nb_celibat=$_POST['nb_celibat'];
//$mt_celibat=$_POST['mt_celibat'];

$nb_sc=$_POST['nb_sc'];
//$mt_sc=$_POST['mt_sc'];

$nb_pp=$_POST['nb_pp'];
//$mt_pp=$_POST['mt_pp'];

$nb_depot=$_POST['nb_depot'];
//$mt_depot=$_POST['mt_depot'];




$nb_lp=$_POST['nb_lp'];
//$mt_lp=$_POST['mt_lp'];

$observation=$_POST['observation'];


//Panneau de droite
$dossier_expedie= isset($_POST['dossier_expedie']) ? "Envois" : "NON";
$mois=$_POST['mois'];
$passeport_arrive= isset($_POST['passeport_arrive']) ? "Retours" : "NON";
$annee=$_POST['annee'];
$passeport_livre= isset($_POST['passeport_livre']) ? "Distribué" : "NON";

// 2.ON LES INSERE DANS LA TABLE LISTE DE LA BASE etatcivil
include("connection_PDO.php");

$req=$conn->prepare('INSERT INTO recette_legalisation(date,nbre_leg,nbre_concord,nbre_coutume,nbre_celibat,nbre_sc,nbre_pp,nbre_depot,nbre_lp,observation,mois,annee) 
                                 VALUES(:date,:nb_legalisation,:nb_concordance,:nb_coutume,:nb_celibat,:nb_sc,:nb_pp,:nb_depot,:nb_lp,:observation,:mois,:annee)');

$req->execute(array(

	'date' => $date,	
	'nb_legalisation' => $nb_legalisation,			
	'nb_concordance' => $nb_concordance,			
	'nb_coutume' => $nb_coutume,	
	'nb_celibat' => $nb_celibat,	
	'nb_sc' => $nb_sc,	
	'nb_pp' => $nb_pp,	
	'nb_depot' => $nb_depot,	
	'nb_lp' => $nb_lp,	
	'observation' => $observation,
	
	'mois' => $mois,
	'annee' => $annee

));

//réinitialiser la table
  //$conn->exec("ALTER TABLE recette_legalisation AUTO_INCREMENT = 0 "); exit();	
$req->closeCursor();
	// en html la sortie s'impose ce qui n est pas avec php
   header('Location: ../lectureBD_recette_legalisation.html');
   exit();
?>

