<?php

  require_once('fcinsertionbase.php');
  $pays=$_POST['pays'];
  $idregion=$_POST['idregion'];
  $iddepartement=$_POST['iddepartement'];
  $ville=$_POST['ville'];
  $codepostal=$_POST['codepostal'];
  $portable=$_POST['portable'];
  session_start();
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
	$_SESSION['iduser']=$iduser;
}
//echo "iddepartement".$iddepartement."idregion".$idregion."ville".$ville;
   	               
 enregistrersuite($iduser,$pays,$idregion, $iddepartement, $ville, $codepostal, $portable);
 require_once("pagepersonnelle.php");

?>
