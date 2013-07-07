<?php
 
header("Content-Type: text/html; charset=utf-8");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

$nomlieu="<select name='idlieu'>";
  
$iddomaine = (isset($_POST["iddomaine"])) ? htmlentities($_POST["iddomaine"]) : NULL;
//$iddomainelieu = (isset($_GET["iddomainelieu"])) ? htmlentities($_GET["iddomainelieu"]) : NULL;
  //echo 'iddomaine'.$iddomaine;
if ($iddomaine) {
    mysql_connect('localhost', 'epicier', 'kro1664');
    mysql_select_db('cocreer');
     
    $query = mysql_query("SELECT * FROM lieuactivite WHERE iddomaine='" .$iddomaine. "' ORDER BY nomlieu");
    while ($back = mysql_fetch_assoc($query)) {
        $nomlieu=$nomlieu."<option value=". $back["idlieu"].">".utf8_encode($back["nomlieu"])."</option>\n ";
                 
    }
     $nomlieu=$nomlieu."</select>";
}

 echo $nomlieu;
?>
 

