
  <div class="genre" >
                     <h4>Champs obligatoires :</h4>
			         <form method="post" action="receptionprojet1.php">
					<p class="identites">Nom court de votre projet:<span class="number">(Chez Lulu, Charpentes Dubois, Les Experts... peut-être modifié)</span><br/>
			         <input type="text" name="nom" size="30" maxlength="100"/><br/>
			         <p class="genres">Votre projet est une :<span class="number"></span><br/>
			          <INPUT TYPE="radio" NAME="crearep" VALUE="1"><span class="number"> Création<INPUT TYPE="radio" NAME="crearep" VALUE="2">Reprise </span>
			          
			          
		<div class="resume" >
			          <p class="genres">Secteur d'activité<span class="number"></span></p>
		            <select name="idsecteur" id="idetat" >
		             <option value="0">Selection</option>
					 <?php  mysql_connect('localhost', 'epicier', 'kro1664');
                               mysql_select_db('cocreer');
                              $query = mysql_query("SELECT idsecteur,secteur FROM secteurs");
                               while ($secteurs = mysql_fetch_assoc($query)) {
								   if($secteurs['idsecteur']==$row['secteur']){$select="selected";}else{$select="";}
                                    echo "\t\t\t\t<option value=" . $secteurs['idsecteur'] . " ".$select.">" . utf8_encode($secteurs['secteur']) ."</option>\n";
                                 }  
				   echo' </select><br/><br/> </div>';
				   ?>	          
		<div class="resumed" >	          
        
			<p class="genres">Domaine et lieu de l'activité :<span class="number"></span><br/>
              <p id="domaineslieu">
             <select  name='iddomaine'id="iddomaine" onchange="demandelieu(this);">
             <option value="none">Selection</option>
              <?php               
                mysql_connect('localhost', 'epicier', 'kro1664');
                mysql_select_db('cocreer');
                 
                $query = mysql_query("SELECT * FROM domaines");
                while ($back = mysql_fetch_assoc($query)) {
                    echo "\t\t\t\t<option value=\"" . $back["iddomaine"] . "\">" . utf8_encode($back["nomdomaine"]) . "</option>\n";
                }
              ?>          
             </select>      
    
        <p class="genres" id="lieuactivite"> &nbsp;<br/>
    
        </p>
       <script type="text/javascript" src="lieuactivite.js"></script>  
     
     </div>	
     
     <p class="genres"> <br/><br/>Une présentation courte de votre projet : <span class="number"> (Important : apparaîtra dans la fiche de votre projet)</span><br/>
			         <div class="description" >
			         <textarea name="descriptioncourte" id="descriptioncourte" rows="3" cols="70"></textarea></div>
			         <div class="description" ><input type="submit" value="Enregistrer"><br/><br/> </div>
			           </form>     
			       <hr/>




