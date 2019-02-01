

<?php
		       
						$link = mysqli_connect('localhost','root','','etatcivil')or
						die('Erreur de connection : '.mysqli_error());
						$link->set_charset("utf8");

						$login="";

						if(isset($_POST['saisirlogin'])){  $login = $_POST['saisirlogin'];}

						//Requête: PHP-> MySQL
						$query="SELECT `password` FROM `listeofficiers` WHERE `login`= '$login'";
						$result = mysqli_query($link,$query) or die('Erreur de selection : '.mysqli_error());

						//Reponse: PHP<-MySQL	
						$reponse ="";
						while($row = mysqli_fetch_array($result)){	
						   $reponse = $row["password"];// reponse à envoyer au client android
						} 

                        if (mysqli_num_rows($result) != 0  && !empty($_POST['saisirlogin']) ) {
		
		                   //trouver une solution javascript pour remplacer la div info par cette page html
						   echo '
						        
									<html   >
										<head>
										 <link href="css/formulaire_inscription.css" rel="stylesheet"  /> 										 
										</head>
										<body>
										<div class="container">
										<header>
										   <h1>Mot de passe</h1>
										</header>										  
										<nav>
										  <ul>
											<li><a href="#">Login</a></li>
											<li><a href="#">Password</a></li>
										  </ul>
										</nav>
										<article>

											<form action="#"   method="post">
												<p class="titre">Votre login</p>
												<fieldset id="coordonnees">																																		
												</fieldset>									 
												<p class="titre">Votre password</p>
												<fieldset id="message">												  
												  <textarea  name="afficherpassword" rows="4" cols="40" style="margin-bottom:30px;" >												  												  
													        &nbsp;&nbsp; Votre pasword est:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .$reponse. '   												  																				
												  </textarea>												  
												</fieldset>												
												<p id="buttons">
												  <input type="submit" value="Valider"  />
												  <input type="reset" value="Annnuler" />
												</p>
											</form> 
										</article>
										<footer>Copyright &copy; A.Andjib.com</footer>
										</body>
										</html>	
									
						   ';
		                  
	                    }						

						mysqli_free_result($result);
						mysqli_close($link);

						//echo($reponse);// c'est ce qui sera envoyé au client android				 
?>