<?php

  require_once('fcinsertionbase.php');
  $qualite1=$_POST['qualite1'];
  $qualite2=$_POST['qualite2'];
  $default1=$_POST['default1'];
  $default2=$_POST['default2'];
  
  session_start();
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
	$_SESSION['iduser']=$iduser;
}
//echo "qualite1".$qualite1."default1".$default1."default2".$default2;
  $idqualite1=enregistrertag($qualite1);
  $idqualite2=enregistrertag($qualite2); 	
  $iddefault1=enregistrertag($default1); 	
  $iddefault2=enregistrertag($default2); 	
 enregistrertags($iduser,$idqualite1,$idqualite2, $iddefault1, $iddefault2);
 require_once("pagepersonnelle.php");

?>
