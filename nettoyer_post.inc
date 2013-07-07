<?php


// nettoye le nom renvoye par post
function nettoyepost($nettoye) {
    //echo "<p>".$nettoye." à nettoye</p>";
    if (!$nettoye) {
     return $nettoye;
     //exit;
  }

  if (!get_magic_quotes_gpc()) {
    $nettoye = addslashes($nettoye);

  }
 return $nettoye;
}
?>

