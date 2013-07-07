<?php
  require_once ("nettoyer_post.inc");
  require_once('fcinsertionprojet.php');
 
  $amenagefoncier=nettoyepost($_POST['amenagefoncier']);
  $amenagemobilier=nettoyepost($_POST['amenagemobilier']);
  $amenagemateriel=nettoyepost($_POST['amenagemateriel']);
  $investissementtotal=nettoyepost($_POST['investissementtotal']);
  $embauche=nettoyepost($_POST['embauche']);
  $contrat=nettoyepost($_POST['contrat']);
  $juridique=nettoyepost($_POST['juridique']);
 
  
  session_start();
 
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
	$_SESSION['iduser']=$iduser;
}
if($_SESSION['idprojet']){
	  $idprojet=$_SESSION['idprojet'];
	  $_SESSION['idprojet'] = $idprojet;
}

enregistrerprojetprojet($idprojet,$amenagefoncier, $amenagemobilier,$amenagemateriel,$investissementtotal,$embauche,$contrat,$juridique);
 //echo "situation".$situation."idprojet".$idprojet;
 require_once("entrerprojet.php");
?>
