<?php

function nouvelutilisateurculture($iduser) {
	                $db = connectbase();
                    $result = $db->query("select idlivre,idfilm,idsport,idpeintre,image,idmusique from user where iduser='".$iduser."'");
                    $row = $result->fetch_assoc();
                    
                    $resultlivre = $db->query("select * from livre where idlivre='".$row['idlivre']."'");
                    $livre = $resultlivre->fetch_assoc();
 
                    $resultfilm = $db->query("select * from film where idfilm='".$row['idfilm']."'");
                    $film = $resultfilm->fetch_assoc();
 
                     $resultsport = $db->query("select * from sport where idsport='".$row['idsport']."'");
                    $sport = $resultsport->fetch_assoc();
                    
                    $resultpeintre = $db->query("select * from peintre where idpeintre='".$row['idpeintre']."'");
                    $peintre = $resultpeintre->fetch_assoc();
 
                    /*$resultmusique = $db->query("select * from musique where idmusique='".$row['idmusique']."'");
                    $musique = $resultmusique->fetch_assoc();*/
 	                 $db->close();
	
             echo'
                     <h4>Culture - Loisirs - Positionnement Politique :<span class="number"> (Dévoilez, très peu, votre personnalité)</span></h4>
			         <form method="post" action="receptionformulaireculture.php">
			         
			         <p class="identites"> Votre Livre préféré :<span class="number"> (Titre, auteur, image de couverture)</span> <br/>
			         <div class="culture" >
			         <ul>
			        <li> <input type="text" name="titre" size="20" maxlength="50" value="'.$livre['titre'].'"/> 
			        <input type="text" name="auteur" size="20" maxlength="50" value="'.$livre['auteur'].'"/> 
			         <input type="text" name="couverture" size="20" maxlength="300" value="'.$livre['couverture'].'"/></li>
			          </ul></div>
			         
			         <p class="identites"> Votre Film préféré :<span class="number"> (Titre, réalisateur, image )</span> <br/>
			         <div class="culture" >
			         <ul>
			        <li> <input type="text" name="film" size="20" maxlength="50" value="'.$film['film'].'"/> 
			        <input type="text" name="realisateur" size="20" maxlength="50" value="'.$film['realisateur'].'"/> 
			         <input type="text" name="affiche" size="20" maxlength="300" value="'.$film['affiche'].'"/></li>
			          </ul></div>
			         
			         <p class="identites"> Votre Sport préféré :<span class="number"> (nom, image)</span> <br/>
			         <div class="culture" >
			         <ul>
			        <li> <input type="text" name="sport" size="20" maxlength="50" value="'.$sport['sport'].'"/>
			         <input type="text" name="photosport" size="20" maxlength="300" value="'.$sport['photosport'].'"/> 
			         </li></ul></div>
			         
			         <p class="identites"> Un peintre que vous aimez :<span class="number"> (Nom, image d\'un tableau)</span> <br/>
			         <div class="culture" >
			         <ul>
			        <li> <input type="text" name="peintre" size="20" maxlength="50" value="'.$peintre['peintre'].'"/> 
			         <input type="text" name="tableau" size="20" maxlength="300" value="'.$peintre['tableau'].'"/></li>
			          </ul></div>
			         
			         <p class="identites"> Votre Musique préférée :<span class="number"> (à rechercher sur grooveshark.com)</span> <br/>
			         <div class="culture" >
			         <ul>
			        <li> <input type="text" name="musique" size="20" maxlength="1000" /> </li></ul></div>
			        <input type="hidden" name="idmusique"  value="'.$row['idmusique'].'"/> 
			        <p class="identites"> Une photo, une image, une illustration,... que vous aimez :<span class="number"> </span> <br/>
			         <div class="culture" >
			         <ul>
			        <li> <input type="text" name="image" size="20" maxlength="200" value="'.$row['image'].'"/> </li></ul></div>
			        
			        <p class="identites"> Votre Couleur Politique :<span class="number"> (Privé) </span></br> </p>
			        <p class="identites"> <span class="number">(Important si vous recherchez un(e) partenaire, attention aux couleurs
			        incompaptibles ^^ !)<br/></span></p>
			         <div class="culture" >
			         <ul>
			        <li><INPUT TYPE="radio" NAME="politique" VALUE="663300"><span class="number"> Brun </span><INPUT TYPE="radio" NAME="politique" VALUE="000066">
			        <span class="number"> Bleu foncé </span><INPUT TYPE="radio" NAME="politique" VALUE="2211dd"><span class="number"> Bleu</span>
			        <INPUT TYPE="radio" NAME="politique" VALUE="FF9933"><span class="number"> Orange</span><INPUT TYPE="radio" NAME="politique" VALUE="228855">
			        <span class="number"> Vert</span><INPUT TYPE="radio" NAME="politique" VALUE="aa3677"><span class="number"> Rose</span>
			        <INPUT TYPE="radio" NAME="politique" VALUE="aa0000"><span class="number"> Rouge</span>
			        <INPUT TYPE="radio" NAME="politique" VALUE="000000"><span class="number"> Noir</span>
			        </li></ul></div>
			         <div class="culture" ><input type="submit" value="Enregistrer"><br/><br/> </div>
			           </form>     
			       <hr/>';
}

?>
