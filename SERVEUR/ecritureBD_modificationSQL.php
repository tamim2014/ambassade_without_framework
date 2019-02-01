<?php
session_start(); 
$n=$_GET["identifiant"];
//error_reporting(E_ALL);
//$idPassport=$_SESSION["identif_passport"];
$idPassport=$n; echo $idPassport."777777777";
  
$nom_demandeur=$_POST["nom_demandeur"];
$prenom_demandeur=$_POST['prenom_demandeur'];
$montant=$_POST['montant'];
$observation=$_POST['observation'];

$lot=$_POST['lot'];
$date_export=$_POST['date_export'];
$dossier_expedie= isset($_POST['dossier_expedie']) ? "Envois" : "NON";
$date_expedie=$_POST['date_expedie'];
$passeport_arrive= isset($_POST['passeport_arrive']) ? "Retours" : "NON";
$date_arrive=$_POST['date_arrive'];
$passeport_livre= isset($_POST['passeport_livre']) ? "Distribué" : "NON";
$date_livraison=$_POST['date_livraison'];

include("connection_mysqli.php");
$sql = "UPDATE passport SET nom_demandeur='".$nom_demandeur."',prenom_demandeur='".$prenom_demandeur."',montant=".$montant.",observation='".$observation."',dossier_expedie='".$dossier_expedie."',date_expedie='".$date_expedie."',passeport_arrive='".$passeport_arrive."',date_arrive='".$date_arrive."',passeport_livre='".$passeport_livre."',date_livraison='".$date_livraison."',lot=".$lot.",date_export='".$date_export."' WHERE idPassport=".$_SESSION["identif_passport"] ;
$conn->query($sql);

if ($conn->query($sql) == TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


//_______________________________________________________________________________________
/*
include("connection_PDO.php");
$sql="UPDATE passport SET nom_demandeur=?,prenom_demandeur=?,montant=?,observation=?,dossier_expedie=?,date_expedie=?,passeport_arrive=?,date_arrive=?,passeport_livre=?,date_livraison=?,lot=?,date_export=? WHERE idPassport=?";
$q=$conn->prepare($sql);
$q->execute([$nom_demandeur,$prenom_demandeur,$montant,$observation,$dossier_expedie,$date_expedie,$passeport_arrive,$date_arrive,$passeport_livre,$date_livraison,$lot,$date_export,$idPassport]);



//3.Réinitialisation  de l'auto-incrément(si la table est vidée): 
//$conn->exec("ALTER TABLE passport AUTO_INCREMENT=0 ");//mysql_query("ALTER TABLE liste AUTO_INCREMENT=0 ");

//$accent->closeCursor();

*/
header('Location: ../index.html');
exit();


//_______________________________________________________________________________________

/********************************************************************************************************************
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
	// en html la sortie s'impose ce qui n est pas avec php
   header('Location: ../index.html');
   exit();

****************************************************************************************************************************************/
?>
