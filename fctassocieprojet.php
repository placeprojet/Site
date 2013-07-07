<?php

function fctassocieprojet($idprojet) {
	                $db = connectbase();
                    $results = $db->query("select nbassocie,iddomaine1,idmetier1,iddomaine2,idmetier2 
                    from projet where idprojet='".$idprojet."'");
                    $rows = $results->fetch_assoc();

             
                      echo' <div class="projetx" ><br/>
		          <form method="post" action="receptionassocieprojet.php">
		          <h4>Associé(e)s recherché(e)s : <span class="number"></span></h4>
					  
			         
                       <p class="projets">Nombre <span class="number">(idéal) </span>: 
			         <input type="text" name="nbassocie" size="2" maxlength="2" value="'.$rows['nbassocie'].'">			         
			         </p><br/>';
			         echo' <div class="projet" >
			         <p class="projets">Domaine professionnel 1 :<span class="number"></span><br/></p>
			        
                          <select name="iddomaine1" id="iddomaine1" onchange="demande(this);">
                             <option value="none">Selection</option>';
                                       
                             mysql_connect('localhost', 'epicier', 'kro1664');
                             mysql_select_db('cocreer');                
                             $quer = mysql_query("SELECT * FROM domaines");
                             while ($bac = mysql_fetch_assoc($quer)) {
								 if($bac['iddomaine']==$rows['iddomaine1']){$select1="selected";}else{$select1="";}
                              echo "\t\t<option value=" . $bac['iddomaine'] . " ".$select1.">" . utf8_encode($bac['nomdomaine']) . "</option>\n";
                             }
                             ?>          
                          </select>      
                        
                       <p class="projets">	Métier : </p> 
                      <p id="metie"> </p>
                     <p id='met'>
                     <?php
                     if($rows['iddomaine1']){//echo"rows['iddomaine1']".$rows['iddomaine1']."rows['idmetier1']".$rows['idmetier1'];
						 $iddomaine1=$rows['iddomaine1'];
						 echo"<select name='idmetier1'>";
						 mysql_connect('localhost', 'epicier', 'kro1664');
                          mysql_select_db('cocreer');
                         $que = mysql_query("SELECT * FROM metiers WHERE iddomaine='" .$iddomaine1. "' ORDER BY nommetier");
                        
                           while ($retou = mysql_fetch_assoc($que)) {
							if($retou['idmetier']==$rows['idmetier1']){$selec="selected";}else{$selec="";}   
                          echo"<option value=". $retou['idmetier']." ".$selec.">".utf8_encode($retou['nommetier'])."</option>\n ";
                        }
                        echo"</select>"; 
					}
					echo"</p>";
					
                    echo' </div>
				          <script type="text/javascript" src="metiers.js"></script>';
			    
			         echo'<div class="projetd" >
			       <p class="projets">Domaine professionnel 2 :<span class="number"></span><br/></p>
			        
                          <select name="iddomaine2" id="iddomaine2" onchange="demand(this);">
                             <option value="none">Selection</option>';
                                       
                             mysql_connect('localhost', 'epicier', 'kro1664');
                             mysql_select_db('cocreer');                
                             $quer2 = mysql_query("SELECT * FROM domaines");
                             while ($bac2 = mysql_fetch_assoc($quer2)) {
								 if($bac2['iddomaine']==$rows['iddomaine2']){$select2="selected";}else{$select2="";}
                              echo "\t\t<option value=" . $bac2['iddomaine'] . " ".$select2.">" . utf8_encode($bac2['nomdomaine']) . "</option>\n";
                             }
                             ?>          
                          </select>      
                        
                       <p class="projets">	Métier : </p> 
                      <p id="meti"> </p>
                     <p id='me'>
                     <?php
                     if($rows['iddomaine2']){
						 $iddomaine2=$rows['iddomaine2'];
						 echo"<select name='idmetier2'>";
						 mysql_connect('localhost', 'epicier', 'kro1664');
                          mysql_select_db('cocreer');
                         $que2 = mysql_query("SELECT * FROM metiers WHERE iddomaine='" .$iddomaine2. "' ORDER BY nommetier");
                           while ($retour2 = mysql_fetch_assoc($que2)) {
							if($retour2['idmetier']==$rows['idmetier2']){$selec2="selected";}else{$selec2="";}   
                          echo"<option value=". $retour2['idmetier']." ".$selec2.">".utf8_encode($retour2['nommetier'])."</option>\n ";
                        }
                        echo"</select>";
					}
					echo"</br></br></br></p>";
					
                    echo' </div>
				          <script type="text/javascript" src="metier.js"></script>';
			    
			    
			    
			    
			     echo'<div class="projet" >
			       <input type="submit" value="Enregistrer"><br/><br/> 
			     </div></form>
		           </div>
		       <hr/>';
		       
		   }
?>
