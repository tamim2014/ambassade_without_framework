<?php

 echo '
   <table class="tablegauche"  name="listes" > 
    <caption style="caption-side:top"> 
	     <font color="#FFFFFF">
		     <h3> UNION DES COMORES  </h3>
			 <h6> Unité-Solidarité-Développement  </h6>
			 <h4> AMBASSADE DES COMORES  </h4>
		 </font>
		 <img src="img/armoirie.png"  />
	</caption>
		 
	 <tr><td> </td><td><font color="##1D702D"> <b>Demandeur:</b></font></td> <td> </td></tr>
	 <tr><td> Nom   </td> <td> <input type="text" name="nom_demandeur"  > </td></tr>
	 <tr><td> Pr&eacute;nom  </td> <td> <input type="text" name="prenom_demandeur"  ></td></tr>
	 <tr><td> Montant  </td> <td> <input type="text" name="montant"  ></td></tr>
	 
	 <tr><td> </td><td><font color="##1D702D"> <b>Observation:</b></font></td> <td> </td></tr>	
	 <tr><td ></td> <td>
		 <fieldset class="cadre" style ="margin-bottom:1px;" >
			<legend>Codes observation</legend>
			<div  style="background-color: #e5eecc;"  class="cadre2" >
				<select title="ob" name="observation" >
					<option></option>
					<option>PP+CNI</option>
					<option>CNI</option>
				</select>
			</div>
		</fieldset>	 
	 </td></tr>
	 
	 	<tr><td> </td><td><font color="##1D702D"> <b>Fiche Export:</b></font></td> <td> </td></tr>	
	 <tr><td ></td> <td>
		 <fieldset class="cadre" style ="margin-bottom:1px;" >
			<legend>Lot et Date</legend>
			<div  style="background-color: #e5eecc;"  class="cadre2" >
				<select title="lot" name="lot" >
				    <option></option>
					<option>001</option>
					<option>002</option>
					<option>003</option>
					<option>004</option>
					<option>005</option>
					<option>006</option>
					<option>007</option>
					<option>008</option>
					<option>009</option>
					<option>010</option>
				</select>				
				<input type="date"  name="date_export" style="background-color:#FFFFFF ; height:18px;"/>
								
			</div>
		</fieldset>	 
	 </td></tr>
	
 </table>
  
';
 
?>
	 
        
		
     