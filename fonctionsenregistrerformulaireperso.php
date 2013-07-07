<?php

require_once('db_fns.php');


function modifieridentiteclient($iduser,$nom, $prenom, $username, $email, $codepostal, $ville, $telephone, $portable, $description) {
// register new person with db
// return true or error message

  // connect to db
  $conn = db_connect();

  // check if username is unique
  
  $result = $conn->query("update client set username='".$username."', email='".$email."',codepostal='".$codepostal."',ville='".$ville."',telephone='".$telephone."',
                         portable='".$portable."',description='".$description."',nom='".$nom."',prenom='".$prenom."' where idclient='".$iduser."'");
                                               
  if (!$result) {
    throw new Exception('impossible de modifier');
  }

  return true;
}

function modifieridentite($iduser,$nom, $prenom, $username, $email, $codepostal, $ville, $telephone, $portable, $description) {
// register new person with db
// return true or error message

  // connect to db
  $conn = db_connect();

  // check if username is unique
  
  $result = $conn->query("update user set username='".$username."', email='".$email."',codepostal='".$codepostal."',ville='".$ville."',telephone='".$telephone."',
                         portable='".$portable."',description='".$description."',nom='".$nom."',prenom='".$prenom."' where iduser='".$iduser."'");
                                                
  if (!$result) {
    throw new Exception('impossible de modifier');
  }

  return true;
}


function register($nom, $prenom, $username, $email, $password, $codepostal, $ville, $telephone, $portable, $description) {
// register new person with db
// return true or error message

  // connect to db
  $conn = db_connect();

  // check if username is unique
  $result = $conn->query("select * from user where username='".$username."'");
  if (!$result) {
    throw new Exception('Could not execute query');
  }

  if ($result->num_rows>0) {
    throw new Exception('Ce surnom est utilisé, choisissez en un autre');
  }

  // if ok, put in db
  $result = $conn->query("insert into user values (NULL,'".$username."',sha1('".$password."'), '".$email."','".$codepostal."','".$ville."','".$telephone."',
                                                   '".$portable."','".$description."','".$nom."','".$prenom."')");
                                                
  if (!$result) {
    throw new Exception('Could not register you in database - please try again later.');
  }

  return true;
}

function enregistrerclient($nom, $prenom,$username, $email, $password, $codepostal, $ville, $telephone, $portable, $description) {
// register new person with db
// return true or error message

  // connect to db
  $conn = db_connect();

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
$conn = db_connect();
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
  $conn = db_connect();
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
  $conn = db_connect();
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

    $conn = db_connect();
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
