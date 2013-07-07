<?php
 
function connectbase() {
   $result = new mysqli('localhost','epicier','kro1664','cocreer');
   if (!$result) {
     throw new Exception('la connection au serveur est impossible');
   } else {
	 
     return $result;
   }
}

?>
