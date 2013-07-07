
<?php
require_once('connexionbase.php');
require_once('fcmonavatar.php');

session_start();
?>
 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	
<script src="oXHR.js"></script>
    <title>CoCreer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
       
        <link rel="stylesheet" href="styleboite.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        
</head> 
<body>
	
  

 <section class=sectionn> 
<?php
$fich1=new fiche();
$fich1->boxprojet(1);
?>
</section>
 <section class=sectionn> 
 <?php
 $fich2=new fiche();
 $fich1->boxprojet(2);
?>
</section>

         

<?php
class fiche {
  

public function boxprojet($idprojet){
$db = connectbase();
$resultp = $db->query("select * from projet where idprojet='".$idprojet."'");
 $proj = $resultp->fetch_assoc();
if($proj['crearep']==1){
	  $crearep="Création";
	  $crea="prévisionnelles";
}
else{
	  $crearep="Reprise";
	  $crea="actuelles";
}

//$db = connectbase();
$resultu = $db->query("select * from user where iduser='".$proj['iduser']."'");
 $tuser = $resultu->fetch_assoc();
 
 $resultlieu = $db->query("select nomlieu from lieuactivite where idlieu='".$proj['idlieu']."'");
 $tlieu = $resultlieu->fetch_assoc();
 
 $resultdep = $db->query("select nom from departements where departement_id='".$proj['iddepartement']."'");
 $tdep = $resultdep->fetch_assoc();
 
 $resultdom1 = $db->query("select nomdomaine from domaines where iddomaine='".$proj['iddomaine1']."'");
 $tdom1 = $resultdom1->fetch_assoc();
 
 $resultdom2 = $db->query("select nomdomaine from domaines where iddomaine='".$proj['iddomaine2']."'");
 $tdom2 = $resultdom2->fetch_assoc();
 
 $resultreg = $db->query("select nom from regions where region_id='".$proj['idregion']."'");
 $treg = $resultreg->fetch_assoc();
 
 $resultetat = $db->query("select etat from etat where idetat='".$proj['idetat']."'");
 $tetat = $resultetat->fetch_assoc();
 
 $resultdpe = $db->query("select dpe from dpe where iddpe='".$proj['iddpe']."'");
 $tdpe = $resultdpe->fetch_assoc();
 
 $resultges = $db->query("select ges from ges where idges='".$proj['idges']."'");
 $tges = $resultges->fetch_assoc();
 
 $resulttag = $db->query("select tag from tag where (idtag='".$tuser['qualite1']."' or  idtag='".$tuser['default1']."')");
                     $num_results = $resulttag->num_rows;
                     If ($num_results!=0){
						 for ($i=0; $i <$num_results; $i++) {
	                      $ttag = $resulttag->fetch_assoc();
	                      $tag[$i]=$ttag['tag'];
						 }
				     }
 $resultdomaine = $db->query("select nomdomaine from domaines where iddomaine='".$tuser['iddomaine']."'");
 $tdomaine = $resultdomaine->fetch_assoc();
 
 $resultlivre = $db->query("select * from livre where idlivre='".$tuser['idlivre']."'");
 $livre = $resultlivre->fetch_assoc();
 
 $resultfilm = $db->query("select * from film where idfilm='".$tuser['idfilm']."'");
 $film = $resultfilm->fetch_assoc();
 
 $resultsport = $db->query("select * from sport where idsport='".$tuser['idsport']."'");
 $sport = $resultsport->fetch_assoc();
 
 $resultpeintre = $db->query("select * from peintre where idpeintre='".$tuser['idpeintre']."'");
 $peintre = $resultpeintre->fetch_assoc();
 
 $resultsecteur = $db->query("select couleur,couleur2 from secteurs where idsecteur='".$proj['idsecteur']."'");
 $secteur = $resultsecteur->fetch_assoc();
 
 $resultattente = $db->query("select * from attente where idprojet='".$idprojet."'");
 $attente = $resultattente->fetch_assoc();
 
 $db->close();
?>


            
            
  




 
   
	<article class="article">               
         <ul class="tab"><?php $id=$idprojet*10;?> 
           <li><a href="javascript://"class="Projet"
            style="background: -moz-linear-gradient(bottom, #<?php echo $secteur['couleur'];?>, #<?php echo $secteur['couleur2'];?>)" onclick="document.getElementById('<?php echo $id;
           ?>').innerHTML =document.getElementById('<?php echo $id+1;?>').innerHTML;">
               <span >Projet</span></a></li>
           <li><a href="javascript://"class="Description"  style="background: -moz-linear-gradient(bottom, #<?php echo $secteur['couleur'];?>, #<?php echo $secteur['couleur2'];?>)" 
           onclick="document.getElementById('<?php echo $id;?>').innerHTML =document.getElementById('<?php echo $id+2;?>').innerHTML;">
			   <span>Description</span></a></li>
           ﻿<li><a href="javascript://"class="Environnement" style="background: -moz-linear-gradient(bottom, #<?php echo $secteur['couleur'];?>, #<?php echo $secteur['couleur2'];?>)" 
            onclick="document.getElementById('<?php echo $id;?>').innerHTML =document.getElementById('<?php echo $id+3;?>').innerHTML;">
			   <span>Environnement</span></a></li>
           <li><a href="javascript://"class="Profil" style="background: -moz-linear-gradient(bottom, #<?php echo $secteur['couleur'];?>, #<?php echo $secteur['couleur2'];?>)" 
            onclick="document.getElementById('<?php echo $id;?>').innerHTML =document.getElementById('<?php echo $id+4;?>').innerHTML;">
			   <span>Profil</span></a></li>
           <li><a href="javascript://"class="Contact"  style="background: -moz-linear-gradient(bottom, #<?php echo $secteur['couleur'];?>, #<?php echo $secteur['couleur2'];?>)" 
           onclick="document.getElementById('<?php echo $id;?>').innerHTML =document.getElementById('<?php echo $id+5;?>').innerHTML;">
			   <span>Contact</span></a></li>
           <li><a href="javascript://"class="Culture"  style="background: -moz-linear-gradient(bottom, #<?php echo $secteur['couleur'];?>, #<?php echo $secteur['couleur2'];?>)" 
            onclick="document.getElementById('<?php echo $id;?>').innerHTML =document.getElementById('<?php echo $id+6;?>').innerHTML;" >
			   <span>Culture</span></a></li>
           ﻿﻿﻿<li><a href="javascript://"class="Similaires" style="background: -moz-linear-gradient(bottom, #<?php echo $secteur['couleur'];?>, #<?php echo $secteur['couleur2'];?>)" 
            onclick="document.getElementById('<?php echo $id;?>').innerHTML =document.getElementById('<?php echo $id+7;?>').innerHTML;">
			   <span>Similaires</span></a></li>
        </ul>
                
               
         <div class="boxon" id=<?php echo $id;?>></div>
               
         <div class="box"  id=<?php echo $id+1;?>>
				<h5><?php echo utf8_encode($tlieu['nomlieu']);?> - <span class="h"> <?php echo utf8_encode($proj['nomprojet']);?> 
            </span> - <?php echo utf8_encode($proj['ville']);?> , <?php echo utf8_encode($tdep['nom']);?></h5>
					<div class="photoprojet">
				     <a href="projet.php?idprojet=<?php echo $idprojet;?>"> <img class="photoprojet" src="img/<?php echo $proj['photo1'];?>" alt="1 photo" ></a>
				   </div>
				   <div class="info" >
			        <p class="info"><?php echo $proj['textcourt'];?></p>				
			       </div>	
				   <div class="cout"><span class="crearep">&nbsp;<?php echo $crearep;?>&nbsp;</span></div>
				   <div class="coup">
				   <p class="cout"><ul><li>Coût Total : <span class="number">
					   <?php echo utf8_encode($proj['couttotal']);?>&nbsp;€</span></li></br><li>
		            Financement personnel : <span class="numbers"><?php echo utf8_encode($proj['financementperso']);?>&nbsp;€</span></li></br><li>
				    Financement manquant   : <span class="numbers"><?php echo utf8_encode($proj['couttotal'])-utf8_encode($proj['financementperso']);?>&nbsp;€</li></span></p>				
		          </ul>
		           </div>
		           <div class="coupd"><p class="cout"><ul><li>Associé(e)(s) recherché(e)(s) :	
		           <span class="number"><?php echo utf8_encode($proj['nbassocie']);?> personne(s)</span></p>
				     <p class="cout"><li>Premier domaine : <span class="numbers"><?php echo utf8_encode($tdom1['nomdomaine']);?> </span></li></p>
				     <p class="cout"><li>Deuxième domaine : <span class="numbers"><?php echo utf8_encode($tdom2['nomdomaine']);?> </span></li></p>
				    </ul></div>	
		</div>
			
			
			 
			
			
			
			
			
		<div class="boxe" id=<?php echo $id+2;?>>
			      <div class="photoprojet">
				     <a href="projet.php?idprojet=<?php echo $idprojet;?>"> <img class="photolelocal" src="img/<?php echo $proj['photo2'];?>" alt="1 photo" ></a>
				  </div></br>
                  <div class="lelocale"><p>Le local :	</p>
			         <div class="lelocal">
				     <p class="lelocals">Prix d'achat : <span class="numbers"><?php echo $proj['prixachat'];?>&nbsp;€</span></p>
				     <p class="lelocals">Superficie : <span class="numbers"><?php echo $proj['superficie'];?>&nbsp;m2</span></p>
				     <p class="lelocals">Situation : <span class="numbers"><?php echo utf8_encode($proj['situation']);?></span></p>
				     </div>
				   </div>
				   <div class="economiquee"><p>Données économiques <?php echo $crea;?> :	</p>
				     <div class="economiquec">
					 <p class="economiques">Fonds : <span class="numbers"><?php echo $proj['coutfonds'];?>&nbsp;€</span></p>
				     <p class="economiques">Chiffre d'affaire : <span class="numbers"><?php echo $proj['ca'];?>&nbsp;€</span></p>
				     <p class="economiques">Résultat net : <span class="numbers"><?php echo $proj['rnet'];?>&nbsp;€</span></p>				
		             </div>
		           </div>
		            <div class="rojete"><p>Le Projet :	</p>
				     <div class="rojetd">
				     <p class="rojets">Embauche(s) prévue(s) : <span class="numbers"><?php echo utf8_encode($proj['embauche']);?>  personnes</span>
				     <p class="rojets">Contrat proposé : <span class="numbers"><?php echo utf8_encode($proj['contrat']);?> </span></p>
				     <p class="rojets">Structure juridique prévue : <span class="numbers"><?php echo utf8_encode($proj['juridique']);?> </span></p>				
		           </div>
		           </div>
		         
         </div> 
       
       <div class="boxe" id=<?php echo $id+3;?>>
		   <div class="photoprojet">
				     <a href="projet.php?idprojet=<?php echo $idprojet;?>"> <img class="photolelocal" src="img/<?php echo $proj['photo3'];?>" alt="1 photo" ></a>
				  </div>
         <p class="economiques">Environnement économique :</span></p>
		           <span class="numbers"><?php echo $proj['environnement'];?></span>
       </div> 
       
       <div class="boxe" id=<?php echo $id+4;?>>
                     <div class="photoprojet">
				     <a href="mapage.php?idprojet=<?php echo $idprojet;?>"> 
				     <img class="photouser" src="img/<?php echo $tuser['avatar'];?>" alt="[P.dP.]"/>
				     <img class="photouser" src="img/<?php echo $tuser['photo'];?>" alt="[P.dP.]" ></a></br>
				   </div>
				   <div class="infos" >
			        <span class="lelocals"><?php echo $tuser['descriptioncourte'];?></span>				
			       </div>
			       	<div class="persoe">
					<p class="rojets"><span class="crearep">&nbsp;<?php echo $tuser['pseudo'];?>&nbsp;</span></p>	
				   <div class="perso">
				   <p class="perso"><ul><li class="perso">Année de naissance : <span class="numbers"> <?php echo utf8_encode($tuser['annee']);?></span>
				   </li></br><li class="perso">Domaine professionnel : <span class="numbers"><?php echo utf8_encode($tdomaine['nomdomaine']);?></span></li></ul></p>
		            </div>
		            <div class="persod">
		             <p class="perso"><ul><li class="persod">Qualité   : <span class="numbers"><?php echo $tag[0];?></li></br>
		            <li class="persod">Défault   : <span class="numbers"><?php echo $tag[1];?></li></span></p>				
		           </ul>
		           </div>
		        </div>   
       </div> 
       
       <div class="boxe" id=<?php echo $id+5;?>>
		   <div class="photoprojet">
				     <a href="mapage.php?idprojet=<?php echo $idprojet;?>"> 
				     <img class="photouser" src="img/<?php echo $tuser['avatar'];?>" alt="[P.dP.]"/>
				     </a></br>
				   </div>
         <div class="privee"><p>Données personnelles :	<span class="numbers">(Si : non privées)</span></p>
			        <div class="prive">
				     <p class="prives">Nom : <span class="numbers"><?php echo utf8_encode($tuser['nom']);?></span></p>
				     <p class="prives">Prénom : <span class="numbers"><?php echo utf8_encode($tuser['prenom']);?></span></p>
				      
				     
				    </div>
				     <div class="privec"><p class="prives">Etat civil : <span class="numbers"><?php echo utf8_encode($tuser['civil']);?> </span></p>
				     
				     <p class="prives">Ville : <span class="numbers"><?php echo utf8_encode($tuser['ville']);?> <?php echo utf8_encode($tuser['codepostal']);?></span></p>					
		             </div>
		            
				     <div class="prived">
				     <p class="prives">Portable : <span class="numbers"><?php echo utf8_encode($tuser['portable']);?></span>
				    <p class="prives">Mail : <span class="numbers"><?php echo utf8_encode($tuser['mail']);?></span></p>						
		            </div>
		  </div>
       </div> 	
				
		<div class="boxe" id=<?php echo $id+6;?>>
			         <div class="photouser">
				     <a href="mapage.php?idprojet=<?php echo $idprojet;?>"> 
				     <img class="photouse" src="img/<?php echo $tuser['avatar'];?>" alt="[P.dP.]"/>
				     </a></br>
				   </div>
                    <div class="photoprojet">
				       <img class="photoproje" src="<?php echo $livre['couverture'];?>" alt="[P.dP.]"/>
				    </div>
				    <div class="photoprojet">
				       <img class="photoproje" src="<?php echo $film['affiche'];?>" alt="[P.dP.]"/>
				    </div>
				    <div class="photoprojet">
				     <img class="photoproje" src="<?php echo $sport['photosport'];?>" alt="[P.dP.]"/>
				    </div>						
				    <div class="photoprojet">
				       <img class="photoproje" src="<?php echo $tuser['image'];?>" alt="[P.dP.]"/>
				    </div>
				    <div class="cultuee"><p  style="color:#<?php echo $tuser['politique'];?>">Goûts personnels :	</p>
		           <div class="cultue">
				     <p class="cultues" style="color:#<?php echo $tuser['politique'];?>">Un livre : <span class="numbers"><?php echo $livre['titre'];?> </span></p>
				     <p class="cultues" style="color:#<?php echo $tuser['politique'];?>">Un auteur : <span class="numbers"><?php echo $livre['auteur'];?> </span></p>
				     <p class="cultues" style="color:#<?php echo $tuser['politique'];?>">Un sport : <span class="numbers"><?php echo $sport['sport'];?></span></p>
				    
				   </div>
				   <div class="cultued">
				     <p class="cultues" style="color:#<?php echo $tuser['politique'];?>">Un film : <span class="numbers"><?php echo $film['film'];?> </span>
				     <p class="cultues" style="color:#<?php echo $tuser['politique'];?>">Un réalisateur : <span class="numbers"><?php echo $film['realisateur'];?> </span></p>
				     <p class="cultues" style="color:#<?php echo $tuser['politique'];?>">Un peintre : <span class="numbers"><?php echo $peintre['peintre'];?> </span></p>				
		           </div>
		           </div>
       </div> 
       
       <div class="boxe" id=<?php echo $id+7;?>>
         Lorem ipsum dolor sit amet,
       </div> 
                          
     </article> 
         <script>
       document.getElementById('<?php echo $id;?>').innerHTML=document.getElementById('<?php echo $id+1;?>').innerHTML;
     </script>         
    
  
<?php
}
}
 ?> 
   
 
 <script>   (function() { // On utilise une IEF pour ne pas polluer l'espace global
     
    var storage = {}; // Contient l'objet du div en cours de déplacement
     
     
    function addEvent(element, event, func) { // Une fonction pour gérer les événements sous tous les navigateurs
        if (element.attachEvent) {
            element.attachEvent('on' + event, func);
        } else {
            element.addEventListener(event, func, true);
        }
    }
     
     
    function init() { // La fonction d'initialisation
        var elements = document.getElementsByTagName('section'),
            elementsLength = elements.length;
         
        for (var i = 0 ; i < elementsLength ; i++) {
            if (elements[i].className === 'sectionn') {
         
                addEvent(elements[i], 'mousedown', function(e) { // Initialise le drag & drop
                    var s = storage;
                    s.target = e.target || event.srcElement;
                    s.offsetX = e.clientX - s.target.offsetLeft;
                    s.offsetY = e.clientY - s.target.offsetTop;
                });
         
                addEvent(elements[i], 'mouseup', function() { // Termine le drag & drop
                    storage = {};
                });
            }
        }
         
        addEvent(document, 'mousemove', function(e) { // Permet le suivi du drag & drop
            var target = storage.target;
             
            if (target) {
                target.style.top = e.clientY - storage.offsetY + 'px';
                target.style.left = e.clientX - storage.offsetX + 'px';
            }
        });
    }
       
    init(); // On initialise le code avec notre fonction toute prête
     
})();


      </script>
      
    </body>
</body>
</html>
