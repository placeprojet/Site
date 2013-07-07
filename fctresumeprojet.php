<?php
function resumeprojet($idprojet) {
	

	                $db = connectbase();
                    $result = $db->query("select couttotal,financementperso,descriptionlongue,lienannonce,lienenvironnement,lienetudemarche,lieneconomique,carte 
                    from projet where idprojet='".$idprojet."'");
                    $row = $result->fetch_assoc();
                    $resultattente = $db->query("select * from attente where idprojet='".$idprojet."'");
                    $attente = $resultattente->fetch_assoc();
                    
                    if ($attente['associe']==1){
                     $ass="checked";
                     }
                     if ($attente['avis']==1){
                     $av="checked";
                      }
                     if ($attente['retour']==1){
                      $re="checked";
                       }
                     if ($attente['adresse']==1){
                      $ad="checked";
                      }
             echo'
                     <h4>Résumé :<span class="number"> </span></h4>
			         <form method="post" action="receptionresume.php">
			         
			         <p class="resumes"> Vous recherchez sur le site :<span class="number"> </span></br> </p>
			        <p class="identites"> <span class="number"></span></p>
			         
			         <ul>
			        <li><INPUT TYPE="checkbox" NAME="associe" VALUE="1" '.$ass.'><span class="number"> Un(e) ou des associés </span>
			        <INPUT TYPE="checkbox" NAME="avis" VALUE="1" '.$av.'>
			        <span class="number"> Des avis </span><INPUT TYPE="checkbox" NAME="retour" VALUE="1" '.$re.'><span class="number"> Des retours d\'expérience</span>
			        <INPUT TYPE="checkbox" NAME="adresse" VALUE="1" '.$ad.'><span class="number"> Des adresses utiles</span>
			        </li></ul>
			         
			         <div class="resume" >
                       <p class="resumes">Coût Total : <span class="number">(prévu)</span><br/>
			         <input type="text" name="couttotal" size="20" maxlength="20" value="'.$row['couttotal'].'">			         
			         </p><br/>													
			         </div>
			         
			         <div class="resumed" ><br/> 
			        <p class="resumes">Financement personnel : <span class="number">(prévu)</span><br/>
			         <input type="text" name="financementperso" size="20" maxlength="20" value="'.$row['financementperso'].'">			         
			         </p><br/>
        		     </div>
			         			         
			         
			         <p class="resumes"> Description longue : <span class="number"> (Apparaîtra sur la page de votre projet)</span> <br/>
			         <div class="resume" >
			        <textarea name="descriptionlongue" id="descriptionlongue" rows="20" cols="100">'.$row['descriptionlongue'].'</textarea></div>
			        <p class="resumes"> <br/><br/>Liens en complément : <span class="number">(s\'ils existent) </span><br/></p>
			        <div class="resume" >
			       <ul>
			        <li><span class="number"> Lien vers l\'annonce du local : </span> <br/>
			         
			          <input type="text" name="lienannonce" size="20" maxlength="200" value="'.$row['lienannonce'].'"> </li>
			          </ul></div>
			         <div class="resumed" ><ul>
			        <li><span class="number"> Lien vers la région de votre projet : </span><br/> 
			         <input type="text" name="lienenvironnement" size="20" maxlength="200" value="'.$row['lienenvironnement'].'"></li>
			          </ul></div>
			         
			         <div class="resume" >
			       <ul>
			        <li><span class="number"> Lien "économique"  : </span> <br/>
			         
			          <input type="text" name="lieneconomique" size="20" maxlength="200" value="'.$row['lieneconomique'].'"> </li>
			          </ul></div>
			         <div class="resumed" ><ul>
			        <li><span class="number"> Etude de marché : </span> <br/>
			         <input type="text" name="lienetudemarche" size="20" maxlength="200" value="'.$row['lienetudemarche'].'"></li>
			          </ul></div>
			           <ul>
			        <li><p class="resumes"> Carte de situation "Google Maps" : <span class="number"> (Code : lien, URL abrégée)</span> <br/><br/></p>
			         </li>
			          </ul>
			          <input type="text" name="carte" size="40" maxlength="60" value="'.$row['carte'].'">
			        
			           <div class="projet" >
			       <input type="submit" value="Enregistrer"><br/><br/> 
			     </div></form>
		           
		       </div> <hr/>';
}
?>
