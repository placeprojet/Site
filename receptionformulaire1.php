<?php
  require_once('fcverificationform.php');
  require_once('fcinsertionbase.php');
  require_once('connexionbase.php');
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $email=$_POST['email'];
  $pseudo=$_POST['pseudo'];
  $passwd=$_POST['passwd'];
  $passwd2=$_POST['passwd2'];
  
  session_start();
  $db = connectbase();
  if ($_SESSION['iduser']){
  $result = $db->query("select pseudo from user where iduser='".$_SESSION['iduser']."'");
  $row = $result->fetch_assoc();
  $pseudoancien=$row['pseudo'];
  }
  $resultp = $db->query("select pseudo from user where pseudo='".$pseudo."'");
  $num_resultp = $resultp->num_rows;
  $db->close();
  
  
    
    if (!filled_out($_POST)) {
      $message='formulaire incomplet';
       require_once("pagepersonnelle.php");
    }

    // email address not valid
    if (!valid_email($email)) {
      $message='votre addresse mail est invalide';
       $_POST['messagemail']=$message;
       require_once("pagepersonnelle.php");
    }
    if ($num_resultp!=0 and $pseudo!=$pseudoancien) {
		$message="Ce pseudo est utilisé";
       $_POST['message']=$message;
       require_once("pagepersonnelle.php");
     
    }
   
    if ($passwd != $passwd2 ) {
      $message='vos mots de passe sont diff&eacute;rents';
             $_POST['messagemdp']=$message;
       require_once("pagepersonnelle.php");

    }
    if (((strlen($passwd) < 6) || (strlen($passwd) > 16))) {
      $message='mot de passe entre 6 and 16 caract&egrave;res';
       $_POST['messagemdpcarac']=$message;
    }
    if ( $_SESSION['iduser']){ 
	 $iduser=$_SESSION['iduser'];
     modifieridentite($iduser, $prenom, $pseudo, $email, $passwd);
   //echo "update user set  mail='".$email."',prenom='".$prenom."',pseudo='".$pseudo."',passwd='".sha1($passwd)."' where iduser='".$iduser."'"; 
     $_SESSION['iduser']=$iduser;
    require_once("pagpersonnelle.php");
    }
    else {
		
     $iduser=enregistrer($nom, $prenom, $pseudo, $email, $passwd);
    
    if($iduser){
     
    $_SESSION['iduser'] = $iduser;
     }
    //echo "lulu".$iduser;

   require_once ("pagepersonnelle.php");
  }
  
  /*catch (Exception $e) {
      $e->getMessage();
      exit;
    
  }*/
  
?>
