<?php
  require_once ("nettoyer_post.inc");
  require_once('fcinsertionbase.php');
 
  $descriptionlongue=nettoyepost($_POST['descriptionlongue']);
  $descriptioncourte=nettoyepost($_POST['descriptioncourte']);
  $devise=nettoyepost($_POST['devise']);
  session_start();
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
	$_SESSION['iduser']=$iduser;
}
//echo "titre".$titre."idfilm".$idfilm."politique".$politique;
   	
 enregistrerdescription($iduser,$descriptioncourte, $descriptionlongue,$devise);
 require_once("pagepersonnelle.php");

?>
