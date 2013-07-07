<?php
  // include function files for this application
  require_once('fonctionsenregistrerformulaireperso.php');

  //create short variable names
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  $passwd=$_POST['passwd'];
  $passwd2=$_POST['passwd2'];
  $codepostal=$_POST['codepostal'];
  $ville=$_POST['ville'];
  $telephone=$_POST['telephone'];
  $portable=$_POST['portable'];
  $description=$_POST['description'];
  
  // start session which may be needed later
  // start it now because it must go before headers
  session_start();
  try   {
    // check forms filled in
    if (!filled_out($_POST) and !$_SESSION['iduser']) {
      throw new Exception('You have not filled the form out correctly - please go back and try again.');
    }

    // email address not valid
    if (!valid_email($email)) {
      throw new Exception('That is not a valid email address.  Please go back and try again.');
    }

    // passwords not the same
    if ($passwd != $passwd2 and !$_SESSION['iduser']) {
      throw new Exception('The passwords you entered do not match - please go back and try again.');
    }

    // check password length is ok
    // ok if username truncates, but passwords will get
    // munged if they are too long.
    if (((strlen($passwd) < 6) || (strlen($passwd) > 16))  and !$_SESSION['iduser']) {
      throw new Exception('Your password must be between 6 and 16 characters Please go back and try again.');
    }
    if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
    modifieridentite($iduser,$nom, $prenom, $username, $email, $codepostal, $ville, $telephone, $portable, $description);
    $_SESSION['iduser']=$iduser;
    require ("perso.php");
    }
    else {
		register($nom, $prenom, $username, $email, $passwd, $codepostal, $ville, $telephone, $portable, $description);
    }
    // register session variable
    $_SESSION['valid_user'] = $username;

    // provide link to members page
    do_html_header($contenu,'Vous &ecirc;tes enregistr&eacute;');
    $contenu =$contenu.'Vous &ecirc;tes enregistr&eacute;.  Allez &agrave; la page des producteurs et entrez vos produits';
    //do_html_url($contenu, 'member.php', 'Allez à la page des membres');

   // end page
   do_html_footer($contenu);
   require ("accueil.inc");
  }
  catch (Exception $e) {
     do_html_header($contenu,'Problem:');
     echo $e->getMessage();
     do_html_footer($contenu);
     require ("accueil.inc");
     exit;
  }
?>
