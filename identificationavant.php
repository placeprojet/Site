<?php
require_once('connexionbase.php');
  $pseudo=$_POST['pseudo'];
  $passwd=$_POST['passwd'];
  $idprojet=$_POST['idprojet'];
  $url=$_POST['url'];
  
  $db = connectbase();
  $result = $db->query("select iduser from user where pseudo='".$pseudo."'and passwd='".sha1($passwd)."'");
  $row = $result->fetch_assoc();
  
  $iduser=$row['iduser']; 
  if(!$iduser){
  $url='pagepersonnelle.php';
  }
  if($url=='projet.php'){
  $_GET['idprojet']=$idprojet;
  }
  if($url=='mapage.php'){
  $idconstructeur=$_POST['idconstructeur'];
  $_POST['idconstructeur']=$idconstructeur;
  }
  session_start();
  $_SESSION['iduser'] = $iduser;
  //echo $url;
  require_once($url);
  
?>
