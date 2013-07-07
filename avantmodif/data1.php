<?php
header("Content-Type: text/html; charset=utf-8");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

$metier1="<select name='idmetier1'>";

$iddomaine1 = (isset($_POST["iddomaine1"])) ? htmlentities($_POST["iddomaine1"]) : NULL;
//$iddomaine = (isset($_GET["iddomaine"])) ? htmlentities($_GET["iddomaine"]) : NULL;
 
if ($iddomaine1) {
    mysql_connect('localhost', 'epicier', 'kro1664');
    mysql_select_db('cocreer');
     
    $query = mysql_query("SELECT * FROM metiers WHERE iddomaine='" .$iddomaine1. "' ORDER BY nommetier");
    while ($retour = mysql_fetch_assoc($query)) {
        $metier1=$metier1."<option value=". $retour['idmetier'].">".utf8_encode($retour['nommetier'])."</option>\n ";
    }  
              
}
 $metier1=$metier1."</select>";      
 echo $metier1;
?>
 

