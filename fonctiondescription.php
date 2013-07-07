<?php
function description($iduser) {
	                $db = connectbase();
                    $result = $db->query("select descriptionlongue,descriptioncourte,devise from user where iduser='".$iduser."'");
                    $row = $result->fetch_assoc();
                    
                   
 	                 $db->close();
	
             echo'
                     
			         <form method="post" action="receptiondescription.php">
			         
			         <p class="descriptions"> Description longue : <span class="number"> (Apparaîtra dans la page de votre profil)</span> <br/></p>
			         <div class="description" >
			        <textarea name="descriptionlongue" id="descriptionlongue" rows="20" cols="100"> '.$row['descriptionlongue'].'</textarea></div>
			        <p class="descriptions"> <br/><br/>Résumé de votre description : <span class="number"> (Apparaîtra dans les fiches de vos projets)</span><br/>
			         <div class="description" >
			         <textarea name="descriptioncourte" id="descriptioncourte" rows="3" cols="70">'.$row['descriptioncourte'].'</textarea></div>
			         <div class="description" ><input type="submit" value="Enregistrer"><br/><br/> </div>
			         <p class="descriptions"> <br/><br/>Une devise, une phrase projet, une phrase aimée... : <span class="number"> 
			         (Apparaîtra dans la page de votre profil)</span><br/></p>
			         <div class="description" >
			         <textarea name="devise" id="devise" rows="3" cols="70">'.$row['devise'].'</textarea></div>
			         <div class="description" ><input type="submit" value="Enregistrer"><br/><br/> </div>
			           </form>     
			       <hr/>';
}
?>
