<?php
  require_once ("nettoyer_post.inc");
  require_once('fcinsertionprojet.php');
  $iddpe=$_POST['iddpe'];
  $idges=$_POST['idges'];
  $loyerfonds=nettoyepost($_POST['loyerfonds']);
  $coutfonds=nettoyepost($_POST['coutfonds']);
  $ca=nettoyepost($_POST['ca']);
  $rnet=nettoyepost($_POST['rnet']);
  $ebe=nettoyepost($_POST['ebe']);
  $chargesf=nettoyepost($_POST['chargesf']);
  $mb=nettoyepost($_POST['mb']);
  $consommations=nettoyepost($_POST['consommations']);
  $impot=nettoyepost($_POST['impot']);
  
  session_start();
 
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
	$_SESSION['iduser']=$iduser;
}
if($_SESSION['idprojet']){
	  $idprojet=$_SESSION['idprojet'];
	  $_SESSION['idprojet'] = $idprojet;
}

enregistrereconomiques($idprojet,$loyerfonds, $coutfonds,$ca,$rnet,$ebe,$chargesf,$mb,$consommations,$impot);
 //echo "situation".$situation."idprojet".$idprojet;
 require_once("entrerprojet.php");
?>
