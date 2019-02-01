<?php

echo '
 
<ul style=" list-style:none;"    >
<li class="sousmenu1"  >     
	    <a href="#"><input class="teteSousMenuDroite" type="button" value="Etat du dossier" align="center"    /> </a>
		<ul class="panel3" >
		
			<li name="envoi" >    <a   href="#" class="island1" style="padding-left:0px; " > Envois    </a>   </li><hr >
		    <li >    <a   href="#" class="island1" style="padding-left:0x; " > Retours   </a>   </li><hr>
			
						
	    </ul> 
	    <a href="#"  ><input type="button" class="piedSousMenuDroite"  value="Effacer" align="center"    /> </a> 
</li>
<li class="sousmenu2" >     
	<a href="#"><input class="teteSousMenuDroite" type="button" value="Passeports livrés" align="center"    /> </a>
	<ul class="panel3" >
			<li>    <a   href="./lectureBD_1mois.php" class="island2"  style="padding-left:1px; " > Ce  mois </a></li><hr >
		    <li>    <a   href="./lectureBD_1an.php" class="island2"  style="padding-left:1px; " > Cette année</a></li><hr>
			<li>    <a   href="./lectureBD_touslespasseports.php" class="island2"  style="padding-left:1px; " > Tous les passeports</a></li>
		
		
	</ul> 
	<a href="#"  ><input type="button" class="piedSousMenuDroite"  value=" Effacer" align="center" /></a> 
</li>

</ul>

';

 
 
?>

