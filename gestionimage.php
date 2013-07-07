<?php

require_once('connexionbase.php');
require_once('redimentionneriage.php');
session_start();
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
    $_SESSION['iduser'] = $iduser;
}

//  le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
        // Tsi le fichier n'est pas trop gros
        if ($_FILES['monfichier']['size'] <= 1000000)
        {
                // si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg');
                if (in_array($extension_upload, $extensions_autorisees))
                {					
                  redimensionimage($iduser,"avatar",$_FILES['monfichier']['tmp_name'],90,120);
                  $db = connectbase();
                  $result = $db->query("update user set avatar='avatar".$iduser.".jpg' where iduser='".$iduser."'");                                              
                  if (!$result) {
                    throw new Exception('impossible de se connecter a la base ');
                    }
                }
        }       
 }    
        

  
  if (isset($_FILES['maphoto']) AND $_FILES['maphoto']['error'] == 0)
{
        // si le fichier n'est pas trop gros
        if ($_FILES['maphoto']['size'] <= 1000000)
        {
                //si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['maphoto']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg');
                if (in_array($extension_upload, $extensions_autorisees))
                {					
                  redimensionimage($iduser,"photo",$_FILES['maphoto']['tmp_name'],90,120);
                  $db = connectbase();
                  $result = $db->query("update user set photo='photo".$iduser.".jpg' where iduser='".$iduser."'");                                              
                  if (!$result) {
                    throw new Exception('impossible de se connecter a la base ');
                    }
                }
        }       
 }    
        

require ("pagepersonnelle.php");


?>
