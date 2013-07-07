<?php

  require_once('fcinsertionbase.php');
  $iddomaine=$_POST['iddomaine'];
  $idmetier=$_POST['idmetier'];
  $idetudes=$_POST['idetudes'];
  $idlangue2=$_POST['idlangue2'];
  $idlangue=$_POST['idlangue'];
  
  session_start();
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
	$_SESSION['iduser']=$iduser;
}

   	
 enregistrerprofetude($iduser,$idlangue,$idlangue2, $idetudes, $iddomaine, $idmetier);
 require_once("pagepersonnelle.php");

?>
