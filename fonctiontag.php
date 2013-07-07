<?php
function tag($iduser) {
	                $db = connectbase();
                    $result = $db->query("select qualite1,qualite2,default1,default2 from user where iduser='".$iduser."'");
                    $row = $result->fetch_assoc();
                    
                   $resulttag = $db->query("select tag from tag where (idtag='".$row['qualite1']."' or idtag='".$row['qualite2']."' or idtag='".$row['default1']."'
                     or idtag='".$row['default2']."')");
                     $num_results = $resulttag->num_rows;
                     If ($num_results!=0){
						 for ($i=0; $i <$num_results; $i++) {
	                      $ttag = $resulttag->fetch_assoc();
	                      $tag[$i]=$ttag['tag'];
						 }
				     }
				   
 	                 $db->close();
	
             echo'
                     <h4>Votre Profil :<span class="number"> (Vos qualités, vos défaults, votre c.v., vos motivations...)</span></h4>
			         <form method="post" action="receptiontag.php">
			         
			         <p class="descriptions"> Vos qualités :<span class="number"> (2 qualités)</span> <br/>
			         <div class="culture" >
			         <ul>
			        <li> <input type="text" name="qualite1" size="20" maxlength="20" value="'. $tag[0].'"/> 
			        <input type="text" name="qualite2" size="20" maxlength="50" value="'. $tag[1].'"/> 
			         </li>
			          </ul></div>
			         
			         <p class="descriptions"> Vos défaults :<span class="number"> (2 défaults)</span> <br/>
			         <div class="culture" >
			         <ul>
			        <li> <input type="text" name="default1" size="20" maxlength="50" value="'. $tag[2].'"/> 
			        <input type="text" name="default2" size="20" maxlength="50" value="'. $tag[3].'"/> 
			         </li>
			          </ul></div>
			         <div class="description" ><input type="submit" value="Enregistrer"><br/><br/> </div>
			           </form>     
			       <hr/>';
}
?>
