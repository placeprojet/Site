

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
    <?php
  require_once ("nettoyer_post.inc");
  require_once('fcinsertionprojet.php');
  $iddomaine=$_POST['iddomaine'];
  $date=date ('Y-m-d');
  $idlieu=nettoyepost($_POST['idlieu']);
  $descriptioncourte=nettoyepost($_POST['descriptioncourte']);
  //$descriptioncourte=utf8_encode($descriptioncourte);
  $nomprojet=nettoyepost($_POST['nomprojet']);
  $crearep=$_POST['crearep'];
  $idsecteur=$_POST['idsecteur'];
  session_start();
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
	$_SESSION['iduser']=$iduser;
}
if ($_SESSION['idprojet']){
	$idprojet=$_SESSION['idprojet'];
	$_SESSION['idprojet']=$idprojet;
	modifierprojetobligatoires($idprojet,$descriptioncourte,$crearep, $idlieu,$iddomaine,$nomprojet,$idsecteur);
}
if(!$_SESSION['idprojet']){
 $idprojet=enregistrerprojet($iduser,$descriptioncourte,$crearep, $idlieu,$iddomaine,$nomprojet,$date,$idsecteur);
}
 //echo "iddomaine".$iddomaine."idlieu".$idlieu;
 require_once("entrerprojet.php");
?>
