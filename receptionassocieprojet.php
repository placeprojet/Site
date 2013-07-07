<?php
  require_once ("nettoyer_post.inc");
  require_once('fcinsertionprojet.php');
  $iddomaine1=$_POST['iddomaine1'];
  $idmetier1=$_POST['idmetier1'];
  $nbassocie=nettoyepost($_POST['nbassocie']);
  $iddomaine2=$_POST['iddomaine2'];
  $idmetier2=$_POST['idmetier2'];
  
  session_start();
 
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
	$_SESSION['iduser']=$iduser;
}
if($_SESSION['idprojet']){
	  $idprojet=$_SESSION['idprojet'];
	  $_SESSION['idprojet'] = $idprojet;
}

enregistrerassocie($idprojet,$nbassocie, $iddomaine1,$idmetier1,$iddomaine2,$idmetier2);
 //echo "situation".$situation."idprojet".$idprojet;
 require_once("entrerprojet.php");
?>
