<?php
  require_once ("nettoyer_post.inc");
  require_once('fcinsertionprojet.php');
  $iddpe=$_POST['iddpe'];
  $idges=$_POST['idges'];
  $prixachat=nettoyepost($_POST['prixachat']);
  $superficie=nettoyepost($_POST['superficie']);
  $idetat=nettoyepost($_POST['idetat']);
  
  session_start();
 
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
	$_SESSION['iduser']=$iduser;
}
if($_SESSION['idprojet']){
	  $idprojet=$_SESSION['idprojet'];
	  $_SESSION['idprojet'] = $idprojet;
}

enregistrerlocal2($idprojet,$idetat, $superficie,$prixachat,$idges,$iddpe);
 //echo "situation".$situation."idprojet".$idprojet;
 require_once("entrerprojet.php");
?>
