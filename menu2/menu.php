 <?php 

  echo ' 
	 
	 <img src="img/menu.png" id="iconemenu" style=" z-index=4; position:fixed; right:0px; " /><br>
    <img src="img/menu.png" id="imagemenu" style=" z-index=4; position:fixed; right:0px; " /><br><br>
    <!-- menu accordeon vertical -->
    
		<ul class="navigation" style=" position:fixed; right:-19px; margin-right:0px; padding-right:0px; width:15.7%;" >

	
		  <li class="toggleSubMenu"><span>Gestion passports</span>
			<ul class="subMenu">
			  <li><a href="#" title="" onclick="page(\'demande.php\')" style="color:#fff;" >Demandes déposées</a></li>
			  <li><a href="#" title="" onclick="page(\'retrait.php\')" style="color:#fff; ">Passports délivrés</a></li>
			  <li><a href="#" title="" onclick="page(\'mensuel.php\')" style="color:#fff;">Requêtes mensuelles</a></li>
			  <li><a href="#" title="" onclick="page(\'annuel.php\')" style="color:#fff;">Requêtes annuelles</a></li>
			</ul>
			</li>
			<li class="toggleSubMenu"><span>Ressources humaines</span>
			  <ul class="subMenu" style="color: #fff;" >
				<li><a href="#" title="" style="color:#fff;">Le personnel</a></li>
				<li><a href="#" title="" style="color:#fff;">Les congés</a></li>
				<li><a href="#" title="" style="color:#fff;">Les contrats</a></li>
			  </ul>
			</li>
			<li><a href="#" title="">Stock</a></li>
		</ul>
		';
		
?>