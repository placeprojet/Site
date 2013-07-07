<?php
header("Content-Type: text/html; charset=utf-8");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

$metier="<select name='idmetier'>";

$iddomaine = (isset($_POST["iddomaine"])) ? htmlentities($_POST["iddomaine"]) : NULL;
//$iddomaine = (isset($_GET["iddomaine"])) ? htmlentities($_GET["iddomaine"]) : NULL;
 
if ($iddomaine) {
    mysql_connect('localhost', 'epicier', 'kro1664');
    mysql_select_db('cocreer');
     
    $query = mysql_query("SELECT * FROM metiers WHERE iddomaine='" .$iddomaine. "' ORDER BY nommetier");
    while ($retour = mysql_fetch_assoc($query)) {
        $metier=$metier."<option value=". $retour['idmetier'].">".utf8_encode($retour['nommetier'])."</option>\n ";
    }  
              
}
 $metier=$metier."</select>";      
 echo $metier;
?>
 

