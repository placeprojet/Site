<?php

 
//header("Content-Type: text/plain"); // Utilisation d'un header pour spécifier le type de contenu de la page. Ici, il s'agit juste de texte brut (text/plain).
 
$variable1 = (isset($_GET["variable1"])) ? $_GET["variable1"] : "non";
$variable2 = (isset($_GET["variable2"])) ? $_GET["variable2"] : "oui";
 
if ($variable1 && $variable2) {
    // Faire quelque chose...
    echo $variable1;
    
} else {
    echo $variable2;
}
 
?>
