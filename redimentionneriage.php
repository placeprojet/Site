<?php
function redimensionimage($iduser,$nom,$image,$NouvelleLargeur,$NouvelleHauteur) {
                   $ImageChoisie = imagecreatefromjpeg($image);
                   $TailleImageChoisie = getimagesize($image);
                   $NouvelleImage = imagecreatetruecolor($NouvelleLargeur , $NouvelleHauteur) or die ("Erreur");
                   imagecopyresampled($NouvelleImage , $ImageChoisie,0,0, 0,0,$NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0],$TailleImageChoisie[1]);
                   imagejpeg($NouvelleImage , '/var/www/essai/img/'.$nom.$iduser.'.jpg', 100);
                   return true;
                
              
}
?>
 

