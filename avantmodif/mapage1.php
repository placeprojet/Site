<?php

require_once('connexionbase.php');
require_once('fcmonavatar.php');


session_start();
if ( $_SESSION['idvisiteur']){
	$idvisiteur=$_SESSION['idvisiteur'];
	$_SESSION['idvisiteur'] = $idvisiteur;
}


if ( $_SESSION['iduser']){
	$iduser=$_SESSION['iduser'];
	 $_SESSION['iduser'] = $iduser;
}
$db = connectbase();
if ($_GET['pseudo']){
$pseudo=$_GET['pseudo'];
$resultc = $db->query("select iduser from user where pseudo='".$pseudo."'");
$cons = $resultc->fetch_assoc();
$idconstructeur=$cons['iduser'];
}
else if ($_GET['idprojet']){
$idprojet=$_GET['idprojet'];
$resultp = $db->query("select iduser from projet where idprojet='".$idprojet."'");
//echo 'bonjour'.$iduser.'idvisiteur'.$idvisiteur.'idprojet'.$idprojet;
$proj = $resultp->fetch_assoc();
$idconstructeur=$proj['iduser'];
}

if($idconstructeur){
	if ($iduser and $iduser!=$idconstructeur){
	mapage($idconstructeur,$iduser);
   }
   else if ($iduser and $iduser==$idconstructeur){
   mapage($iduser,$iduser);
   }
   else if (!$iduser){
   mapage($idconstructeur,$idconstructeur);
   }
}
else if(!$idconstructeur){
mapage($iduser,$iduser);
}
 

function mapage($iduser,$idvisiteur) {
 $db = connectbase();
 $resultu = $db->query("select * from user where iduser='".$iduser."'");
 $tuser = $resultu->fetch_assoc();
 
 $idvirtuelle=avatar($iduser);
 $avatar="img/".$idvirtuelle['avatar'];
 $pseudo=$idvirtuelle['pseudo'];
 
 $idvirtuellevisiteur=avatar($idvisiteur);
 $avatarvisiteur="img/".$idvirtuellevisiteur['avatar'];
 $pseudovisiteur=$idvirtuellevisiteur['pseudo'];

 
 $resultmetier = $db->query("select nommetier from metiers where idmetier='".$tuser['idmetier']."'");
 $tmetier = $resultmetier->fetch_assoc();
 
 $resultdep = $db->query("select nom from departements where departement_id='".$tuser['iddepartement']."'");
 $tdep = $resultdep->fetch_assoc();
 
 
 $resultreg = $db->query("select nom from regions where region_id='".$tuser['idregion']."'");
 $treg = $resultreg->fetch_assoc();
 
 $resultlivre = $db->query("select * from livre where idlivre='".$tuser['idlivre']."'");
 $livre = $resultlivre->fetch_assoc();
 
 $resultfilm = $db->query("select * from film where idfilm='".$tuser['idfilm']."'");
 $film = $resultfilm->fetch_assoc();
 
 $resultsport = $db->query("select * from sport where idsport='".$tuser['idsport']."'");
 $sport = $resultsport->fetch_assoc();
 
 $resultpeintre = $db->query("select * from peintre where idpeintre='".$tuser['idpeintre']."'");
 $peintre = $resultpeintre->fetch_assoc();
 
 $resultmusique = $db->query("select * from musique where idmusique='".$tuser['idmusique']."'");
 $musique = $resultmusique->fetch_assoc();
 
 
 $resultlv1 = $db->query("select langue from langue where idlangue='".$tuser['idlangue']."'");
 $tlv1 = $resultlv1->fetch_assoc();
 
 $resultlv2 = $db->query("select langue from langue where idlangue='".$tuser['idlangue2']."'");
 $tlv2 = $resultlv2->fetch_assoc();
 
 $resultetudes = $db->query("select niveau from etudes where idetudes='".$tuser['idetudes']."'");
 $tetudes = $resultetudes->fetch_assoc();
 
 $resultdomaine = $db->query("select nomdomaine from domaines where iddomaine='".$tuser['iddomaine']."'");
 $tdomaine = $resultdomaine->fetch_assoc();
 
 $resulttag = $db->query("select tag from tag where (idtag='".$tuser['qualite1']."' or idtag='".$tuser['qualite2']."' or idtag='".$tuser['default1']."'
                     or idtag='".$tuser['default2']."')");
                     $num_results = $resulttag->num_rows;
                     If ($num_results!=0){
						 for ($i=0; $i <$num_results; $i++) {
	                      $ttag = $resulttag->fetch_assoc();
	                      $tag[$i]=$ttag['tag'];
						 }
				     }
	
$resultp = $db->query("select photo1,nomprojet,idprojet from projet where iduser='".$iduser."'");
 $num_resultp = $resultp->num_rows;
 If ($num_resultp!=0){
						 for ($i=0; $i <$num_resultp; $i++) {
	                      $proj = $resultp->fetch_assoc();
	                      $photo[$i]=$proj['photo1'];
	                      $nomprojet[$i]=$proj['nomprojet'];
	                      $id[$i]=$proj['idprojet'];
						 }
				     }
 				     
				     
 $db->close();
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	
    <title>CoCreer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
       
        <link rel="stylesheet" href="stylemapage.css" />

        <header class="pied">           
            <h2>Le profil de - <span class="h"> <?php echo utf8_encode($tuser['pseudo']);?> 
            </span> - <?php echo utf8_encode($tmetier['nommetier']);?>,  <?php echo utf8_encode($treg['nom']);?> </h2>
        </header>
    </head> 
<body>
	
       <?php //echo ' <div class="demande"> &nbsp;utf8_encode($proj[\'couttotal\'])-utf8_encode($proj[\'financementperso\']);&euro; &nbsp;</div>'; ?>
        
           <?php
         
        if(!$iduser){
       echo' <div class="connexion"  id="connect"> <p>&bull; Me connecter</p><form method="post" action="identification.php">			
        <p class="connexion" style="visibility:hidden">Pseudonyme :<br/>
			         <input type="text" name="pseudo" size="20" maxlength="30"/>
			         <br/><br/>Mot de passe :
			         <br/>
			         <input type="hidden" name="url" value="accueil.php">
			         <input type="password" name="passwd" size="20" maxlength="30"/><br/><br/><input type="submit" value="Valider"><br/><br/></p></form></div> ';
				  }
				  else{
					 
			        echo' <div class="connexion"  id="connect"> <p>&bull; Me déconnecter</p><form method="post" action="deconnexion.php">			
                     <p class="connexionn" style="visibility:hidden"><b>Confirmer :</b><br/>
			         <input type="hidden" name="url" value="accueil.php">
			        <input type="submit" value="Valider"><br/></p></form></div> ';
				}  
			?>                  
			          
			  <script type="text/javascript" src="evenements.js"></script>    
        
        
        <nav class="navv">
            <ul class="nav">
                <li class="nav"><a href="javascript://">Accueil</a></li>
                <li class="nav"><a href="javascript://">Ma page</a></li>
                <li class="nav"><a href="javascript://">Annonces</a></li>
                <li class="nav"><a href="javascript://">Mon Profil</a></li>
                <li class="nav"><a href="javascript://">Accueil</a></li>
                <li class="nav"><a href="javascript://">Ma page</a></li>
                <li class="nav"><a href="javascript://">Annonces</a></li>
                <li class="nav"><a href="javascript://">Mon Profil</a></li>
            </ul>
            <div class="navprojet">
				<ul class="nav">
                <li class="nav">Projets en cours</li>
                </ul>
            <?php
            If ($num_resultp!=0){
					for ($i=0; $i <$num_resultp; $i++) {
	                      
	                echo'<a class="navprojet" href="projet.php?idprojet='.$id[$i].'"><div class="navprojetimg" ><img src="img/'.$photo[$i].'" height=60px/><p>'.$nomprojet[$i].'
	                      </p></div></a>';
	                       
						 }
				     }
            ?>
            
            </div>
        </nav>
        
        
        
         <div class="avatard">
				       <img src="img/<?php echo $tuser['avatar'];?>" alt="1 photo"/>
		</div>
        
        <div class="photoi">
				       <img src="img/<?php echo $tuser['photo'];?>" alt="1 photo"/>
		</div>
        
        <div class="avatar">
				       <p class=avatar>Le profil de :<br/><span class=avatar> <?php echo utf8_encode($tuser['pseudo']);?></span></p>
		</div>
		<div class="avat">
				      <?php //echo ' <a href="javascript://">&nbsp;Son Profil&nbsp;</a>;?>
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
            
               <br/>

<br/><br /><br/>
   <li ><?php echo $musique['musique'];?></li></ul>
 <br /><br/>                
                
            </div>
            
     <section class=sectionn>   
	   <article class="article">                                           
           	    
						
				    <div class="photo">
				       <img class="photos" src="<?php echo $livre['couverture'];?>" alt="1 photo"/>
				    </div>
				    <div class="photo">
				       <img class="photos" src="<?php echo $film['affiche'];?>" alt="1 photo"/>
				    </div>
				    <div class="photo">
				     <img class="photos" src="<?php echo $sport['photosport'];?>" alt="1 photo"/>
				    </div>
				    <div class="photo">
				      <img class="photos" src="<?php echo $peintre['tableau'];?>" alt="1 photo"/>
				    </div>							
				    <div class="photo">
				       <img class="photos" src="<?php echo $tuser['image'];?>" alt="1 photo"/>
				    </div>
				    <div class="info" >
			         <p class="info"><?php echo $tuser['descriptioncourte'];?></p>				
			        </div>
			    
			        <div class="lelocale"><p>Données personnelles :	</p>
			        <div class="lelocal">
				     <p class="lelocals">Nom : <span class="number"><?php echo utf8_encode($tuser['nom']);?></span></p>
				     <p class="lelocals">Prénom : <span class="number"><?php echo utf8_encode($tuser['prenom']);?></span></p>
				      <p class="lelocals">Année de naissance : <span class="number"><?php echo utf8_encode($tuser['annee']);?></span></p>
				     
				    </div>
				     <div class="lelocalc"><p class="lelocals">Etat civil : <span class="number"><?php echo utf8_encode($tuser['civil']);?> </span></p>
				     <p class="lelocals">Nb d'enfants : <span class="number"><?php echo utf8_encode($tuser['enfant']);?> </span>
				     <p class="lelocals">Ville : <span class="number"><?php echo utf8_encode($tuser['ville']);?> <?php echo utf8_encode($tuser['codepostal']);?></span></p>					
		             </div>
		            
				     <div class="lelocald"><p class="lelocals">Département : <span class="number"><?php echo utf8_encode($tdep['nom']);?></span></p>
				     <p class="lelocals">Portable : <span class="number"><?php echo utf8_encode($tuser['portable']);?></span>
				    <p class="lelocals">Mail : <span class="number"><?php echo utf8_encode($tuser['mail']);?></span></p>						
		            </div>
		            </div>
			        <hr/>
			        <div class="economiquee"><p>Compétences :	</p>
		           <div class="projet">
				     <p class="economiques">Langue vivante : <span class="number"><?php echo utf8_encode($tlv1['langue']);?></span></p>
				     <p class="economiques">Langue vivante : : <span class="number"><?php echo utf8_encode($tlv2['langue']);?></span></p>
				    </div>
				   <div class="projetd">
				     <p class="economiques"> Niveau d'études : <span class="number"><?php echo utf8_encode($tetudes['niveau']);?></span></p>
				     <p class="economiques">Domaine professionnel : <span class="number"><?php echo utf8_encode($tdomaine['nomdomaine']);?> </span></p>
				     </div>
				     </div>
		           <hr/>
		           
		           <div class="projete"><p>Goûts personnels :	</p>
		           <div class="projet">
				     <p class="projets">Un livre : <span class="number"><?php echo $livre['titre'];?> </span></p>
				     <p class="projets">Un auteur : <span class="number"><?php echo $livre['auteur'];?> </span></p>
				     <p class="projets">Un sport : <span class="number"><?php echo $sport['sport'];?></span></p>
				    
				   </div>
				   <div class="projetd">
				     <p class="projets">Un film : <span class="number"><?php echo $film['film'];?> </span>
				     <p class="projets">Un réalisateur : <span class="number"><?php echo $film['realisateur'];?> </span></p>
				     <p class="projets">Un peintre : <span class="number"><?php echo $peintre['peintre'];?> </span></p>				
		           </div>
		           </div>
		           
		           <div id="cout" style="background:#<?php echo $tuser['politique'];?>;" ><p ><span class="tag">
					   <?php echo $tag[0];?></span><span class="tag"><?php echo $tag[1];?></span>
				    <span class="tag"><?php echo $tag[2];?></span><span class="tag"><?php echo $tag[3];?></span></p>				
		           </div>
		      
		          <div class="boxe" id=12>
				  <p class="description"><img src="img/descriperso.jpg" alt="1 photo"/></p>
                 <?php echo $tuser['descriptionlongue'];?>
                </div>  
                <div class="lienss"><p class="projets">Réseaux sociaux :   </p>
				<ul class="liens">
                <li class="liens">&bull;&nbsp;&nbsp;<a href="<?php echo utf8_encode($proj['lienenvironnement']);?>">Environnement</a></li>
                <li class="liens">&bull;&nbsp;&nbsp;<a href="<?php echo utf8_encode($proj['lieneconomique']);?>">Environnement économique</a></li>
                <li class="liens">&bull;&nbsp;&nbsp;<a href="<?php echo utf8_encode($proj['lienannonce']);?>">Annonce</a></li>
                <li class="liens">&bull;&nbsp;&nbsp;<a href="<?php echo utf8_encode($proj['lienetudemarche']);?>">Etude de marché</a></li>               
                </ul>		
		        </div> 
		     <hr/>   
		        
            <div id="discussions" class="box">
              <div class="message" id="message-div">
				<h3><span>Laisser un message</span> </h3>				
					<form method="POST" target="#" onsubmit="javascript:App.Comments.add();return false;" id="commentaire">												
						<div class="aireecriture">
							<textarea id="message" rows="3"></textarea>
					   </div>
					   <div class="write-message-actions">
							<button class="button" type="submit">Envoyer</button>
						   <label><input class="checkbox" type="checkbox" id="prive"  />Privé</label>
					  </div>
					</form>
				</div>		        
		    </div>	 
		        
		                   
        </article> 
 
     </section><br/><br/><br/><br/><br/><br/>
</body>

</html>
<?php
  
}
?>
