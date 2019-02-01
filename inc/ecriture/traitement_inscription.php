<?php 
  
$link = mysqli_connect('localhost','root','','etatcivil')or die('Erreur de connection :'.mysqli_error());
	$link->set_charset("utf8");
	
	$idElecteur = 0;
	
	$nom="";
	$prenom="";
	$login="";
	$password="";
	$tel="";
	
	$date_naissance="";
	$ville="";
	$message="";
	
		
	if(isset($_POST['nom'])  ){ $nom = $_POST['nom'];}	
	if(isset($_POST['prenom'])){	$prenom = $_POST['prenom']; }	
	if(isset($_POST['login'])){ $login = $_POST['login'];}
	if(isset($_POST['password'])){ $password = $_POST['password'];}	
	if(isset($_POST['tel'])){ $tel = $_POST['tel'];}
	
	if(isset($_POST['date_naissance'])){ $date_naissance = $_POST['date_naissance'];}
	if(isset($_POST['ville'])){ $ville = $_POST['ville'];}
	if(isset($_POST['message'])){ $message = $_POST['message'];}
	
	$detectLogin = "SELECT `login` FROM `listeofficiers` WHERE `login`='$login'";// pourquoi 2 point virgules?
	$result= mysqli_query($link,$detectLogin) or die('Erreur de selection : '.mysqli_error($link));
	if(mysqli_num_rows($result) == 0){
			$query = "INSERT INTO `listeofficiers`( `nom`, `prenom`, `login`, `password`, `tel`, `date`, `ville`, `message`) VALUES ('$nom','$prenom','$login','$password','$tel','$date_naissance','$ville','$message')";
			$resul = mysqli_query($link,$query) or die('Erreur d INSERTION : '.mysqli_error($link ));
			echo "<h3>Bienvenue <a href='#'> ".$prenom." !</a><br/> Vous êtes bien enregistré .</h3>"; 
            echo "<p><a href='#'>Accès aux bases de données avec vos identifiants<br/>(login/password)</a></p>";
			
		
			if(isset($result) && $result == "1"){
					$getUser = "SELECT `idElecteur` FROM `listeofficiers` WHERE `login`='$login'";
					$result_id = mysqli_query($link,$getUser) or die('Erreur de selection : '.mysqli_error($link));
					while($row = mysqli_fetch_assoc($result_id)) {
						$idElecteur = $row["idElecteur"];
					}
			}
	}else if (mysqli_num_rows($result) != 0  && !empty($_POST['nom']) ) {
		//$idElecteur = -1;
		echo "<h3> Ce login<a href='#'> \" ".$login." \" </a>existe déjà.<br/> Veuillez choisir d'autres identifiants ! </h3>";
		echo "<p><a href='inscriptionSurPC.php'>Retour au formulaire</a></p>";
	}
			
	//echo($idElecteur);
	mysqli_free_result($result);

    mysqli_close($link);
	
?>
 