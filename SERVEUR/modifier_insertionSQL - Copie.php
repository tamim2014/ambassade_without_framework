
<?php
session_start();
include("connection_PDO.php");
if (isset($n)){
	
//$idPassport = $_SESSION["identif_passport"];
//$idPassport = $n;

 if(isset($_POST['nom_demandeur'])){
// new data
$nom_demandeur=$_POST["nom_demandeur"];
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

$nom_recepteur=$_POST['nom_recepteur'];


// query  acte=?, acte=?, acte=?, acte=?, acte=?
 
$sql = "UPDATE passport 
        SET nom_demandeur=?,prenom_demandeur=?,montant=?,observation=?, lot=?,date_export=?,dossier_expedie=?,date_expedie=?,passeport_arrive=?,date_arrive=?,passeport_livre=?,date_livraison=?,nom_recepteur=?
        WHERE idPassport=?";
$q = $conn->prepare($sql);
$accent=$q->execute(array($nom_demandeur,$prenom_demandeur,$montant,$observation,$lot,$date_export,$dossier_expedie,$date_expedie,$passeport_arrive,$date_arrive,$passeport_livre,$date_livraison,$nom_recepteur,$_SESSION["identif_passport"]));
 htmlentities($accent, ENT_QUOTES, "ISO-8859-1");
  }
} 

//3.Réinitialisation  de l'auto-incrément(si la table est vidée): 
$conn->exec("ALTER TABLE liste AUTO_INCREMENT=0 ");//mysql_query("ALTER TABLE liste AUTO_INCREMENT=0 ");
exit();
 


?>