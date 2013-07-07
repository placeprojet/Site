<?php

  require_once('fcinsertionbase.php');
  $annee=$_POST['annee'];
  $civil=$_POST['civil'];
  $enfant=$_POST['enfant'];
  
  session_start();
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
	$_SESSION['iduser']=$iduser;
}

   	
 enregistrerdonneepersonnelle($iduser,$annee,$civil, $enfant);
 require_once("pagepersonnelle.php");

?>
