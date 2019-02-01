  <?php
session_start(); 
if(isset($_POST["nom_demandeur"])  )      $nom_demandeur=$_POST["nom_demandeur"];
if(isset($_POST['prenom_demandeur']))     $prenom_demandeur=$_POST['prenom_demandeur'];
if(isset($_POST['montant']))		      $montant=$_POST['montant'];
if(isset($_POST['observation']))		  $observation=$_POST['observation'];
if(isset($_POST['lot']))		          $lot=$_POST['lot'];
if(isset($_POST['date_export']))		  $date_export=$_POST['date_export'];


if(isset($_POST['date_expedie']))		  $date_expedie=$_POST['date_expedie'];
if(isset($_POST['date_arrive']))		  $date_arrive=$_POST['date_arrive'];
if(isset($_POST['date_livraison']))		  $date_livraison=$_POST['date_livraison'];


$dossier_expedie= isset($_POST['dossier_expedie']) ? "Envois" : "NON";
$passeport_arrive= isset($_POST['passeport_arrive']) ? "Retours" : "NON";
$passeport_livre= isset($_POST['passeport_livre']) ? "Distribué" : "NON";



include("connection_mysqli.php");
$sql = "UPDATE passport SET nom_demandeur='".$nom_demandeur."',prenom_demandeur='".$prenom_demandeur."',montant=".$montant.",observation='".$observation."',dossier_expedie='".$dossier_expedie."',date_expedie='".$date_expedie."',passeport_arrive='".$passeport_arrive."',date_arrive='".$date_arrive."',passeport_livre='".$passeport_livre."',date_livraison='".$date_livraison."',lot=".$lot.",date_export='".$date_export."' WHERE idPassport=".$_SESSION["identif_passport"] ;
$conn->query($sql);

$conn->close();
//header("Location: ../index.html");
//Constat du Vendredi 02.11.2018 à resoudre le 04.11.2018 
// à ce niveau une phase de teste s'impose car un comportement un peu ABERANT subsiste.
// ANOMALIE1: une fois l'utilisateur entré dans la page modif_passeport.php  
//il reste bloqué de-dans alors qu'il veut saisir un nouveau document
// c'est un prblème fonctionnel intolerable
header("Location: ../modif_passport.php?n=".$_SESSION["identif_passport"]."&nom_=".$nom_demandeur."&prenom_=".$prenom_demandeur."&montant_=".$montant."&observation_=".$observation."&envoi_=".$dossier_expedie."&retour_=".$passeport_arrive."&distribue_=".$passeport_livre."&lot_=".$lot."&date_export_=".$date_export."&date_expedie_=".$date_expedie."&date_arrive_=".$date_arrive."&date_livraison_=".$date_livraison);            

exit();


?>