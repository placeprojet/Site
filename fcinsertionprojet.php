<?php

require_once('connexionbase.php');

function modifieridentiteclient($iduser,$nom, $prenom, $username, $email, $codepostal, $ville, $telephone, $portable, $description) {
// register new person with db
// return true or error message

  // connect to db
  $conn = connectbase();

  // check if username is unique
  
  $result = $conn->query("update client set username='".$username."', email='".$email."',codepostal='".$codepostal."',ville='".$ville."',telephone='".$telephone."',
                         portable='".$portable."',description='".$description."',nom='".$nom."',prenom='".$prenom."' where idclient='".$iduser."'");
                                               
  if (!$result) {
    throw new Exception('impossible de modifier');
  }

  return true;
}

function enregistrerattente($idprojet,$associe, $avis,$retour,$adresse) {
  $conn = connectbase();
  $query ="update attente set associe='".$associe."', avis='".$avis."',retour='".$retour."',adresse='".$adresse."' where idprojet='".$idprojet."'";
  //echo $query;
  $result = $conn->query($query);                                               
  if (!$result) {
    throw new Exception('impossible de modifier');
  }
  return true;
}

function enregistrereconomiques($idprojet,$loyerfonds, $coutfonds,$ca,$rnet,$ebe,$chargesf,$mb,$consommations,$impot) {
  $conn = connectbase();
  $query ="update projet set loyerfonds='".$loyerfonds."', coutfonds='".$coutfonds."',ca='".$ca."',rnet='".$rnet."',ebe='".$ebe."',
  chargesf='".$chargesf."',mb='".$mb."',consommations='".$consommations."',impot='".$impot."' where idprojet='".$idprojet."'";
  //echo $query;
  $result = $conn->query($query);                                               
  if (!$result) {
    throw new Exception('impossible de modifier');
  }
  return true;
}

function enregistrerprojetprojet($idprojet,$amenagefoncier, $amenagemobilier,$amenagemateriel,$investissementtotal,$embauche,$contrat,$juridique) {
  $conn = connectbase();
  $query ="update projet set amenagefoncier='".$amenagefoncier."', amenagemobilier='".$amenagemobilier."',amenagemateriel='".$amenagemateriel."',
  investissementtotal='".$investissementtotal."',embauche='".$embauche."',contrat='".$contrat."',juridique='".$juridique."' where idprojet='".$idprojet."'";
  //echo $query;
  $result = $conn->query($query);                                               
  if (!$result) {
    throw new Exception('impossible de modifier');
  }
  return true;
}

function enregistrerresumeprojet($idprojet,$couttotal, $financementperso,$lienannonce,$lienenvironnement,$lieneconomique,$lienetudemarche,$descriptionlongue,$carte) {
  $conn = connectbase();
  $query ="update projet set couttotal='".$couttotal."', financementperso='".$financementperso."',lienannonce='".$lienannonce."',
  lienenvironnement='".$lienenvironnement."',lieneconomique='".$lieneconomique."',lienetudemarche='".$lienetudemarche."',carte='".$carte."',
  descriptionlongue='".$descriptionlongue."' where idprojet='".$idprojet."'";
  //echo $query;
  $result = $conn->query($query);                                               
  if (!$result) {
    throw new Exception('impossible de modifier');
  }
  return true;
}
                          
function enregistrerlocal1($idprojet,$idregion, $iddepartement,$codepostal,$ville,$type,$pays,$situation,$environnement) {
  $conn = connectbase();
  $query ="update projet set idregion='".$idregion."', iddepartement='".$iddepartement."',codepostal='".$codepostal."',ville='".$ville."',type='".$type."',
  pays='".$pays."',environnement='".$environnement."',situation='".$situation."' where idprojet='".$idprojet."'";
  //echo $query;
  $result = $conn->query($query);                                               
  if (!$result) {
    throw new Exception('impossible de modifier');
  }
  return true;
}

function enregistrerassocie($idprojet,$nbassocie, $iddomaine1,$idmetier1,$iddomaine2,$idmetier2) {
  $conn = connectbase();
  $query ="update projet set nbassocie='".$nbassocie."', iddomaine1='".$iddomaine1."', idmetier1='".$idmetier1."', iddomaine2='".$iddomaine2."',
  idmetier2='".$idmetier2."' where idprojet='".$idprojet."'";
  //echo $query;
  $result = $conn->query($query);                                               
  if (!$result) {
    throw new Exception('impossible de modifier');
  }
  return true;
}

function enregistrerlocal2($idprojet,$idetat, $superficie,$prixachat,$idges,$iddpe) {
  $conn = connectbase();
  $query ="update projet set idetat='".$idetat."', superficie='".$superficie."',prixachat='".$prixachat."',idges='".$idges."',
  iddpe='".$iddpe."' where idprojet='".$idprojet."'";
  //echo $query;
  $result = $conn->query($query);                                               
  if (!$result) {
    throw new Exception('impossible de modifier');
  }
  return true;
}

function modifieridentite($iduser,$nom, $prenom, $username, $email, $codepostal, $ville, $telephone, $portable, $description) {
// register new person with db
// return true or error message

  // connect to db
  $conn = connectbase();

  // check if username is unique
  
  $result = $conn->query("update user set username='".$username."', email='".$email."',codepostal='".$codepostal."',ville='".$ville."',telephone='".$telephone."',
                         portable='".$portable."',description='".$description."',nom='".$nom."',prenom='".$prenom."' where iduser='".$iduser."'");
                                                
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

function enregistrersuite($iduser,$pays,$idregion, $iddepartement, $ville, $telephone, $portable) {
  $db = connectbase();
  $result = $db->query("update user set pays='".$pays."', ville='".$ville."',telephone='".$telephone."',portable='".$portable."',idregion='".$idregion."',
  iddepartement='".$iddepartement."'where iduser='".$iduser."'");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  } 
  
  $db->close(); 
  return true;
}

function enregistrerculture($iduser,$idlivre,$idfilm, $idsport, $idmusique, $politique) {
  $db = connectbase();
  $result = $db->query("update user set idlivre='".$idlivre."', idfilm='".$idfilm."',idsport='".$idsport."',idmusique='".$idmusique."',politique='".$politique."'
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

function choixprojet($iduser) {
  $db = connectbase();
  // check if username is unique
  $result = $db->query("select idprojet,nomprojet from projet where iduser='".$iduser."'");
 
  if (!$result) {
    throw new Exception('pas de connection');
  }
  else if ($result->num_rows==0) {
	
	$idprojet=0;
	return $idprojet;  
  }
  else if ($result->num_rows==1) {
	$row = $result->fetch_assoc(); 
	$idprojet=$row['idprojet'];  
	return $idprojet;  
  }
  else if ($result->num_rows>1) {
	 
	return $result;
     }   
  }
  


function enregistrer($nom, $prenom, $username, $email, $password) {
  $db = connectbase();
  // check if username is unique
  $result = $db->query("select * from user where pseudo='".$username."'");
  if (!$result) {
    throw new Exception('pas de connection');
  }
  if ($result->num_rows>0) {
	  echo $username;
    throw new Exception('Ce surnom est utilisé, choisissez en un autre');
  }
  $result = $db->query("insert into user (pseudo,passwd,nom,prenom,mail) values ('".$username."','".sha1($password)."', '".$nom."','".$prenom."','".$email."')");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  }
  $result = $db->query("select iduser from user where pseudo='".$username."'and passwd = sha1('".$password."')");
  $row = $result->fetch_assoc();
  $iduser=$row['iduser'];
  //echo "toto".$iduser;
  $result->free();
  $db->close();
  return $iduser;
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

                           
function enregistrerprojet($iduser,$descriptioncourte,$crearep, $idlieu,$iddomaine,$nomprojet,$date,$idsecteur) {
  $db = connectbase();
  $result = $db->query("insert into projet (iduser,nomprojet,textcourt,idlieu,iddomaine,crearep,date,idsecteur) values ('".$iduser."','".$nomprojet."','".$descriptioncourte."',
  '".$idlieu."'
  ,'".$iddomaine."','".$crearep."','".$date."','".$idsecteur."')");                                               
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  } 
  $idprojet=$db->insert_id;
 //echo "titre".$titre."idfilm".$idfilm."idlivre".$idlivre; 
 $resulvisiteur = $db->query("insert into visiteurprojet (idprojet,v1,v2,v3,v4,v5,v6,v7,v8,v9) values ('".$idprojet."',0,0,0,0,0,0,0,0,0)"); 
  if (!$resulvisiteur) {
    throw new Exception('impossible de se connecter a la base ');
  }
  $resulattente = $db->query("insert into attente (idprojet,associe,avis,retour,adresse) values ('".$idprojet."',0,0,0,0)"); 
  if (!$resulattente) {
    throw new Exception('impossible de se connecter a la base ');
  }
  $db->close(); 
  return $idprojet;
}
                                   
function modifierprojetobligatoires($idprojet,$descriptioncourte,$crearep, $idlieu,$iddomaine,$nomprojet,$idsecteur) {
  $db = connectbase();
  $query = "update projet set textcourt='".$descriptioncourte."', crearep='".$crearep."',idlieu='".$idlieu."',iddomaine='".$iddomaine."'
  ,nomprojet='".$nomprojet."',idsecteur='".$idsecteur."' where idprojet='".$idprojet."'";
  //echo $query; 
  $result = $db->query($query);
                                                 
  if (!$result) {
    throw new Exception('impossible de se connecter a la base ');
  } 
  
  $db->close(); 
  return true;
}

?>
