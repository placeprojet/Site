<?php
require_once('connexionbase.php');
function utilisateur1($iduser) {
  $db = connectbase();
  $result = $db->query("select pseudo,passwd,nom,prenom,mail from user where iduser='".$iduser."'");
  $row = $result->fetch_assoc();
  $pseudo=$row['pseudo'];
  $passwd=$row['passwd'];	
  $nom=$row['nom'];
  $prenom=$row['prenom'];
  $mail=$row['mail'];	
	$messagepseudo=$_POST['message'];
	$messagemail=$_POST['messagemail'];
	$messagemdp=$_POST['messagemdp'];
	$messagemdpcarac=$_POST['messagemdpcarac'];
	
             echo'<div class="identite" >
                     <h4>Champs obligatoires :</h4>
			         <form method="post" action="receptionformulaire1.php"><p class="identites">Nom : <span class="number">(privé)</span><br/>
			         <input type="text" name="nom" size="30" maxlength="30"/ value='.$nom.'>
			         </p><br/><p class="identites"><br/>Prénom : <span class="number">(privé)</span><br/>
			         <input type="text" name="prenom" size="30" maxlength="30"/ value='.$prenom.'>
			         </p><br/><p class="identites"><br/>Adresse Mail : <span class="number">(privé)</span><br/>
			         <input type="text" name="email" size="30" maxlength="40"/value='.$mail.'>
			         <br/><span class="message">  '.$messagemail.'</span></p><br/>																	
			       </div>	
			       <div class="identited" >
			        <p class="identites">Pseudonyme :<br/>
			         <input type="text" name="pseudo" size="20" maxlength="30"/ value='.$pseudo.'><br/><span class="message">  '.$messagepseudo.'</span>
			         </p><br/><p class="identites"><br/>Mot de passe <span class="number">(entre 6 et 10 caractères)</span><br/>
			         <input type="password" name="passwd" size="10" maxlength="10"/>
			         <br/><span class="message">  '.$messagemdpcarac.'</span></p><br/><p class="identites"><br/>Confirmer votre mot de passe :<br/>
			         <input type="password" name="passwd2" size="10" maxlength="10"/>
			         <br/> <span class="message">  '.$messagemdp.'</span></p><br/>				         																
			       </div>
			       <div class="identite" >
			       <input type="submit" value="Enregistrer"><br/><br/> 
			       </div>  </form>     
			       <hr/>';
}

?>
