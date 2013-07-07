<?php

function fctdonneeconomiques($idprojet) {
	                $db = connectbase();
                    $result = $db->query("select loyerfonds,coutfonds,ca,rnet,ebe,chargesf,mb,consommations,impot,crearep from projet where idprojet='".$idprojet."'");
                    $row = $result->fetch_assoc();
$crearep=$row['crearep'];
 if ($crearep==1) {
    $crea="prévisionnelles";
   
  }
  
 else if ($crearep==2) {
	 $crea="actuelles";
   
  }
             echo'
                     <h4>Données économiques '.$crea.' :<span class="number"> </span></h4>
			         <form method="post" action="receptionprojeteconomique.php">
			         
			         <p class="economiques"> Loyer - Fonds :<span class="number"> (s\'ils existent)</span> <br/>
			         <div class="economique" >
			         <ul>
			        <li> <input type="text" name="loyerfonds" size="20" maxlength="20" value="'.$row['loyerfonds'].'"> 
			         <input type="text" name="coutfonds" size="20" maxlength="20" value="'.$row['coutfonds'].'"></li>
			          </ul></div>
			         
			         <p class="economiques"> Chiffre d\'affaire <span class="number">(C.A.)</span> :<br/>
			         <div class="economique" >
			         <ul>
			        <li> <input type="text" name="ca" size="20" maxlength="20" value="'.$row['ca'].'"/> 
			         </li></ul></div>
			         
			         <p class="economiques"> Résultat net - Excédent Brut d\'Exploitation<span class="number">(E.B.E.)</span> :<br/>
			         <div class="economique" >
			         <ul>
			        <li> <input type="text" name="rnet" size="20" maxlength="20" value="'.$row['rnet'].'"/> 
			        <input type="text" name="ebe" size="20" maxlength="20" value="'.$row['ebe'].'"/> 
			         </li></ul></div>
			         
			         <p class="economiques"> Charges de fonctionnement<span class="number"> (Personnels, loyers...)</span> - Marge Brute :<br/>
			         <div class="economique" >
			         <ul>
			        <li> <input type="text" name="chargesf" size="20" maxlength="20" value="'.$row['chargesf'].'"/> 
			        <input type="text" name="mb" size="20" maxlength="20" value="'.$row['mb'].'"/> </li></ul></div>
			        
			        <p class="economiques"> Consommations H.T.<span class="number"> (Matières premières, marchandises...)</span> :<br/>
			         <div class="economique" >
			         <ul>
			        <li> <input type="text" name="consommations" size="20" maxlength="20" value="'.$row['consommations'].'"/></li></ul></div>
			        <p class="economiques"> Impôt sociétés :<span class="number"> </span> <br/>
			         <div class="economique" >
			         <ul>
			        <li> <input type="text" name="impot" size="20" maxlength="20" value="'.$row['impot'].'"/></li></ul></div>
			         <div class="economique" ><input type="submit" value="Enregistrer"><br/><br/> </div>
			           </form>     
			       <hr/>';
}

?>
