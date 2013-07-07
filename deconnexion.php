<?php
$_POST['iduser']='';

session_start();
unset($_SESSION['iduser']);
unset($_SESSION['idprojet']);
unset($_SESSION['idvisiteur']);
$url=$_POST['url'];
  if($url=='projet.php'){
  $_GET['idprojet']=$_POST['idprojet'];
  $_POST['idprojet']='';
  }
  if($url=='mapage.php'){
  $idconstructeur=$_POST['idconstructeur'];
  $_POST['idconstructeur']=$idconstructeur;
  }
$_POST['idprojet']='';  
session_destroy();
$idprojet='';
//echo $url;
require ($url);


?>
