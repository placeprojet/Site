<?php

require_once('fcmonavatar.php');
require_once('connexionbase.php');
require_once('fcformulairemodifierutilisateur1.php');
require_once ('fonctionformulairenouvelutilisateur1.php');
require_once ('fonctionformulairenouvelutilisateurculture.php');
require_once('fonctiondescription.php');
require_once('fctdonneepersonnelle.php');
require_once('fonctiontag.php');
session_start();
if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
}
//echo 'bonjour'.$iduser;
if($iduser){
	  $_SESSION['iduser'] = $iduser;
	  $idvirtuelle=avatar($iduser);
	  $avatar="img/".$idvirtuelle['avatar'];
	  $pseudo=$idvirtuelle['pseudo'];
}


?>

 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	
    <title>CoCreer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
       
        <link rel="stylesheet" href="styleidentite.css" />

        <header class="pied">           
            <h2>Créer-<span class="h">  votre Identité </span>- sur le site</h2>
        </header>
    </head> 
<body>
	    
        
			 <?php
         
        if(!$iduser){
       echo' <div class="connexion"  id="connect"> <p>&bull; Me connecter</p><form method="post" action="identification.php">			
        <p class="connexion" style="visibility:hidden">Pseudonyme :<br/>
			         <input type="text" name="pseudo" size="20" maxlength="30"/>
			         <br/><br/>Mot de passe :
			         <br/>
			         <input type="hidden" name="url" value="pagepersonnelle.php">
			         <input type="password" name="passwd" size="20" maxlength="30"/><br/><br/><input type="submit" value="Valider"><br/><br/></p></form></div> ';
				  }
				  else{
					 
			        echo' <div class="connexion"  id="connect"> <p>&bull; Me déconnecter</p><form method="post" action="deconnexion.php">			
                     <p class="connexionn" style="visibility:hidden"><b>Confirmer :</b><br/>
			         <input type="hidden" name="url" value="pagepersonnelle.php">
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
        </nav>
        
         <div class="avatard">
			<?php
				if ( $iduser){ echo' <img src="'.$avatar.'" alt="1 photo"/>';}else{ echo' <img src="img/placeproj.jpg" alt="1 photo"/>';}
			?>	       
		</div>
        
        <div class="avatar">
				       <p class=avatar><br/><span class=avatar><?php echo $pseudo; ?> </span></p>
		</div>
		<div class="avat">
				       <a href="javascript://">&nbsp;Votre Profil&nbsp;</a>
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
               <br/>
     </div>
            
     <section class=sectionn>   
	   <article class="article"> 
	    <div class="info" >
	      <p class="info">Vous allez créer ici votre identité virtuelle sur le site.<br/> Les seuls champs obligatoires sont : 
	     votre pseudo, votre mot de passe et votre adresse mail (pour la confirmation de votre inscription).<br/> L'objectif de ce site est de vous permettre de trouver 
	     une ou des personnes partageant votre envie de créer une entreprise, un commerce, une association, un groupe... <br/>Ce "pré-contact" doit, comme dans les sites
	     de rencontres, précéder une vraie rencontre,  celle-ci vous engagera peut-être financièrement vous, votre famille si elle existe, et, vous serez amené 
	     si le projet abouti, à vous cotoyer régulièrement.<br/> Essayez, donc, d'être le plus précis possible dans la description de vos capacités, vos défaults, 
	     vos attentes,..., le site vous le permet.<br/> Les données récoltées par le site à cette fin de description 
	     , ne seront pas utilisées ou revendues, elles seront détruites par simple demande de votre part ou par un votre abandon du site manifesté par une abscence de
	     visite de celui-ci pendant une durée de trois mois.<br/> A vous de décider quels renseignements vous sembleront utiles à la réussite de votre projet. Vous pouvez
	      décider si vos données inscrites seront publiques ou privées. Celles marquées privées seront dévoilées aux personnes vous en faisant la demande et après votre
	       accord. Les personnes vous demandant vos données verront les siennes vous être dévoilées.<br/> Les personnes n'ayant pas rempli leur identité ne pourront pas 
	       rencontrer les personnes porteuses de projet dont l'identité est dissimulée.<br/> Bonne chance à vous !!
	      </p>	<br/><hr/> 	<br/>		
		</div>                                          
				   
				   <?php
				  //identité
				   if(!$iduser){
			        nouvelutilisateur1();
				   }
				   else
				   {
					 utilisateur1($iduser);  
				   }
			        
				   ?>
				   
				   <?php if($iduser){
			        echo'<form action="gestionimage.php" method="post" enctype="multipart/form-data">
			        <div class="apparence"><h4>Gérer son image sur le site :</h4>
				      <p class="apparences">Votre avatar  :<span class="number"> (ou votre photographie, si vous le désirez)</span></p>
				      <p class="apparences"><input type="file" name="monfichier" enctype="multipart/form-data"/><br /></p>
				      <p class="apparences">Votre photographie<span class="number"> (si ce n\'est pas votre Avatar)(privé)</span></p>				   
				    <p class="economiques"><input type="file" name="maphoto" enctype="multipart/form-data"/><br /></span></p>
				     <p class="apparences"> <span class="number"></span></p>
				     <p class="apparences"><input type="submit" value="Envoyer les fichiers" />       
                     </form><br />
                     <span class="number">(Attention : les images sont redimensionnées, il est préférable qu\'elles aient un format :<br /> largeur = 2/3 de leur hauteur)</span></p>				
		           </div>
		           <hr/>';
		      
				    donneepersonnelle($iduser);
				    
			        $db = connectbase();
                    $result = $db->query("select pays,ville,codepostal,portable,idregion,iddepartement from user where iduser='".$iduser."'");
                    $row = $result->fetch_assoc();
				   }
				   ?>
		        <?php if($iduser){
			        echo'   
		       <div class="identite" >
                     <h4>Vos Coordonnées :</h4>
			         <form method="post" action="receptionformulaire2.php">
                       <p class="identites"><br/>Pays :<br/>
			         <input type="text" name="pays" size="30" maxlength="100" value="'.$row['pays'].'">			         
			         </p><br/>
			        <p class="identites"><br/>Région - Département :<br/>
			         
                     
                       <div id="regionBox">
                        <p id="editors">
                         <select name="idregion" id="idregion" onchange="request(this);">
                          <option value="none">Selection</option>';
                                  
                               mysql_connect('localhost', 'epicier', 'kro1664');
                               mysql_select_db('cocreer');
                                    $query = mysql_query("SELECT * FROM regions");
                               while ($back = mysql_fetch_assoc($query)) {
								   if($back['region_id']==$row['idregion']){$select="selected";}else{$select="";}
                                    echo '\t\t\t\t<option value="' . $back['region_id'] .'" '.$select.'>' . utf8_encode($back['nom']) .'</option>\n';
                                 }               
                                      
                        echo' </select>      
                         </p>
                         <p id="departements"> &nbsp;</p>';
                         $region_id = $row['idregion'];
                        
                        echo'    <p id="depart"> 
                           
                           <select name="iddepartement">';
                           
                             if ($region_id) {
                            mysql_connect('localhost', 'epicier', 'kro1664');
                            mysql_select_db('cocreer');
                            $query = mysql_query("SELECT * FROM departements WHERE region_id='" .$region_id. "' ORDER BY nom");
                           
                             while ($back = mysql_fetch_assoc($query)) {
							if($back['departement_id']==$row['iddepartement']){$select="selected";}else{$select="";}
                             echo'<option value="' . $back['departement_id'] . '" '.$select.' />'. utf8_encode($back['nom']).'</option>\n ';
                           
                                 }
                            }

                         echo'</select>
                           
                          <br/> </p> 
                         <br/><br/>
                      </div>																	
			    </div>';
			}	
			    ?>
			  <?php if($iduser){
			        echo'  
			    <div class="identited" > 
			        <p class="identites">Ville : <span class="number">(privé)</span><br/>
			         <input type="text" name="ville" size="30" maxlength="100"value="'.$row['ville'].'">
			         </p><br/><p class="identites"><br/>Code postal : <span class="number">(privé)</span><span class="number"></span><br/>
			         <input type="text" name="codepostal" size="30" maxlength="100"value="'.$row['codepostal'].'">
			         </p><br/><p class="identites"><br/>Portable : <span class="number">(privé)</span><br/>
			         <input type="text" name="portable" size="30" maxlength="100"value="'.$row['portable'].'">
			         </p><br/>				         																
			    </div>
			    
			    
			    
			    
			    <div class="identite" >
			       <input type="submit" value="Enregistrer"><br/><br/> 
			    </div>  </form>
			            
			       <hr/>';
			   }
			     ?> 
			     
			   <?php if($iduser){
				   $db = connectbase();
                    $result = $db->query("select idetudes,idlangue,idlangue2,idmetier,iddomaine from user where iduser='".$iduser."'");
                    $row = $result->fetch_assoc();
			        echo'    
			  <div class="professionn"> <form method="post" action="receptionformulaire3.php">
		        <div class="profession"> <h4>Etudes et Professions :</h4>
		            
		            <p class="professions">Votre niveau d\'études : <span class="number"></span></p>
		            <select name="idetudes" id="idetudes" >';
					    mysql_connect('localhost', 'epicier', 'kro1664');
                               mysql_select_db('cocreer');
                              $query = mysql_query("SELECT * FROM etudes");
                               while ($etudes = mysql_fetch_assoc($query)) {
								   if($etudes['idetudes']==$row['idetudes']){$select="selected";}else{$select="";}
                                    echo "\t\t\t\t<option value=" . $etudes['idetudes'] . " ".$select.">" . utf8_encode($etudes['niveau']) ."</option>\n";
                                 }
                                       
                        echo'</select>      
                     <p class="professions">Langues parlées : <span class="number"></span></p>
		             <select name="idlangue" id="idlangue" >';
					   mysql_connect('localhost', 'epicier', 'kro1664');
                               mysql_select_db('cocreer');
                              $query = mysql_query("SELECT * FROM langue");
                               while ($langue = mysql_fetch_assoc($query)) {
								   if($langue['idlangue']==$row['idlangue']){$select="selected";}else{$select="";}
                                    echo "\t\t\t\t<option value=" . $langue['idlangue'] . " ".$select.">" . utf8_encode($langue['langue']) ."</option>\n";
                                 }
                                     
                     echo'  </select>                  
					   <select name="idlangue2" id="idlangue2" >';
					   mysql_connect('localhost', 'epicier', 'kro1664');
                               mysql_select_db('cocreer');
                              $query = mysql_query("SELECT * FROM langue");
                               while ($langue = mysql_fetch_assoc($query)) {
								   if($langue['idlangue']==$row['idlangue2']){$select="selected";}else{$select="";}
                                    echo "\t\t\t\t<option value=" . $langue['idlangue'] . " ".$select.">" . utf8_encode($langue['langue']) ."</option>\n";
                                 }
                                    
                      echo'  </select>   
				   </div>
				 <div class="professiond"><p class="professiond">	Domaine professionnel :</p>
                   
                        
                          <select name="iddomaine" id="iddomaine" onchange="demande(this);">
                             <option value="none">Selection</option>';
                                       
                             mysql_connect('localhost', 'epicier', 'kro1664');
                             mysql_select_db('cocreer');                
                             $quer = mysql_query("SELECT * FROM domaines");
                             while ($bac = mysql_fetch_assoc($quer)) {
								 if($bac['iddomaine']==$row['iddomaine']){$select="selected";}else{$select="";}
                              echo "\t\t<option value=" . $bac['iddomaine'] . " ".$select.">" . utf8_encode($bac['nomdomaine']) . "</option>\n";
                             }
                             ?>          
                          </select>      
                        
                       <p class="professiondd">	Métier : </p> 
                      <p id="metie"> </p>
                     <p id='met'>
                     <?php
                     if($row['iddomaine']){
						 $iddomaine=$row['iddomaine'];
						 echo"<select name='idmetier'>";
						 mysql_connect('localhost', 'epicier', 'kro1664');
                          mysql_select_db('cocreer');
                         $que = mysql_query("SELECT * FROM metiers WHERE iddomaine='" .$iddomaine. "' ORDER BY nommetier");
                           while ($retour = mysql_fetch_assoc($que)) {
							if($retour['idmetier']==$row['idmetier']){$select="selected";}else{$select="";}   
                          echo"<option value=". $retour['idmetier']." ".$select.">".utf8_encode($retour['nommetier'])."</option>\n ";
                        }
                        echo"</select>";
					}
					echo"</p>";
					?>
                     </div>
				   
				     	<div class="profession" >
			       <input type="submit" value="Enregistrer"><br/><br/><br/><br/> 
		           </form>	
		           </div>
		           
			      </div> 
			       	
		         </div>
		         
		         <hr/>
		         
		         <div class="boxculture" >
					  <?php
				  }
				  //identité
				   if($iduser){
			         nouvelutilisateurculture($iduser);
				   }
				   else
				   {
					
				   }
			        
				   ?>
					
				</div>
				
		         
		         <div class="boxdescription" >
					  <?php
					  
				  //identité
				   if($iduser){
					  tag($iduser);
					  echo'</br>';
			         description($iduser);
				   }
				   else
				   {
					
				   }
			        
				   ?>
					
				</div>
		         <div class="cout"><p class="cout"> </p>
                 </div>
               <?php $db->close();  /*<div class="lienss"><p class="identites">Liens en complément :   </p>
				<ul class="liens">
                <li class="liens">&bull;&nbsp;&nbsp;<a href="javascript://">Environnement</a></li>
                <li class="liens">&bull;&nbsp;&nbsp;<a href="javascript://">Environnement économique</a></li>
                <li class="liens">&bull;&nbsp;&nbsp;<a href="javascript://">Annonce</a></li>
                <li class="liens">&bull;&nbsp;&nbsp;<a href="javascript://">Etude de marché</a></li>               
                </ul>		
		        </div> 
		     <hr/> */  ?>  
                   
        </article>
       
  
     
     </section><br/><br/><br/><br/><br/><br/>
       
</body>
       <script type="text/javascript" src="oxhr.js"></script>
       <script type="text/javascript" src="metiers.js"></script>
       <script type="text/javascript" src="region.js"></script>
</html>
