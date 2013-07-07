<?php

function fctdonneeprojet($idprojet) {
	                $db = connectbase();
                    $result = $db->query("select investissementtotal,amenagemateriel,amenagemobilier,amenagefoncier,embauche,contrat,juridique,impot,crearep 
                    from projet where idprojet='".$idprojet."'");
                    $row = $result->fetch_assoc();
$crearep=$row['crearep'];
 if ($crearep==1) {
    $crea="actuelles";
   
  }
  
 else if ($crearep==2) {
	 $crea="prévisionnelles";
   
  }
             
                      echo' <div class="projetx" ><br/>
		          <form method="post" action="receptionprojetprojet.php">
		          <h4>Le projet : <span class="number"></span></h4>
					  
			         <div class="projet" >
                       <p class="projets">Aménagement foncier :<span class="number">(Coût prévu)</span><br/>
			         <input type="text" name="amenagefoncier" size="20" maxlength="20" value="'.$row['amenagefoncier'].'">			         
			         </p><br/>
			        <p class="projets">Aménagement mobilier :<span class="number">(Coût prévu)</span><br/>
			         <input type="text" name="amenagemobilier" size="20" maxlength="20" value="'.$row['amenagemobilier'].'">			         
			         </p><br/>
			         <p class="projets">Investissement en matériels :<span class="number">(Coût prévu)</span><br/>
			         <input type="text" name="amenagemateriel" size="20" maxlength="20" value="'.$row['amenagemateriel'].'">			         
			         </p><br/>
			         <p class="projets">Investissement total :<span class="number">(Coût prévu)</span><br/>
			         <input type="text" name="investissementtotal" size="20" maxlength="20" value="'.$row['investissementtotal'].'">			         
			         </p><br/>
			         
                     
                       														
			    </div>
			    
			    <div class="projetd" ><br/> 
			        <p class="projets">Embauche(s) prévue(s) :<br/>
			         <input type="text" name="embauche" size="30" maxlength="100"value="'.$row['embauche'].'">
			         </p><br/><p class="projets"><br/>Contrat d\'investissement proposé :<br/>
			         <input type="text" name="contrat" size="25" maxlength="100"value="'.$row['contrat'].'">
			         </p><br/><p class="projets"><br/>Structure juridique proposée :<span class="number"></span><br/>
			         <input type="text" name="juridique" size="30" maxlength="100"value="'.$row['juridique'].'">
			         </p>			         																
			      </div>
			    
			    
			    
			    
			     <div class="projet" >
			       <input type="submit" value="Enregistrer"><br/><br/> 
			     </div></form>
		           
		       </div> <hr/>';
		       
		   }
?>
