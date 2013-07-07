 <?php  
$db = connectbase();
  // check if username is unique
  $result = $db->query("select nomprojet,textcourt,iddomaine,idlieu,crearep,idsecteur from projet where idprojet='".$idprojet."'");
  if (!$result) {
    throw new Exception('pas de connection');
  }
  
 else {
	$row = $result->fetch_assoc(); 
	$nomprojet=$row['nomprojet']; 
	$textcourt=$row['textcourt']; 
	$iddomaine=$row['iddomaine']; 
	$idlieu=$row['idlieu']; 
	$crearep=$row['crearep'];
	$idsecteur=$row['idsecteur'];
  }
  if ($crearep==1) {
    $crea="CHECKED";
    $rep="";
  }
  
 else if ($crearep==2) {
	 $crea="";
    $rep="CHECKED";
  }
   
 echo' <div class="genre" >
                     <h4>Champs obligatoires :</h4>
			         <form method="post" action="receptionprojet1.php">
					<p class="identites">Nom court de votre projet:<span class="number">(Chez Lulu, Charpentes Dubois, Les Experts... peut-être modifié)</span></p>
			         <input type="text" name="nomprojet" size="30" maxlength="100" value="'.$nomprojet.'">
			          <p class="genres">Votre projet est une :<span class="number"></span></p>
			          <INPUT TYPE="radio" NAME="crearep" VALUE="1" '.$crea.'><span class="number"> Création 
			          <INPUT TYPE="radio" NAME="crearep" VALUE="2" '.$rep.'>Reprise</span></p>
			          
			          
		<div class="resume" >
			          <p class="genres">Secteur d\'activité :<span class="number"></span></p>
		            <select name="idsecteur" id="idetat" >
		             <option value="0">Selection</option>';
					  mysql_connect('localhost', 'epicier', 'kro1664');
                               mysql_select_db('cocreer');
                              $query = mysql_query("SELECT idsecteur,secteur FROM secteurs");
                               while ($secteurs = mysql_fetch_assoc($query)) {
								   if($secteurs['idsecteur']==$row['idsecteur']){$select="selected";}else{$select="";}
                                    echo "\t\t\t\t<option value=" . $secteurs['idsecteur'] . " ".$select.">" . utf8_encode($secteurs['secteur']) ."</option>\n";
                                 }  
				   echo' </select><br/><br/><br/> </div>';
				  	    	          
			          
			          
			          
			          
			          
			          
         echo' <div class="resumed" >
			<p class="genres">Domaine et lieu de l\'activité :<span class="number"></span><br/></p>
              <p id="domaineslieu">
             <select  name="iddomaine"id="iddomaine" onchange="demandelieu(this);">
             <option value="none">Selection</option>';
                            
                mysql_connect('localhost', 'epicier', 'kro1664');
                mysql_select_db('cocreer');
                $query = mysql_query("SELECT * FROM domaines");
                while ($back = mysql_fetch_assoc($query)) {
					if($back['iddomaine']==$iddomaine){$select="selected";} else{$select="";}
                    echo '\t\t\t\t<option value="' . $back["iddomaine"] . ' "'.$select.'>' . utf8_encode($back["nomdomaine"]) . '</option>\n';
                }
              ?>          
             </select>  </p>    
              
        <p class="genres" id="lieuactivite"> </p>
         <p id='lieuac'>
                     <?php
                     if($row['idlieu']){
						 
						 echo"<select name='idlieu'>";
						 mysql_connect('localhost', 'epicier', 'kro1664');
                          mysql_select_db('cocreer');
                         $que = mysql_query("SELECT * FROM lieuactivite WHERE iddomaine='" .$row['iddomaine']. "' ORDER BY nomlieu");
                           while ($retour = mysql_fetch_assoc($que)) {
							if($retour['idlieu']==$idlieu){$select="selected";} else{$select="";}  
                          echo"<option value=". $retour['idlieu']." ".$select.">".utf8_encode($retour['nomlieu'])."</option>\n ";
                        }
                        echo"</select>";
					}
					echo"</p>";
					?>
        <script type="text/javascript" src="lieuactivite.js"></script> 
     </div>	
     <p class="genres"> <br/><br/>Une présentation courte de votre projet : <span class="number"> (Important : apparaîtra dans la fiche de votre projet)</span><br/>
			         <div class="description" >
						 <?php
			         echo'<textarea name="descriptioncourte" id="descriptioncourte" rows="3" cols="70">'.$textcourt.'</textarea></div>
			         <div class="description" ><input type="submit" value="Modifier">';
			          ?> 
			         <br/><br/> </div>
			           </form>     
			       <hr/>


