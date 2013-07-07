<?php
header("Content-Type: text/html; charset=utf-8");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

$metier2="<select name='idmetier2'>";

$iddomaine2 = (isset($_POST["iddomaine2"])) ? htmlentities($_POST["iddomaine2"]) : NULL;
//$iddomaine = (isset($_GET["iddomaine"])) ? htmlentities($_GET["iddomaine"]) : NULL;
 
if ($iddomaine2) {
    mysql_connect('localhost', 'epicier', 'kro1664');
    mysql_select_db('cocreer');
     
    $query2 = mysql_query("SELECT * FROM metiers WHERE iddomaine='" .$iddomaine2. "' ORDER BY nommetier");
    while ($retour2 = mysql_fetch_assoc($query2)) {
        $metier2=$metier2."<option value=". $retour2['idmetier'].">".utf8_encode($retour2['nommetier'])."</option>\n ";
    }  
              
}
 $metier2=$metier2."</select>";      
 echo $metier2;
?>
 

