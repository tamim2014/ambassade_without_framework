<?php
session_start();
error_reporting(E_ALL);
//1.les données saisie au formulaire sont directement stockées dans la table $_POST: donc on les recupere
//Panneau de gauche
if(!empty($_POST["nom_demandeur"])){$nom_demandeur=$_POST["nom_demandeur"];}else{die('');}

//$_SESSION["showInPop"]=$acte;// Pour le bouton "Afficher l'acte"
//$date_acte=$_POST['date_acte'];
$prenom_demandeur=$_POST['prenom_demandeur'];
$montant=$_POST['montant'];
$observation=$_POST['observation'];

if(isset($_POST['lot']))  $lot=$_POST['lot'];
if(isset($_POST['date_export'])) $date_export=$_POST['date_export'];


//Panneau de droite

$dossier_expedie= isset($_POST['dossier_expedie']) ? "Envois" : "NON";
$date_expedie=$_POST['date_expedie'];
$passeport_arrive= isset($_POST['passeport_arrive']) ? "Retours" : "NON";
$date_arrive=$_POST['date_arrive'];
$passeport_livre= isset($_POST['passeport_livre']) ? "Distribué" : "NON";
$date_livraison=$_POST['date_livraison'];
//Rendre un champs obligatoire si un autre est rempli( j'arrive pas à le faire en javascript alors je le fais en PHP mais normalement c 1 truc à faire en javascript)
if(!empty($_POST['date_expedie']))    $dossier_expedie="Envois";
if(!empty($_POST['date_arrive']))     $passeport_arrive="Retour";
if(!empty($_POST['date_livraison']))  $passeport_livre="Distribué";




// 2.ON LES INSERE DANS LA TABLE LISTE DE LA BASE etatcivil
include("connection_PDO.php");


$req=$conn->prepare('INSERT INTO passport(nom_demandeur,prenom_demandeur,montant,observation,dossier_expedie,date_expedie,passeport_arrive,date_arrive,passeport_livre,date_livraison,lot,date_export) 
                                 VALUES(:nom_demandeur,:prenom_demandeur,:montant,:observation,:dossier_expedie,:date_expedie,:passeport_arrive,:date_arrive,:passeport_livre,:date_livraison,:lot,:date_export)');

$req->execute(array(

	'nom_demandeur' => $nom_demandeur,	
	'prenom_demandeur' => $prenom_demandeur,
	
	'montant' => $montant,
	'observation' => $observation,
		
	'dossier_expedie' => $dossier_expedie,	
	'date_expedie' => $date_expedie,
	'passeport_arrive' => $passeport_arrive,
	'date_arrive' => $date_arrive,
	'passeport_livre' => $passeport_livre,
	'date_livraison' => $date_livraison,	
	'lot' => $lot,
	'date_export' => $date_export
));


	
	$req->closeCursor();
   // en html la sortie s'impose ce qui n est pas le cas avec php
 
  // header('Location: ../index.html');
  //if (isset($_POST["enregistrer"])){
       
	   header('Location: ../index.html');
	   
	
	//}
   exit();
?>

