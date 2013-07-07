<?php
function afficher($idprojet){
    $reponse = new xajaxResponse();// Création d'une instance de xajaxResponse pour traiter les réponses serveur.        require_once('connexionbase.php');
    $chat='';
    require_once('connexionbase.php');
    $db = connectbase();    
    $resultmessage = $db->query("select idmessage,message,idvisiteur from messagep where idprojet='".$idprojet."' ORDER BY idmessage DESC LIMIT 5");
    $num_results =$resultmessage->num_rows;
    If ($num_results!=0){
	for ($i=0; $i<$num_results; $i++) {
	$tamessage = $resultmessage->fetch_assoc();
    $resultr = $db->query("select pseudo,avatar from user where iduser='".$tamessage['idvisiteur']."'");
    $row = $resultr->fetch_assoc();
    $avatarf=$row['avatar'];
    $pseudof=$row['pseudo']; 
    $resultr->free();
    $r=$i%2;
    //$chat=$chat.'<div style="border:solid 1px #4118b1">'.$pseudof.'<br><img src="img/'.$avatarf.'" alt="pdp" width="40px">'.$tamessage['message'].'</div><br>'; 
    $chat=$chat.'<div class="message'.$r.'" style="border:solid 1px #4118b1">
                 <div class="messa"><img class="message10" src="img/'.$avatarf.'" alt="pdp"><p  class="message10" ></p></div><div class="messad">
                 <span>'.$tamessage['message'].'</span></div>
                 </div></br>';
    } 
    } 
    $reponse->assign('block', 'innerHTML', $chat);
    return $reponse;
} 
function envoyer($donnees)
    { 
		$reponse = new xajaxResponse();
		require_once('connexionbase.php');
		 $db =connectbase();
		 $resulti = $db->query("insert into messagep (idprojet,iduser,idvisiteur,message) values ('".$donnees['idprojet']."','".$donnees['iduser']."',
		 '".$donnees['idvisiteur']."','".addslashes($donnees['message'])."')");
    if (!$resulti) {
		 throw new Exception('impossible de se connecter a la base');
     } 
     $db->close();
      $reponse->clear('message', 'value');
    $reponse->call('xajax_afficher',$donnees['idprojet']);
    return $reponse;
    }
    require_once('./xajax_core/xajax.inc.php');
    $xajax = new xajax();
    $xajax->register(XAJAX_FUNCTION, 'afficher');
    $xajax->register(XAJAX_FUNCTION, 'envoyer');
    $xajax->processRequest();
    
 ?>
 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
 <head> 
	<title>CoCreer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php $xajax->printJavascript();  ?>
    <link rel="stylesheet" href="styleprojet.css" />
</head> 
<?php
require_once('connexionbase.php');
require_once('fcmonavatar.php');

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
	  $db = connectbase();
      $result = $db->query("select idprojet from projet where iduser='".$iduser."'");
      $num_result = $result->num_rows;
       If ($num_result!=0){
						 for ($i=0; $i <$num_result; $i++) {
	                      $pro = $result->fetch_assoc();
	                      $id[$i]=$pro['idprojet'];
						 }
				     }
	 $idprojetuser=	$id[0];
	  $db->close();		     
}

if($_GET['idprojet']){
	  $idprojetget=$_GET['idprojet'];
	 }
if($_POST['idprojet']){
	  $idprojetpost=$_POST['idprojet'];
	  //$_POST['idprojet'] = $idprojet;
}
if ($idprojetget){
	afficheprojet($idprojetget,$iduser);
}
else if($idprojetpost){
	afficheprojet($idprojetpost,$iduser);
}
else if($idprojetuser){
	afficheprojet($idprojetuser,$iduser);
}
else{
	header('Location: entrerprojet.php');
}

function afficheprojet($idproje,$iduse){
$db = connectbase();
$resultp = $db->query("select * from projet where idprojet='".$idproje."'");
 $proj = $resultp->fetch_assoc();
if($proj['crearep']==1){
	  $crearep="CREATION";
	  $crea="prévisionnelles";
}
else{
	  $crearep="REPRISE";
	  $crea="actuelles";
}

//$db = connectbase();
$resultu = $db->query("select pseudo,avatar from user where iduser='".$proj['iduser']."'");
 $tuser = $resultu->fetch_assoc();
 
 $resultlieu = $db->query("select nomlieu from lieuactivite where idlieu='".$proj['idlieu']."'");
 $tlieu = $resultlieu->fetch_assoc();
 
 $resultdep = $db->query("select nom from departements where departement_id='".$proj['iddepartement']."'");
 $tdep = $resultdep->fetch_assoc();
 
 
 $resultreg = $db->query("select nom from regions where region_id='".$proj['idregion']."'");
 $treg = $resultreg->fetch_assoc();
 
 $resultetat = $db->query("select etat from etat where idetat='".$proj['idetat']."'");
 $tetat = $resultetat->fetch_assoc();
 
 $resultdpe = $db->query("select dpe from dpe where iddpe='".$proj['iddpe']."'");
 $tdpe = $resultdpe->fetch_assoc();
 
 $resultges = $db->query("select ges from ges where idges='".$proj['idges']."'");
 $tges = $resultges->fetch_assoc();
 
  $resultdom1 = $db->query("select nomdomaine from domaines where iddomaine='".$proj['iddomaine1']."'");
 $tdom1 = $resultdom1->fetch_assoc();
 
 $resultdom2 = $db->query("select nomdomaine from domaines where iddomaine='".$proj['iddomaine2']."'");
 $tdom2 = $resultdom2->fetch_assoc();
 
 $resultmet1 = $db->query("select nommetier from metiers where idmetier='".$proj['idmetier1']."'");
 $tmet1 = $resultmet1->fetch_assoc();
 
 $resultmet2 = $db->query("select nommetier from metiers where idmetier='".$proj['idmetier2']."'");
 $tmet2 = $resultmet2->fetch_assoc();
 
$idconstructeur=$proj['iduser'];
if ($iduse and $idconstructeur and $iduse!=$idconstructeur){
	$visiteurs=array();
	$resultvisiteur = $db->query("select * from visiteurprojet where idprojet='".$idproje."'");
    $visiteur = $resultvisiteur->fetch_assoc();
    $visiteurs[1]=$iduse;
	for ($i=2; $i <10; $i++) {
	                      $j=$i-1;
	                      $visiteurs[$i]=$visiteur['v'.$j];
						 }
		$decalvisiteur = $db->query("update visiteurprojet set v1='".$visiteurs[1]."', v2='".$visiteurs[2]."',v3='".$visiteurs[3]."',v4='".$visiteurs[4]."',v5='".$visiteurs[5]."' ,
       v6='".$visiteurs[6]."', v7='".$visiteurs[7]."',v8='".$visiteurs[8]."',v9='".$visiteurs[9]."'where idprojet='".$idproje."'");                                               
       if (!$decalvisiteur) {
       throw new Exception('impossible de se connecter a la base ');  
       } 		   
	}
?>



<body>
	<div class="pied">           
            <h2><?php echo utf8_encode($tlieu['nomlieu']);?> - <span class="h"> <?php echo utf8_encode($proj['nomprojet']);?> 
            </span> - <?php echo utf8_encode($proj['ville']);?> , <?php echo utf8_encode($tdep['nom']);?> </h2>
        </div>
        <div class="demande"> &nbsp;<?php echo utf8_encode($proj['couttotal'])-utf8_encode($proj['financementperso']);?>&euro; &nbsp;</div> 
        
         <?php
         
        if(!$iduse){
       echo' <div class="connexion"  id="connect"> <p>&bull; Me connecter</p><form method="post" action="identification.php">			
        <p class="connexion" style="visibility:hidden;">Pseudonyme :<br/>
			         <input type="text" name="pseudo" id="pseudo" size="20" maxlength="30"/>
			         <br/><br/>Mot de passe :
			         <br/>
			         <input type="password" name="passwd" id="passwd" size="20" maxlength="30"/><br/><br/>
			         
			         <input type="submit" value="Valider"/><br/><br/></p>
			         <input type="hidden" name="idprojet" value="'.$idproje.'"/>
			         <input type="hidden" name="url" value="projet.php"/>
			         </form></div> ';
				  }
				  else{
					 
			        echo' <div class="connexion"  id="connect"><p>&bull; Me déconnecter</p>	<form method="post" action="deconnexion.php">	
                     <p class="connexionn" style="visibility:hidden;"><b>Confirmer :</b><br/> 	
			         <input type="hidden" name="url" value="projet.php"/>
			         <input type="hidden" name="idprojet" value="'.$idproje.'"/>
			        <input type="submit" value="Valider"/><br/></p></form></div> ';
				}  
			?>        
         <script type="text/javascript" src="evenements.js"></script>
        <?php
				if ( $iduse){ $mapage="mapage.php" ;}else{ $mapage="pagepersonnelle.php";}
			?>		          
        <div class="navv">
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
                 if ( $proj['iduser']){
				 $db = connectbase(); 
                 $resultp = $db->query("select photo1,nomprojet,idprojet from projet where iduser='".$proj['iduser']."'");
                 $num_resultp = $resultp->num_rows;
                  If ($num_resultp!=0){
						 for ($i=0; $i <$num_resultp; $i++) {
	                      $proje = $resultp->fetch_assoc();
	                      $photo[$i]=$proje['photo1'];
	                      $nomprojet[$i]=$proje['nomprojet'];
	                      $id[$i]=$proje['idprojet'];
	                      echo'<div class="navprojetimg" ><a class="navprojet" href="projet.php?idprojet='.$id[$i].'"><img src="img/'.$photo[$i].'" height=30px width=40px>
	                <p>'.utf8_encode($nomprojet[$i]).'
	                      </p></a></div><br>';
						 }
						
				     }
                    
			   }  
				     
 //$db->close();
?>
            </div>
            
            
            
            
        </div>
        
        <?php
         visiteurprojet($idproje);
        ?>
        
         <div class="avatard">
				       <img src="img/<?php echo $tuser['avatar'];?>" alt="1 photo"/>
		</div>
        
        <div class="avatar">
				       <p class=avatar>Un projet de :<br/><span class=avatar> <?php echo utf8_encode($tuser['pseudo']);?></span></p>
		</div>
		<div class="avat">
				       <a href="mapage.php?idprojet=<?php echo $idproje; ?> ">&nbsp;Son Profil&nbsp;</a>
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

<br/>
  
  <iframe width="80%" height="200px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=<?php echo $proj['carte'].'&amp;iwloc=A&amp;output=embed'
  ;?>></iframe> <br /><br/>                
           
            </div>
            
     <div class=sectionn>   
	   <div class="article">                                           
           	    
						
				    <div class="photo">
				       <img class="photos" src="img/<?php echo $proj['photo1'];?>" alt="1 photo"/>
				    </div>
				    <div class="photo">
				       <img class="photos" src="img/<?php echo $proj['photo2'];?>" alt="1 photo"/>
				    </div>
				    <div class="photo">
				     <img class="photos" src="img/<?php echo $proj['photo3'];?>" alt="1 photo"/>
				    </div>
				    <div class="photo">
				      <img class="photos" src="img/<?php echo $proj['photo4'];?>" alt="1 photo"/>
				    </div>							
				    <div class="photo">
				       <img class="photos" src="img/<?php echo $proj['photo2'];?>" alt="1 photo"/>
				    </div>
				    <div class="info" >
			         <p class="info"><?php echo $proj['textcourt'];?></p>				
			        </div>
			        
			        
			        <div class="associee"><p>Associé(e)s recherché(e)s :	</p>
		           <div class="associe">
				     <p class="associes">Nombre : <span class="number"><?php echo utf8_encode($proj['nbassocie']);?> personne(s)</span></p>
				     <p class="associes">1er domaine : <span class="number"><?php echo utf8_encode($tdom1['nomdomaine']);?> </span></p>
				     <p class="associes">2nd domaine : <span class="number"><?php echo utf8_encode($tdom2['nomdomaine']);?> </span></p>
				     
				   </div>
				   <div class="associed">
					   <p class="associes"></p>
				     <p class="associes">Métier : <span class="number"><?php echo utf8_encode($tmet1['nommetier']);?> </span></p>
				     <p class="associes">Métier : <span class="number"><?php echo utf8_encode($tmet2['nommetier']);?> </span></p>
				     				
		           </div>
		           </div>
			         <hr/>
			         
			         <div class="projete"><p>Le Projet :	</p>
		           <div class="projet">
				     <p class="projets">Investissement total : <span class="number"><?php echo utf8_encode($proj['investissementtotal']);?> &nbsp;€</span></p>
				     <p class="projets">Aménagement foncier : <span class="number"><?php echo utf8_encode($proj['amenagefoncier']);?> &nbsp;€</span></p>
				     <p class="projets">Aménagement mobilier : <span class="number"><?php echo utf8_encode($proj['amenagemobilier']);?> &nbsp;€</span></p>
				     <p class="projets">Investissement en matériels : <span class="number"><?php echo utf8_encode($proj['amenagemateriel']);?> &nbsp;€</span></p>
				   </div>
				   <div class="projetd">
				     <p class="projets">Embauche(s) prévue(s) : <span class="number"><?php echo utf8_encode($proj['embauche']);?>  personnes</span></p>
				     <p class="projets">Contrat proposé : <span class="number"><?php echo utf8_encode($proj['contrat']);?> </span></p>
				     <p class="projets">Structure juridique prévue : <span class="number"><?php echo $proj['juridique'];?> </span></p>				
		           </div>
		           </div>
			         <hr/>
			        <div class="lelocale"><p>Le local :	</p>
			        <div class="lelocal">
				     <p class="lelocals">Prix d'achat : <span class="number"><?php echo $proj['prixachat'];?>&nbsp;€</span></p>
				     <p class="lelocals">Superficie : <span class="number"><?php echo $proj['superficie'];?>&nbsp;m2</span></p>
				      <p class="lelocals">Situation : <span class="number"><?php echo $proj['situation'];?></span></p>
				     
				    </div>
				     <div class="lelocalc"><p class="lelocals">Région : <span class="number"><?php echo utf8_encode($treg['nom']);?> </span></p>
				     <p class="lelocals">Département : <span class="number"><?php echo utf8_encode($tdep['nom']);?> </span></p>
				     <p class="lelocals">Ville : <span class="number"><?php echo utf8_encode($proj['ville']);?> <?php echo utf8_encode($proj['codepostal']);?></span></p>					
		             </div>
		            
				     <div class="lelocald"><p class="lelocals">D.P.E. : <span class="number"><?php echo $tdpe['dpe'];?></span></p>
				     <p class="lelocals">G.E.S. : <span class="number"><?php echo $tges['ges'];?></span></p>
				    <p class="lelocals">Etat : <span class="number"><?php echo utf8_encode($tetat['etat']);?></span></p>						
		            </div>
		            </div>
			        <hr/>
			        <div class="economiquee"><p>Données économiques <?php echo $crea;?> :	</p>
			        <div class="economique">
				      <p class="economiques">Fonds : <span class="number"><?php echo $proj['coutfonds'];?>&nbsp;€</span></p>
				      <p class="economiques">Loyer : <span class="number"><?php echo $proj['loyerfonds'];?>&nbsp;€</span></p>
				      <p class="economiques">Chiffre d'affaire : <span class="number"><?php echo $proj['ca'];?>&nbsp;€</span></p>
				      
				    </div>
				    <div class="economiquec"><p class="economiques">E.B.E. : <span class="number"><?php echo $proj['ebe'];?>&nbsp;€</span></p>
				     <p class="economiques">Ch. de fonctionnement : <span class="number"><?php echo $proj['chargesf'];?>&nbsp;€</span></p>
				     <p class="economiques">Consommations H.T. : <span class="number"><?php echo $proj['consommations'];?>&nbsp;€</span></p>				
		           </div>
				    <div class="economiqued">
				    <p class="economiques">M.B. : <span class="number"><?php echo $proj['mb'];?>&nbsp;€</span></p>
				     <p class="economiques">Impôt sociétés : <span class="number"><?php echo $proj['impot'];?>&nbsp;€</span></p>
				     <p class="economiques">Résultat net : <span class="number"><?php echo $proj['rnet'];?>&nbsp;€</span></p>				
		           </div>
		           <?php echo'<hr class="locaux"/>';?>
		           <p class="economiques">Environnement économique :</p>
		           <span class="numbers"><?php echo $proj['environnement'];?></span>
		           </div>
		           
		           
		           		           
		           <div class="cout"><p class="cout"><span class="crearep">&nbsp;<?php echo $crearep;?>&nbsp;</span>Coût Total : <span class="number">
					   <?php echo utf8_encode($proj['couttotal']);?>&nbsp;€</span>
		            Financement personnel : <span class="number"><?php echo utf8_encode($proj['financementperso']);?>&nbsp;€</span>
				    Financement manquant   : <span class="number"><?php echo utf8_encode($proj['couttotal'])-utf8_encode($proj['financementperso']);?>&nbsp;€</span></p>				
		           </div>
		      
		          <div class="boxe" id=12>
				  <p class="description"><img src="description.jpg" alt="1 photo"/></p>
                 <?php echo $proj['descriptionlongue'];?>
                </div>  
                <div class="lienss"><p class="projets">Liens en complément :   </p>
				<ul class="liens">
                <li class="liens">&bull;&nbsp;&nbsp;<a href="<?php echo utf8_encode($proj['lienenvironnement']);?>">Environnement</a></li>
                <li class="liens">&bull;&nbsp;&nbsp;<a href="<?php echo utf8_encode($proj['lieneconomique']);?>">Environnement économique</a></li>
                <li class="liens">&bull;&nbsp;&nbsp;<a href="<?php echo utf8_encode($proj['lienannonce']);?>">Annonce</a></li>
                <li class="liens">&bull;&nbsp;&nbsp;<a href="<?php echo utf8_encode($proj['lienetudemarche']);?>">Etude de marché</a></li>               
                </ul>		
		        </div> 
		     <hr/>
		     <?php   
		     $idvirtuelle=avatar($iduse);
	       
	         $pseudo=$idvirtuelle['pseudo'];   
		    ?> 
		     
         <div id="discussions" class="box">
          <div class="message" id="message-div">
            <h5><?php echo $pseudo;?>  <span> : laisser un message</span> </h3>
            <form onsubmit="">
              <div class="aireecriture">
                <textarea id="message" name="message" rows="3"></textarea> <input id="iduser" name="iduser" value="<?php echo $proj['iduser'];?>" type="hidden"> 
                <input id="idvisiteur" name="idvisiteur" value="<?php echo $iduse;?>" type="hidden">
                <input id="idprojet" name="idprojet" value="<?php echo $idproje;?>" type="hidden"> </div>
              <div class="write-message-actions"> 
              <input value="Envoyer" onclick="xajax_envoyer(xajax.getFormValues(this.form)); return false;" type="submit"> 
              <label><input class="checkbox" id="prive" type="checkbox">Privé</label>
              </div>
            </form>
          </div>
        </div>
        <div id="block" class="box">
          <?php 
		    $db = connectbase();
		    $resultmessage = $db->query("select idmessage,message,idvisiteur from messagep where idprojet='".$idproje."' ORDER BY idmessage DESC LIMIT 5");
            $num_results =$resultmessage->num_rows;
            If ($num_results!=0){ 
			for ($i=0; $i<$num_results; $i++) { 
				$tmessage =$resultmessage->fetch_assoc();
				 $resultq = $db->query("select pseudo,avatar from user where iduser='".$tmessage['idvisiteur']."'");
                 $row = $resultq->fetch_assoc();
                 $avat=$row['avatar'];
                 $pseud=$row['pseudo'];
                 $resultq->free();
                 $r=$i%2; 
                 $cha=$cha.'<div class="message'.$r.'" style="border:solid 1px #4118b1">
                 <div class="messa"><img class="message10" src="img/'.$avat.'" alt="pdp"><p  class="message10" ></p></div><div class="messad"><span>'.$tmessage['message'].'</span></div>
                 </div></br>';
              } 
          } 
          echo $cha;
           ?> 
           </div>
                <script type="text/javascript">
                        //refresh();// On appelle la fonction refresh() pour lancer le script.
                </script>       
        </div> 
       </div>
     </div><br/><br/><br/><br/><br/><br/>

</body>

</html>
<?php
 }
 
 ?>
