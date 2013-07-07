<?php
  require_once ("nettoyer_post.inc");
  require_once('fcinsertionprojet.php');
  $idregion=$_POST['idregion'];
  $iddepartement=$_POST['iddepartement'];
  $pays=nettoyepost($_POST['pays']);
  $ville=nettoyepost($_POST['ville']);
  $type=nettoyepost($_POST['type']);
  $situation=nettoyepost($_POST['situation']);
  $codepostal=nettoyepost($_POST['codepostal']);
  $environnement=nettoyepost($_POST['environnement']);
  session_start();
 
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
	$_SESSION['iduser']=$iduser;
}
if($_SESSION['idprojet']){
	  $idprojet=$_SESSION['idprojet'];
	  $_SESSION['idprojet'] = $idprojet;
}

enregistrerlocal1($idprojet,$idregion, $iddepartement,$codepostal,$ville,$type,$pays,$situation,$environnement);
 //echo "situation".$situation."idprojet".$idprojet;
 require_once("entrerprojet.php");
?>
