<?php

require_once('connexionbase.php');
function word($min_length, $max_length) {
 /*echo'<div id="lieuBox">
    <p id="domaineslieu">
        <select id="domainelieu" onchange="demandelieu(this);">
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
    </p>
    <p id="lieuactivite"> 
    
    </p>
</div>';*/	
}
function enregistrer($nom, $prenom, $username, $email, $password) {
  $db = connectbase();
  // check if username is unique
  $result = $db->query("select * from user where pseudo='".$username."'");
  if (!$result) {
    throw new Exception('pas de connection');
  }
  if ($result->num_rows>0) {
	  //echo $username;
    throw new Exception('Ce surnom est utilisé, choisissez en un autre');
  }
  $result = $db->query("insert into user (pseudo,passwd,nom,prenom,mail) values ('".$username."','".sha1($password)."', '".$nom."','".$prenom."','".$email."')");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  }
   //echo "<br>toto".$iduser;
  $iduser=$db->insert_id;
  //$result->free();
   //echo "toto".$iduser;
  $resulvisiteur = $db->query("insert into visiteur (iduser,v1,v2,v3,v4,v5,v6,v7,v8,v9) values ('".$iduser."',0,0,0,0,0,0,0,0,0)"); 
  if (!$resulvisiteur) {
    throw new Exception('impossible de se connecter a la base ');
  }
  //echo "toto".$iduser;
  //$resulvisiteur->free();
  //$db->close();
  return $iduser;
}
function modifieridentite($iduser, $prenom, $pseudo, $email, $passwd) {
// register new person with db
// return true or error message

  // connect to db
  $conn = connectbase();

  // check if username is unique
 
  $result = $conn->query("update user set  mail='".$email."',prenom='".$prenom."',pseudo='".$pseudo."',passwd='".sha1($passwd)."' where iduser='".$iduser."'");
                                               
  if (!$result) {
    throw new Exception('impossible de modifier');
  }

  return true;
}

function enregistrerprofetude($iduser,$idlangue,$idlangue2, $idetudes, $iddomaine, $idmetier) {
  $db = connectbase();
  $result = $db->query("update user set idlangue='".$idlangue."', idlangue2='".$idlangue2."',idetudes='".$idetudes."',iddomaine='".$iddomaine."',idmetier='".$idmetier."' 
  where iduser='".$iduser."'");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');  
  } 
   //echo "iddepartement".$idlangue.$idlangue2.$idetudes.$iddomaine.$idmetier;  
  $db->close(); 
  return true;
}

function enregistrerlivre($titre, $auteur, $couverture) {
  $db = connectbase();
  $result = $db->query("insert into livre (titre,auteur,couverture) values ('".$titre."','".$auteur."','".$couverture."')");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  } 
  $idlivre=$db->insert_id;
 //echo "titre".$titre."idfilm".$idfilm."idlivre".$idlivre; 
  $db->close(); 
  return $idlivre;
}

function enregistrertag($tag) {
	if($tag){
  $db = connectbase();
  $returntag=$db->query('SELECT * FROM tag where tag="'.$tag.'"'); 
  $num_results = $returntag->num_rows;
                     If ($num_results!=0){ 
						for ($i=0; $i <$num_results; $i++) {
	                      $ttag = $returntag->fetch_assoc();
	                      $idtag[$i]=$ttag['idtag'];
						 }
						$idtag=$idtag[0]; 
				     } 
				     else{
                           $result = $db->query("insert into tag (tag) values ('".$tag."')");                                               
                         if (!$result) {
                          throw new Exception('impossible de se connecter a la base ');
                         } 
                         $idtag=$db->insert_id;
                         
                      }
    } 
  else{
	  $idtag=0;
  }
  $db->close();
  return $idtag;
  
}

function enregistrertags($iduser,$idqualite1,$idqualite2, $iddefault1, $iddefault2) {
  $db = connectbase();
  $result = $db->query("update user set qualite1='".$idqualite1."', qualite2='".$idqualite2."', default1='".$iddefault1."' , default2='".$iddefault2."'
  where iduser='".$iduser."'");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  } 
  
  $db->close(); 
  return true;
}

function enregistrermusique($musique) {
  $db = connectbase();
  $result = $db->query("insert into musique (musique) values ('".$musique."')");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  } 
  $idmusique=$db->insert_id; 
  $db->close(); 
  return $idmusique;
}

function enregistrersport($sport, $photosport) {
  $db = connectbase();
  $result = $db->query("insert into sport (sport,photosport) values ('".$sport."','".$photosport."')");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  } 
  $idsport=$db->insert_id;  
  $db->close(); 
  return $idsport;
}

function enregistrerpeintre($peintre,$tableau) {
  $db = connectbase();
  $result = $db->query("insert into peintre (peintre,tableau) values ('".$peintre."','".$tableau."')");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  } 
  $idpeintre=$db->insert_id;  
  $db->close(); 
  return $idpeintre;
}

function enregistrerfilm($film, $realisateur, $affiche) {
  $db = connectbase();
  $result = $db->query("insert into film (film,realisateur,affiche) values ('".$film."','".$realisateur."','".$affiche."')");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  } 
  $idfilm=$db->insert_id;  
  $db->close(); 
  return $idfilm;
}

function enregistrersuite($iduser,$pays,$idregion, $iddepartement, $ville, $codepostal, $portable) {
  $db = connectbase();
  $result = $db->query("update user set pays='".$pays."', ville='".$ville."',codepostal='".$codepostal."',portable='".$portable."',idregion='".$idregion."',
  iddepartement='".$iddepartement."'where iduser='".$iduser."'");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  } 
  
  $db->close(); 
  return true;
}

function enregistrerdonneepersonnelle($iduser,$annee,$civil, $enfant) {
  $db = connectbase();
  $result = $db->query("update user set annee='".$annee."', civil='".$civil."', enfant='".$enfant."' where iduser='".$iduser."'");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  } 
  
  $db->close(); 
  return true;
}

function enregistrerculture($iduser,$idlivre,$idfilm, $idsport, $idmusique, $politique,$idpeintre,$image) {
  $db = connectbase();
  $result = $db->query("update user set idlivre='".$idlivre."', idfilm='".$idfilm."',idsport='".$idsport."',idmusique='".$idmusique."',politique='".$politique."'
  ,idpeintre='".$idpeintre."',image='".$image."'
  where iduser='".$iduser."'");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  } 
  
  $db->close(); 
  return true;
}

function enregistrerdescription($iduser,$descriptioncourte, $descriptionlongue,$devise) {
  $db = connectbase();
  $result = $db->query("update user set descriptioncourte='".$descriptioncourte."',descriptionlongue='".$descriptionlongue."',devise='".$devise."'
  where iduser='".$iduser."'");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  } 
  
  $db->close(); 
  return true;
}



function enregistrerclient($nom, $prenom,$username, $email, $password, $codepostal, $ville, $telephone, $portable, $description) {
// register new person with db
// return true or error message

  // connect to db
  $conn = connectbase();

  // check if username is unique
  $result = $conn->query("select * from client where username='".$username."'");
  if (!$result) {
    throw new Exception('Could not execute query');
  }

  if ($result->num_rows>0) {
    throw new Exception('Ce surnom est utilisé, choisissez en un autre');
  }

  // if ok, put in db
  $result = $conn->query("insert into client values
                         (NULL,'".$nom."','".$prenom."','".$username."',sha1('".$password."'), '".$email."','".$codepostal."','".$ville."','".$telephone."','".$portable."','".$description."')");
                        //INSERT INTO `epicerie`.`user` (`iduser`, `username`, `passwd`, `email`, `codepostal`, `ville`, `telephone`, `portable`, `description`) 
                         //VALUES (NULL, 'lulu', '222222', 'lulu.lu@orange.fr', '0', '', '0', NULL, '');
  if (!$result) {
    throw new Exception('Could not register you in database - please try again later.');
  }

  return true;
}


function login($username, $password) {
// check username and password with db
// if yes, return true
// else throw exception
// connect to db
// check if username is unique
$conn = connectbase();
$result = $conn->query("select * from user where username='".$username."'and passwd = sha1('".$password."')");
  if (!$result) {
     throw new Exception('Could not log you in.');
  }
  if ($result->num_rows>0) {
     return true;
  } else {
     throw new Exception('Could not log you in.');
  }
}

function check_valid_user($conten) {
// see if somebody is logged in and notify them if not
  global $contenu;
  if (isset($_SESSION['valid_user']))  {
    $contenu =$conten.'Vous &ecirc;tes connect&eacute; sous le pseudonyme : '.$_SESSION["valid_user"].'<br />';
    return $contenu;
  } else {
     // they are not logged in
     do_html_heading($contenu, 'Problem:');
     $contenu =$conten.'Vous n\'&ecirc;tes plus connect&eacute;<br />';
     do_html_url($contenu, 'login.php', 'Login');
     do_html_footer($contenu);
     exit;
  }
}

function change_password($username, $old_password, $new_password) {
// change password for username/old_password to new_password
// return true or false

  // if the old password is right
  // change their password to new_password and return true
  // else throw an exception
  login($username, $old_password);
  $conn = connectbase();
  $result = $conn->query("update user
                          set passwd = sha1('".$new_password."')
                          where username = '".$username."'");
  if (!$result) {
    throw new Exception('Password could not be changed.');
  } else {
    return true;  // changed successfully
  }
}

function get_random_word($min_length, $max_length) {
// grab a random word from dictionary between the two lengths
// and return it

   // generate a random word
  $word = '';
  // remember to change this path to suit your system
  $dictionary = '/usr/dict/words';  // the ispell dictionary
  $fp = @fopen($dictionary, 'r');
  if(!$fp) {
    return false;
  }
  $size = filesize($dictionary);

  // go to a random location in dictionary
  $rand_location = rand(0, $size);
  fseek($fp, $rand_location);

  // get the next whole word of the right length in the file
  while ((strlen($word) < $min_length) || (strlen($word)>$max_length) || (strstr($word, "'"))) {
     if (feof($fp)) {
        fseek($fp, 0);        // if at end, go to start
     }
     $word = fgets($fp, 80);  // skip first word as it could be partial
     $word = fgets($fp, 80);  // the potential password
  }
  $word = trim($word); // trim the trailing \n from fgets
  return $word;
}

function reset_password($username) {
// set password for username to a random value
// return the new password or false on failure
  // get a random dictionary word b/w 6 and 13 chars in length
  $new_password = get_random_word(6, 13);

  if($new_password == false) {
    throw new Exception('Could not generate new password.');
  }

  // add a number  between 0 and 999 to it
  // to make it a slightly better password
  $rand_number = rand(0, 999);
  $new_password .= $rand_number;

  // set user's password to this in database or return false
  $conn = connectbase();
  $result = $conn->query("update user
                          set passwd = sha1('".$new_password."')
                          where username = '".$username."'");
  if (!$result) {
    throw new Exception('Could not change password.');  // not changed
  } else {
    return $new_password;  // changed successfully
  }
}

function notify_password($username, $password) {
// notify the user that their password has been changed

    $conn = connectbase();
    $result = $conn->query("select email from user
                            where username='".$username."'");
    if (!$result) {
      throw new Exception('Could not find email address.');
    } else if ($result->num_rows == 0) {
      throw new Exception('Could not find email address.');
      // username not in db
    } else {
      $row = $result->fetch_object();
      $email = $row->email;
      $from = "From: support@phpbookmark \r\n";
      $mesg = "Your PHPBookmark password has been changed to ".$password."\r\n"
              ."Please change it next time you log in.\r\n";

      if (mail($email, 'PHPBookmark login information', $mesg, $from)) {
        return true;
      } else {
        throw new Exception('Could not send email.');
      }
    }
}

?>
