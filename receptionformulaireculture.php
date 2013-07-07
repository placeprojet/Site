<?php
  require_once ("nettoyer_post.inc");
  require_once('fcinsertionbase.php');
 
  $titre=nettoyepost($_POST['titre']);
  $auteur=nettoyepost($_POST['auteur']);
  $couverture=$_POST['couverture'];
  $film=nettoyepost($_POST['film']);
  $realisateur=nettoyepost($_POST['realisateur']);
  $affiche=$_POST['affiche'];
  $sport=nettoyepost($_POST['sport']);
  $photosport=$_POST['photosport'];
  $musique=$_POST['musique'];
  $peintre=nettoyepost($_POST['peintre']);
  $tableau=$_POST['tableau'];
  $image=$_POST['image'];
  $politique=$_POST['politique'];
   $idmusique=$_POST['idmusique'];
  session_start();
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
	$_SESSION['iduser']=$iduser;
}
//echo "idmusique".$idmusique;
   	
 $idlivre=enregistrerlivre($titre, $auteur, $couverture);
 $idfilm=enregistrerfilm($film, $realisateur, $affiche);
 $idsport=enregistrersport($sport, $photosport);
 if($musique){
 $idmusique=enregistrermusique($musique);
}

 $idpeintre=enregistrerpeintre($peintre,$tableau);
 enregistrerculture($iduser,$idlivre,$idfilm, $idsport, $idmusique, $politique,$idpeintre,$image);
 require_once("pagepersonnelle.php");

?>
