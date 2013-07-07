


               <div class="identite" >
                     <h4>Vos Coordonnées :</h4>
			         <form method="post" action="receptionformulaire2.php"><p class="identites">Nom :<br/>
			         <input type="text" name="nom" size="30" maxlength="100"/>
			         </p><br/><p class="identites"><br/>Pays :<br/>
			         <input type="text" name="pays" size="30" maxlength="100"/>			         
			         </p><br/><p class="identites"><br/>Région - Département :<br/>
			         
     <script type="text/javascript" src="oxhr.js"></script>
     <script type="text/javascript" src="region.js"></script>
    <div id="regionBox">
      <p id="editors">
        <select id="region" onchange="request(this);">
            <option value="none">Selection</option>
            <?php               
                mysql_connect('localhost', 'epicier', 'kro1664');
               mysql_select_db('cocreer');
                 
                $query = mysql_query("SELECT * FROM regions");
                while ($back = mysql_fetch_assoc($query)) {
                    echo "\t\t\t\t<option value=\"" . $back["region_id"] . "\">" . utf8_encode($back["nom"]) . "</option>\n";
                }
            ?>          
        </select>      
    </p>
    <p id="departements">        
    </p>
</div>
<br/><br/><br/>
			         <input type="text" name="email" size="30" maxlength="100"/>
			         </p><br/>																	
			       </div>	
			       <div class="identited" >
			        <p class="identites">Ville :<br/>
			         <input type="text" name="ville" size="30" maxlength="100"/>
			         </p><br/><p class="identites"><br/>Télephone <span class="number">(entre 6 et 10 caractères)</span><br/>
			         <input type="text" name="telephone" size="30" maxlength="100"/>
			         </p><br/><p class="identites"><br/>Portable :<br/>
			         <input type="text" name="portable" size="30" maxlength="100"/>
			         </p><br/>				         																
			       </div>
			       <div class="identite" >
			       <input type="submit" value="Enregistrer"><br/><br/> 
			       </div>  </form>     
			       <hr/>



