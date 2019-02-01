<?php


if($_GET['type_demande'] == "tableau") {
//on affiche le tableau de donnée
$tableau_donnee = array("Obi One Kenobi", "Qui Gon Jinn", "Mace Windu", "Yoda", "Dark Vador");
$nb_res = count($tableau_donnee);
for($i=0;$i&lt;$nb_res;$i++) {
echo $tableau_donnee[$i]."&lt;br&gt;";
}
} else {
//on affiche un image
echo "<img src='obi_one_kenobi.png' border='0' />";
}
?>