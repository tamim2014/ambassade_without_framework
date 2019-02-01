<?php session_start(); if(!isset($_SESSION["pref"])) $_SESSION["pref"]=""; $s=$_SESSION["pref"]; ?>


<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8"> 
	 <link href="css/accueil.css" rel="stylesheet" title="Style" />
	 <link href="css/lectureBD.css" rel="stylesheet" title="Style" />
</head>

<body>	 

<div id="yivawo"  style="left:13px;   box-shadow: 1px 1px 0px 0px #cdbe9f; width:100%; " >
<?php

			   echo $_SESSION["table_caisse"];

?>
</div>
</body>
</html> 


