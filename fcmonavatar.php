<?php
require_once('connexionbase.php');
function avatar($iduser) {
$db = connectbase();	
$result = $db->query("select pseudo,avatar from user where iduser='".$iduser."'");
  $row = $result->fetch_assoc();
   
  $avatar=$row['avatar'];
  $result->free();
  $db->close();
 return $row;
}

function visiteur($iduse) {
 echo'<div class="visiteur">
				      Visiteurs :
		</div>
        
         <div class="visiteurs">';
			 
        
        $db = connectbase();
        $resultvisiteur = $db->query("select * from visiteur where iduser='".$iduse."'");
        $visiteur = $resultvisiteur->fetch_assoc();   
	    for ($i=1; $i <10; $i++) {
	    $visiteurs=$visiteur['v'.$i];
	    If($visiteurs!=0){
	    $idvirtuellevisiteurs=avatar($visiteurs);
        $avatarvisiteurs="img/".$idvirtuellevisiteurs['avatar'];
        $pseudovisiteurs=$idvirtuellevisiteurs['pseudo'];
          echo'<a href="mapage.php?pseudo='.$pseudovisiteurs.'"><img src="'.$avatarvisiteurs.'"  style="height:40px"/></a></br>'. $pseudovisiteurs.'</br>
          </br>';
	     }
	    
        }
         $db->close();
        
    echo'</div>';
}

function visiteurprojet($idproje) {
 echo'<div class="visiteur">
				      Visiteurs :
		</div>
        
         <div class="visiteurs">';
			 
        
        $db = connectbase();
        $resultvisiteurprojet = $db->query("select * from visiteurprojet where idprojet='".$idproje."'");
        $visiteurprojet = $resultvisiteurprojet->fetch_assoc();   
	    for ($i=1; $i <10; $i++) {
	    $visiteursprojet=$visiteurprojet['v'.$i];
	    If($visiteursprojet!=0){
	    $idvirtuellevisiteursprojet=avatar($visiteursprojet);
        $avatarvisiteursprojet="img/".$idvirtuellevisiteursprojet['avatar'];
        $pseudovisiteursprojet=$idvirtuellevisiteursprojet['pseudo'];
          echo'<a href="mapage.php?pseudo='.$pseudovisiteursprojet.'"><img src="'.$avatarvisiteursprojet.'"  style="height:40px"/></a></br>'. $pseudovisiteursprojet.'</br>
          </br>';
	     }
	    
        }
         $db->close();
        
    echo'</div>';
}
?>
 

