<?php

require_once('connexionbase.php');
require_once('redimentionneriage.php');
session_start();
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
    $_SESSION['iduser'] = $iduser;
}
if($_SESSION['idprojet']){
	  $idprojet=$_SESSION['idprojet'];
	  $_SESSION['idprojet'] = $idprojet;
}
for ($i=1; $i<5; $i++) {
//  le fichier a  été envoyé et s'y a pas d'erreur
 $image='photo'.$i;
 //echo'div'. $image;
if (isset($_FILES[ $image]) AND $_FILES[ $image]['error'] == 0)
{
        
        if ($_FILES[ $image]['size'] <= 1000000)
        {
                // extension est autorisée
                $infosfichier = pathinfo($_FILES[$image]['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg','JPG','JPEG');
                if (in_array($extension_upload, $extensions_autorisees))
                {					
                  redimensionimage($i,$iduser."photo",$_FILES[ $image]['tmp_name'],120,90);
                  $db = connectbase();
                  $result = $db->query('update projet set photo'.$i.'="'.$iduser.'photo'.$i.'.jpg" where idprojet="'.$idprojet.'"');                                              
                  if (!$result) {
                    throw new Exception('impossible de se connecter a la base ');
                    }
                }
        }       
 }    
        
}

        

require ("entrerprojet.php");


?>
