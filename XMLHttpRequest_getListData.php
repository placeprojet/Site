
<?php
header("Content-Type: text/html; charset=utf-8");
header("Cache-Control: no-cache");
header("Pragma: no-cache");


$dep="<select name='iddepartement'>";
  
$region_id = (isset($_POST["region_id"])) ? htmlentities($_POST["region_id"]) : NULL;
//$region_id = (isset($_GET["region_id"])) ? htmlentities($_GET["region_id"]) : NULL;
$_POST["idregion"]=$region_id;
if ($region_id) {
    mysql_connect('localhost', 'epicier', 'kro1664');
    mysql_select_db('cocreer');
     
    $query = mysql_query("SELECT * FROM departements WHERE region_id='" .$region_id. "' ORDER BY nom");
    while ($back = mysql_fetch_assoc($query)) {
        $dep=$dep.'<option id=" '. $back["departement_id"] . '" value="' . $back["departement_id"] . '" />'. utf8_encode($back["nom"]).'</option>\n ';
         
    }
}

 $dep=$dep."</select>";
 echo $dep;
?>
 

    
        


