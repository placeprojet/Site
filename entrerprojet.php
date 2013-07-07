<?php
require_once('fcinsertionprojet.php');
require_once('fcmonavatar.php');
require_once('connexionbase.php');
require_once('fcformulairemodifierutilisateur1.php');
require_once ('fctdonneeprojet.php');
require_once ('fctdonneeconomiques.php');
require_once('fctassocieprojet.php');
require_once('fctresumeprojet.php');

session_start();
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
}
if($iduser){
	  $_SESSION['iduser'] = $iduser;
	  $idvirtuelle=avatar($iduser);
	  $avatar="img/".$idvirtuelle['avatar'];
	  $pseudo=$idvirtuelle['pseudo'];
}
if($_POST['idprojet']){
	  $idprojet=$_POST['idprojet'];
	  $_SESSION['idprojet'] = $idprojet;
}
if($_SESSION['idprojet']){
	  $idprojet=$_SESSION['idprojet'];
	  $_SESSION['idprojet'] = $idprojet;
}
?>
 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	
    <title>CoCreer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
       
        <link rel="stylesheet" href="styleentrerprojet.css" />

        <header class="pied">           
            <h2>Présentez-<span class="h">  votre Projet </span>- sur le site</h2>
        </header>
    </head> 
<body>
	    
        
        <?php
         /*<div class="demande"> &nbsp;Projet&nbsp;</div>
          <div class="connexion"  id="connect"> <p>&bull; Me connecter</p><form method="post" action="identification.php">			
        <p class="connexion" style="visibility:hidden">Pseudonyme :<br/>
			         <input type="text" name="pseudo" size="20" maxlength="30"/>
			         <br/><br/>Mot de passe :
			         <br/>
			         <input type="hidden" name="url" value="entrerprojet.php">
			         <input type="password" name="passwd" size="20" maxlength="30"/><br/><br/><input type="submit" value="Valider"><br/><br/></p></form></div> */
			         
			         

        if(!$iduser){
       echo' <div class="connexion"  id="connect"> <p>&bull; Me connecter</p><form method="post" action="identification.php">			
        <p class="connexion" style="visibility:hidden">Pseudonyme :<br/>
			         <input type="text" name="pseudo" size="20" maxlength="30"/>
			         <br/><br/>Mot de passe :
			         <br/>
			         <input type="hidden" name="url" value="entrerprojet.php">
			         <input type="password" name="passwd" size="20" maxlength="30"/><br/><br/><input type="submit" value="Valider"><br/><br/></p></form></div> ';
				  }
				  else{
					 
			        echo' <div class="connexion"  id="connect"> <p>&bull; Me déconnecter</p><form method="post" action="deconnexion.php">			
                     <p class="connexionn" style="visibility:hidden"><b>Confirmer :</b><br/>
			         <input type="hidden" name="url" value="entrerprojet.php">
			        <input type="submit" value="Valider"><br/></p></form></div> ';
				}  
			?>         			         
			         
			         
			         
			         
			          <script type="text/javascript" src="evenements.js"></script>
			          
			          
        <?php
				if ( $iduser){ $mapage="mapage.php" ;}else{ $mapage="pagepersonnelle.php";}
			?>		          
        <nav class="navv">
            <ul class="nav">
                <li class="nav"><a href="accueil.php">Accueil</a></li>
                <li class="nav"><a href="<?php echo $mapage; ?> ">Ma page</a></li>
                <li class="nav"><a href="pagepersonnelle.php">Modifier ma page</a></li>
                <li class="nav"><a href="entrerprojet.php?idprojet=n">Nouveau projet</a></li>
                <li class="nav"><a href="entrerprojet.php">Modifier un projet</a></li>
                <li class="nav"><a href="projet.php">Mes projets</a></li>
                <li class="nav"><a href="vols.php">Carnet de vols</a></li>
                <li class="nav"><a href="javascript://">Annonces</a></li>
                <li class="nav"><a href="javascript://">Mon Profil</a></li>
            </ul>
            <div class="navprojet">
				<ul class="nav">
                <li class="nav">Projets en cours</li>
                </ul>
            
        <?php    
                 if ( $iduser){
				 $db = connectbase(); 
                 $resultp = $db->query("select photo1,nomprojet,idprojet from projet where iduser='".$iduser."'");
                 $num_resultp = $resultp->num_rows;
                  If ($num_resultp!=0){
						 for ($i=0; $i <$num_resultp; $i++) {
	                      $proj = $resultp->fetch_assoc();
	                      $photo[$i]=$proj['photo1'];
	                      $nomprojet[$i]=$proj['nomprojet'];
	                      $id[$i]=$proj['idprojet'];
	                      echo'<div class="navprojetimg" ><a class="navprojet" href="entrerprojet.php?idprojet='.$id[$i].'"><img src="img/'.$photo[$i].'" height=30px/>
	                <p>'.utf8_encode($nomprojet[$i]).'
	                      </p></a></div><br>';
						 }
						echo'<div class="navprojetimg" ><a class="navprojet" href="entrerprojet.php?idprojet=n"><img src="img/pdpeffets100.jpg" height=30px/>
	                <p>Nouveau
	                      </p></a></div>'; 
				     }
                    
			   }  
				     
 //$db->close();
?>
            </div>
        </nav>
        
         <div class="avatard">
			 <?php
				if ( $iduser){ echo' <img src="'.$avatar.'" alt="1 photo"/>';}else{ echo' <img src="img/placeproj.jpg" alt="1 photo"/>';}
			?>	       
		</div>
        
        <div class="avatar">
				       <p class=avatar><br/><span class=avatar><?php echo $pseudo; ?> </span></p>
		</div>
		
        
         <div class="cote">
                <h3>Votre recherche :</h3>
                <ul>
                <li >Domaine : <span> H&ocirc;tellerie-Restauration</span></li>
                <li >Cat&eacute;gorie : <span> Restaurant</span></li>
                <li >Sous Cat&eacute;gorie : <span> Aucune</span></li>
                <li >Région : <span> Midi-Pyr&eacute;n&eacute;es</span></li>
                <li>D&eacute;partement : <span> Tarn</span></li>
                <li >Code postal : <span> 81000</span></li>
                <li>Ville : <span> Albi</span></li>
                <li>Chiffre d'affaire :<span> de 100000&euro; à 400000&euro;</span></li>
                <li>B&eacute;n&eacute;fice net :<span> de 30000&euro; à 40000&euro;</span></li>
                <li >Fonds de commerce : <span> de 100000&euro; à 300000&euro;</span></li>
                <li >Loyer : <span> de 200&euro; à 700&euro;</span></li>  
                <li >Logement : <span> Inclus</span></li> 
                <li >Type de b&acirc;timent : <span> Ancien r&eacute;nov&eacute;</span></li>   
                <li >Travaux : <span> Superficiels</span></li>             
            </ul>
         </div>
            
     <section class=sectionn>   
	   <article class="article"> 
	    <div class="info" >
	      <p class="info">Vous allez créer ici la page de votre projet.<br/> Les seuls champs obligatoires sont : <br/>
	     le nom, le secteur d'activité, le lieu de l'activité, et, une description courte.<br/> Les autres renseignements pourront-être entrés par la suite. <br/>A vous de décider
	      quels renseignements vous semblent utiles à la réussite de votre projet :<br/> 
	      </p>	<br/><hr/> 	<br/>		
		</div>                                          
<?php
//echo'iduser'.$iduser.'idprojet'.$idprojet.'GET[idprojet]'.$_GET['idprojet'];
if (!$iduser){	
	echo' <div class="genrec" >
                     
					<p class="genres">Connectez-vous pour entrer ou modifier vos projets, ou,<span><a href="pagepersonnelle.php" class="genrec">
					inscrivez-vous sur le site ! </a></span><br/></p></div>';
}
else if ($_GET['idprojet']=='n'){
	
		$idprojet=0;
		$_SESSION['idprojet'] = $idprojet;
		//$_GET['idprojet']="";
		require_once('obligatoire.php');
	}
else if (!$idprojet and !$_GET['idprojet']  ){
	$idprojet=choixprojet($iduser);
	if ($idprojet==0){	
	require_once('obligatoire.php');
   }
   
   else if (is_array ($idprojet)){
	    
	echo'<div class="genre" >
                     
					<p class="identites">Quel projet souhaitez-vous modifier ?</a><br/></p><form method="post" action="entrerprojet.php"><select name="idprojet" id="idprojet">
                             <option value="none">Selection</option>';
                             
                             while ($row = $idprojet->fetch_assoc()) {
                              echo "\t\t<option value=" . $row['idprojet'] . ">" . $row['nomprojet'] . "</option>\n";
                             }
                                      
                         echo' <br/><br/> <input type="submit" value="Valider"></select></form></div>';
   }
   else{
	  $_SESSION['idprojet'] = $idprojet;
	 require_once('modifobligatoire.php'); 
  } 
}

else if($_GET['idprojet']!=0 ){
	$idprojet=$_GET['idprojet'];
	$_SESSION['idprojet'] = $_GET['idprojet'];
	$_GET['idprojet']="";
	require_once('modifobligatoire.php');
   
}

else{
	//echo'idprojet'.$idprojet;
	$_SESSION['idprojet'] = $idprojet;
	 require_once('modifobligatoire.php'); 
  } 	   
?>				   
				   <?php 
				   if($idprojet&$iduser){
				echo'   <div class="locaux" >
			         <form action="photolocal.php" method="post" enctype="multipart/form-data">
			         <h4>Le local de votre projet : <span class="number"> (S\'il existe)</span></h4>
			         
			          <div class="local">
				      <p class="locals">Photo principale  :</p>
				      <input type="file" name="photo1" enctype="multipart/form-data"/><br />
				      <p class="locals">Photographie n°2 :</p>				   
				      <input type="file" name="photo2" enctype="multipart/form-data"/><br />
				      </div><div class="locald">
				      <p class="locals">Photographie n°3  :</p>
				      <input type="file" name="photo3" enctype="multipart/form-data"/><br />
				      <p class="locals">Photographie n°4 :</p>				   
				      <input type="file" name="photo4" enctype="multipart/form-data"/><br />
				      
                    </div>
                    <p class="locals"><br /><input type="submit" value="Envoyer les fichiers" /> </form></p>
                     <span class="number">';
                     echo"(Attention : les images sont redimensionnées, il est préférable qu'elles aient un format :<br /> hauteur = 2/3 de leur largeur)</span></p>				
		           </div><br/>
		           <hr class='locaux'/>";
		          
						
			        $db = connectbase();
                    $result = $db->query("select type,pays,ville,situation,iddepartement,idregion,codepostal,environnement from projet where idprojet='".$idprojet."'");
                    $row = $result->fetch_assoc();
                    for ($i=1; $i <5; $i++) {
				    if($row['type']==$i){$chek[$i]="checked";}else{$chek[$i]="";}
				    }
				  
				   echo' <div class="locaux" ><br/>
		          <form method="post" action="receptionprojetlocal1.php">
					  <p class="locals">Type d\'accession prévu :<br/>
					  <INPUT TYPE="radio" NAME="type" VALUE="1" '.$chek[1].'><span class="number"> Achat </span><INPUT TYPE="radio" NAME="type" VALUE="2" '.$chek[2].'>
			         <span class="number"> Location </span><INPUT TYPE="radio" NAME="type" VALUE="3" '.$chek[3].'><span class="number"> A prévoir </span>
			         <INPUT TYPE="radio" NAME="type" VALUE="4" '.$chek[4].'><span class="number"> Aucun </span>
			         <div class="local" >
                       <p class="locals"><br/>Pays :<br/>
			         <input type="text" name="pays" size="25" maxlength="40" value="'.$row['pays'].'">			         
			         </p><br/>
			        <p class="locals"><br/>Région - Département :<br/>
			         
                     
                       <div id="regionBox">
                        <p id="editors">
                         <select name="idregion" id="idregion" onchange="request(this);">
                          <option value="none">Selection</option>';
                                 
                               mysql_connect('localhost', 'epicier', 'kro1664');
                               mysql_select_db('cocreer');
                              $query = mysql_query("SELECT * FROM regions");
                               while ($back = mysql_fetch_assoc($query)) {
								   if($back['region_id']==$row['idregion']){$select="selected";}else{$select="";}
                                    echo '<option value="' . $back['region_id'] .'" '.$select.'>' . utf8_encode($back['nom']) .'</option>\n';
                                 }               
                                      
                        echo' </select>      
                         </p>
                         <p id="departements"> &nbsp;</p>';
                         
                        echo'    <p id="depart"> 
                           
                           <select name="iddepartement">';
                           $region_id = $row['idregion'];
                             if ($region_id) {
                            mysql_connect('localhost', 'epicier', 'kro1664');
                            mysql_select_db('cocreer');
                            $query = mysql_query("SELECT * FROM departements WHERE region_id='" .$region_id. "' ORDER BY nom");
                            
                             while ($bac = mysql_fetch_assoc($query)) {
								 if($bac['departement_id']==$row['iddepartement']){$select="selected";}else{$select="";}
                             echo'<option value="' . $bac['departement_id'] . '" '.$select.' />'. utf8_encode($bac['nom']).'</option>\n ';
         
                                 }
                            }

                         echo'</select>
                           
                           </p>      
                         
                        
                      </div>																	
			    </div>';
			  
			   echo' <div class="locald" ><br/> 
			        <p class="locals">Ville :<br/>
			         <input type="text" name="ville" size="30" maxlength="100"value="'.$row['ville'].'">
			         </p><br/><p class="locals"><br/>Code postal :<br/>
			         <input type="text" name="codepostal" size="25" maxlength="100"value="'.$row['codepostal'].'">
			         </p><br/><p class="locals"><br/>Situation :<span class="number">(centre ville, périphérie,..., bord de mer...)</span><br/>
			         <input type="text" name="situation" size="30" maxlength="100"value="'.$row['situation'].'">
			         </p>			         																
			      </div>
			    
			    <p class="locals"> Environnement économique : <span class="number"> (Apparaîtra sur la page de votre projet)</span> <br/></p>
			         
			        <textarea name="environnement" id="descriptionlongue" rows="5" cols="90">'.$row['environnement'].'</textarea>
			        
			    
			    
			     <div class="local" >
			       <input type="submit" value="Enregistrer"><br/><br/> 
			     </div></form>
		           
		       </div>
			         
			            
			       <hr class="locaux"/>';
			       
			       
						
			        $db = connectbase();
                    $result = $db->query("select prixachat,superficie,type,idetat,iddpe,idges from projet where idprojet='".$idprojet."'");
                    $row = $result->fetch_assoc();
                    if($row['type']==1){
						$acquisition="Prix d'achat :";
					}
					else if($row['type']==2){
						$acquisition="Loyer mensuel :";
					}
                    else {
						$acquisition="Montant prévu :";
					}
				    
				   
				    echo'<div class="locaux" >
				    <div class="local" ><br/>
		          <form method="post" action="receptionprojetlocal2.php">
		            
		            <p class="locals">'.$acquisition.' <span class="number"></span></p>
		            <input type="text" name="prixachat" size="30" maxlength="100"value="'.$row['prixachat'].'">
		            <p class="locals">Superficie<span class="number"></span></p>
		            <input type="text" name="superficie" size="30" maxlength="100"value="'.$row['superficie'].'">';
		            
		            
                                       
                         
                         echo' </div>
                         <div class="locald" ><br/>    
                     <p class="locals">Diagnostics immobiliers,D.P.E. et G.E.S. : <span class="number"></span></p>
		             <select name="iddpe" id="iddpe" >
		              <option value="0">Selection</option>';
		             
					        mysql_connect('localhost', 'epicier', 'kro1664');
                               mysql_select_db('cocreer');
                              $query = mysql_query("SELECT * FROM dpe");
                               while ($langue = mysql_fetch_assoc($query)) {
								   if($langue['iddpe']==$row['iddpe']){$select="selected";}else{$select="";}
                                    echo "\t\t\t\t<option value=" . $langue['iddpe'] . " ".$select.">" . utf8_encode($langue['dpe']) ."</option>\n";
                                 }
                                     
                       echo'</select>                  
					   <select name="idges" id="idges" >
					    <option value="0">Selection</option>';
					          mysql_connect('localhost', 'epicier', 'kro1664');
                               mysql_select_db('cocreer');
                              $query = mysql_query("SELECT * FROM ges");
                               while ($langue = mysql_fetch_assoc($query)) {
								   if($langue['idges']==$row['idges']){$select="selected";}else{$select="";}
                                    echo "\t\t\t\t<option value=" . $langue['idges'] . " ".$select.">" . utf8_encode($langue['ges']) ."</option>\n";
                                 }
                                       
                       echo' </select> 
                       <p class="locals">Etat du local<span class="number"></span></p>
		            <select name="idetat" id="idetat" >
		             <option value="0">Selection</option>';
					   mysql_connect('localhost', 'epicier', 'kro1664');
                               mysql_select_db('cocreer');
                              $query = mysql_query("SELECT * FROM etat");
                               while ($etudes = mysql_fetch_assoc($query)) {
								   if($etudes['idetat']==$row['idetat']){$select="selected";}else{$select="";}
                                    echo "\t\t\t\t<option value=" . $etudes['idetat'] . " ".$select.">" . utf8_encode($etudes['etat']) ."</option>\n";
                                 }  
				   echo' </select> 
				   </div>
				   <div class="local" >
			       <input type="submit" value="Enregistrer"><br/><br/> 
		           </form>	
		           </div>
		                 	
		         </div>
			       
		         <hr/>
		         
		         <div class="boxeeconomique" >';
					 
				  //Données économiques :
				   
			         fctdonneeconomiques($idprojet);
			       echo'</div>';
			       fctdonneeprojet($idprojet);
				  
				   
				  fctassocieprojet($idprojet);
			        
				  
					
				echo'</div>
		         <div class="boxresume" >';
					  
			         resumeprojet($idprojet);
				   
					
				   }
			        
				   ?>
					
				
       
</body>
       <script type="text/javascript" src="oxhr.js"></script>
       <script type="text/javascript" src="metiers.js"></script>
       <script type="text/javascript" src="region.js"></script>
</html>
