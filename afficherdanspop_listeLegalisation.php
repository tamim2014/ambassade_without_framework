<?php session_start(); if(!isset($_SESSION["pref"])) $_SESSION["pref"]=""; $s=$_SESSION["pref"]; ?>


<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8"> 
	 <link href="css/accueil.css" rel="stylesheet" title="Style" />
	 <link href="css/lectureBD.css" rel="stylesheet" title="Style" />
	 <style>
	 body{
			background:silver url('images/back_vert.png') center top no-repeat;
			padding-left:10%;
			padding-right:10%;
			font-style: italic;
			font-family: "Times New Roman", Georgia, Serif;
	}
	 div#wrap { background-color:sylver; }
	 table,tr,th,td {border-radius:1px; }
     table tr#th_noir th {background:black; }
	 #yivawo{
		 margin-bottom:4px;   
		 box-shadow: 1px 1px 0px 0px #cdbe9f; 
		 width:100%; 
		 height:100%; 
		 scrollbar:auto; 
	    margin:auto;				  
	    box-shadow:
		  0px 8px 8px 0px rgba(0, 0, 0, 0.5) inset,
		   0px 8px 8px 0px rgba(255, 255, 255, 0.5); 
		 
	 }
	 </style>
</head>

<body>
	<div id="wrap">	 
		<div id="yivawo" >
			  <?php  echo $_SESSION["table_legalisation"]; ?>
		</div>
	</div>
</body>
</html> 


