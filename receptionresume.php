<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
  require_once ("nettoyer_post.inc");
  require_once('fcinsertionprojet.php');
 
  $couttotal=nettoyepost($_POST['couttotal']);
  $financementperso=nettoyepost($_POST['financementperso']);
  $descriptionlongue=nettoyepost($_POST['descriptionlongue']);
  $lienannonce=nettoyepost($_POST['lienannonce']);
  $lienenvironnement=nettoyepost($_POST['lienenvironnement']);
  $lieneconomique=nettoyepost($_POST['lieneconomique']);
  $lienetudemarche=nettoyepost($_POST['lienetudemarche']);
  $associe=$_POST['associe'];
  $avis=$_POST['avis'];
  $retour=$_POST['retour'];
  $adresse=$_POST['adresse'];
  $carte=$_POST['carte'];
  
  session_start();
 
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
	$_SESSION['iduser']=$iduser;
}
if($_SESSION['idprojet']){
	  $idprojet=$_SESSION['idprojet'];
	  $_SESSION['idprojet'] = $idprojet;
}
enregistrerattente($idprojet,$associe, $avis,$retour,$adresse);
enregistrerresumeprojet($idprojet,$couttotal, $financementperso,$lienannonce,$lienenvironnement,$lieneconomique,$lienetudemarche,$descriptionlongue,$carte);
 //echo "situation".$situation."idprojet".$idprojet;
 require_once("entrerprojet.php");
?>
