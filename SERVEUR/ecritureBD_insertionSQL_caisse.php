<?php
error_reporting(E_ALL);
//1.les données saisie au formulaire sont directement stockées dans la table $_POST: donc on les recupere
//Panneau de gauche
if(!empty($_POST["piece"])){$piece=$_POST["piece"];}else{die('');}

//$_SESSION["showInPop"]=$acte;// Pour le bouton "Afficher l'acte"
//$date_acte=$_POST['date_acte'];
$date=$_POST['date'];
$imputation=$_POST['imputation'];
$libelle=$_POST['libelle'];
$observation=$_POST['observation'];

if(isset($_POST['debit']))  $debit=$_POST['debit'];
if(isset($_POST['credit'])) $credit=$_POST['credit'];


//Panneau de droite
$dossier_expedie= isset($_POST['dossier_expedie']) ? "Envois" : "NON";
$mois=$_POST['mois'];
$passeport_arrive= isset($_POST['passeport_arrive']) ? "Retours" : "NON";
$annee=$_POST['annee'];
$passeport_livre= isset($_POST['passeport_livre']) ? "Distribué" : "NON";







// 2.ON LES INSERE DANS LA TABLE LISTE DE LA BASE etatcivil
include("connection_PDO.php");


$req=$conn->prepare('INSERT INTO caisse(date,piece,imputation,libelle,debit,credit,mois,annee,observation) 
                                 VALUES(:date,:piece,:imputation,:libelle,:debit,:credit,:mois,:annee,:observation)');

$req->execute(array(

	'date' => $date,	
	'piece' => $piece,	
	'imputation' => $imputation,
	'libelle' => $libelle,
		
	'debit' => $debit,	
	'credit' => $credit,
	
	'mois' => $mois,
	'annee' => $annee,
	'observation' => $observation

));
	
$req->closeCursor();
header('Location: ../lectureBD_caisse.html');
exit();
?>

