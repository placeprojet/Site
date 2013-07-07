<?php

function donneepersonnelle($iduser) {
	                $db = connectbase();
                    $result = $db->query("select annee,civil,enfant from user where iduser='".$iduser."'");
                    $row = $result->fetch_assoc();

 	                 $db->close();
 	                 if($row['civil'][0]="C"){$c="selected";}
 	                  if($row['civil'][0]="M"){$m="selected";}
 	                   if($row['civil'][0]="D"){$d="selected";}
 	                    if($row['civil'][0]="P"){$p="selected";} 
 	                    if($row['civil'][0]="V"){$v="selected";}
	
             echo'
                      <div class="personnellex" >
				    <h4>Données personnelles : <span class="number"> (si vous les remplissez, elles apparaîtront)</span></h4>
		             <form method="post" action="receptiondonneepersonnelle.php">
		               <div class="personnelle" ><br/>
		               <p class="personnelles">Année de naissance<span class="number"></span></p>
		               <input type="text" name="annee" size="4" maxlength="5"value="'.$row['annee'].'">
                       </div>
                       
                       
                       <div class="personnelled" ><br/>    
                       <p class="personnelles">Situation familliale : <span class="number"></span></p>
		               <select name="civil" id="civil" >
					   <option value="Célibataire" '.$c.'>Célibataire</option>     
                       <option value="Marié(e)" '.$m.'>Marié(e)</option>            
                       <option value="Divorcé(e)" '.$d.'>Divorcé(e)</option>
                       <option value="Pacsé(e)" '.$p.'>Pacsé(e)</option>
                       <option value="Vie maritale" '.$v.'>Vie maritale</option>
                       </select> 
                       <br/><br/>
                       
                       <p class="personnelles">Nombre d\'enfants :<span class="number"></span></p>
		               <input type="text" name="enfant" size="1" maxlength="1"value="'.$row['enfant'].'">
		               </div> 
                        
                        
                       

				   <div class="personnelle" >
			       <input type="submit" value="Enregistrer"><br/><br/> 
		           </form>	
		           </div>
		                 	
		         </div>
			       
		         <hr/>';
}

?>
