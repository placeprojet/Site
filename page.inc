<?php
class Page {
  // Attributs de la classe Page
  public $contenu;
  
  /*public $image4; 
  public $largeur;
  public $panier;*/
  public $titre = "ALIM 2C";
  public $mots_cles = "ALIM 2C, alimentation,
                       les moteurs de recherche sont mes amis";
  public $boutons = array( "Accueil" => "index.php",
                           "Fruits"  => "type.php?nomtype=Fruits",
                           "L&eacute;gumes" => "type.php?nomtype=Legumes",
                           "Viandes" => "type.php?nomtype=Viandes",
                         );
  
  // Opérations de la classe Page
  public function __set($nom, $valeur) {
    $this->$nom = $valeur;
  }

  public function Afficher() {
    echo "<html>\n<head>\n";
    $this -> AfficherTitre();
    $this -> AfficherMotsCles();
    $this -> AfficherEntete();
    $this -> AfficherMenu($this->boutons);
    echo $this->contenu;
    $this -> AfficherPied();
    echo "</body>\n</html>\n";
  }
	
  public function AfficherTitre() {
    echo "<title>" . $this->titre . "</title>";
  }

  public function AfficherMotsCles() {
    echo '<meta name="keywords" content="' . $this->mots_clés . '"/>';
  }



public function AfficherclientPanier($panier,$largeur) {
	
   
  echo '<table width="'.$largeur.'" align="left" valign="top" cellpadding="0" cellspacing="0" border="0">
  <tr><td class="head" width="10%" align="left">';
  if (!$panier){	
    echo '</td></tr></table>';
	}
  else { 
	 echo '<iframe src="fenetrepanier.php" name="fenetre" border="0">
    '.$panier.'</iframe></td></tr></table>';					
	}
	 
}

  public function AfficherEntete() { 
?>  <html>
    
  <table width="100%" valign="center" cellpadding="12" cellspacing="0" border="0">
  <tr>
	<td class="head" width="25%" >
    <img src="motifff.jpg" alt="Alim2c" align="left" valign="center" height="" 
        width=""></td>
    <td class="head" width="50%" align="center"><img src="viande.jpeg" alt="Alim2c" align="left" valign="center" height="" 
        width=""><img src="legume.jpg" alt="Alim2c" align="center" valign="center" height="" 
        width=""><img src="conserve.jpeg" alt="Alim2c" align="right" valign="center" height="" 
        width=""></td>
	<td class="head" width="25%">	
    <img src="logo.jpeg" alt="Alim2c" align="right" height="" width=""></td>
  </tr>
  </table>
<?php
  }
public function AfficherEntetePanier($image4,$panier,$largeur,$poids,$contenprofiproducteur) { 
   
  echo '<table width="'.$largeur.'" valign="center" cellpadding="12" cellspacing="0" border="0">
  <tr><td class="head" width="25%" >';
  if (!$contenprofiproducteur){	
    echo '<img src="motifff.jpg" alt="Alim2c" align="left" valign="center" height="" 
        width=""></td>';
	}
  else { 
	 echo '<iframe src="fenetreproducteur.php" name="fenetre" border="0">
    '.$contenprofiproducteur.'</iframe></td>';					
	}
	if ($panier){
		$_SESSION['poids']=$poids;	
    echo '<td class="head" width="50%" align="center"><img src="viande.jpeg" alt="Alim2c" align="left" valign="center" height="" 
        width=""><img src="legume.jpg" alt="Alim2c" align="center" valign="center" height="" 
        width=""><a href=accueil.php?facture=1&poids='.$poids.' class="body" alt="Valider"><img src="'.$image4.'"  align="right" valign="center" height="" 
        width=""></a></td>
        <td class="pan" width="4%"></td>
	<td class="pan" width="21%"><iframe src="fenetrepanier.php" name="fenetre" border="0">
    '.$panier.'</iframe></td>
    </tr>
   </table>';
   }
   else{
	   echo '<td class="head" width="50%" align="center"><img src="viande.jpeg" alt="Alim2c" align="left" valign="center" height="" 
        width=""><img src="legume.jpg" alt="Alim2c" align="center" valign="center" height="" 
        width=""><img src="conserve.jpeg" alt="Alim2c" align="right" valign="center" height="" 
        width=""></td>
	<td class="head" width="25%">	
    <img src="logo.jpeg" alt="Alim2c" align="right" height="" width=""></td>
  </tr>
  </table>';					
	}
	 
}

public function AfficherMenucommande($boutons,$align) {
    echo '<p align="'.$align.'"><table class="pani" align="'.$align.'" bgcolor="white" 
          cellpadding="4" cellspacing="4">';
    echo "\n<tr>\n";

    // Calcul de la taille des bouton
    $largeur = 42 / count($boutons);

    while (list($nom, $url) = each($boutons)) {
      $this->AfficherBouton($largeur, $nom, $url, 
               !$this->EstPageCourante($url));
    }
    echo "</tr>\n";
    echo "</table></p>\n";
}

public function AfficherMenu($boutons) {
    echo '<table width="100%" bgcolor="white" 
          cellpadding="4" cellspacing="9">';
    echo "\n<tr>\n";

    // Calcul de la taille des bouton
    $largeur = 100 / count($boutons);

    while (list($nom, $url) = each($boutons)) {
      $this->AfficherBouton($largeur, $nom, $url, 
               !$this->EstPageCourante($url));
    }
    echo "</tr>\n";
    echo "</table>\n";
}

public function EstPageCourante($url) {
    if(strpos($_SERVER['PHP_SELF'], $url ) == false) {
      return false;
    } else {
      return true;
    }
  }

public function AfficherBouton($largeur, $nom, $url, $active = true) {
    if ($active and $nom!="Producteurs") {
      echo "<td width = \"" . $largeur . "%\">
	          <a href=\"" . $url . "\">
	          <img src=\"logo1.jpg\" alt=\"" . $name . "\" border=\"0\" /></a>
	          <a href=\"" . $url . "\"><span class=\"menu\">" . $nom . "</span></a>
	        </td>";
	 } else if ($nom!="Producteurs"){
	   echo "<td width=\"" . $largeur . "%\">
	           <img src=\"logo2.jpg\">
	           <span class=\"menu\">". $nom . "</span>
	         </td>";
	    } 
	    else if ($active and $nom=="Producteurs") {
      echo "<td class=pr width = \"" . $largeur . "%\" background=#000000>
	          <a href=\"" . $url . "\">
	          <img src=\"logo1.jpg\" alt=\"" . $name . "\" border=\"0\" /></a>
	          <a href=\"" . $url . "\"><span class=\"menu\">" . $nom . "</span></a>
	        </td>";
	 } else if ($nom=="Producteurs" ){
	   echo "<td class=pr width=\"" . $largeur . "%\" background=#000000>
	           <img src=\"logo2.jpg\">
	           <span class=\"menu\">". $nom . "</span>
	         </td>";
	    }   
	  }
	

  public function AfficherPied($pied)
  {
?>
<head>
	
<script src="oXHR.js"></script>
    <title>CoCreer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
       
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        
    </head> 
<body>
	
        <header class="pied">           
            <h2>Carnets de vols</h2>
        </header>
        
        <nav class="navv">
            <ul class="nav">
                <li class="nav"><a href="javascript://">Accueil</a></li>
                <li class="nav"><a href="javascript://">Blog</a></li>
                <li class="nav"><a href="javascript://">CV</a></li>
                <li class="nav"><a href="javascript://">Accueil</a></li>
                <li class="nav"><a href="javascript://">Blog</a></li>
                <li class="nav"><a href="javascript://">CV</a></li>
                <li class="nav"><a href="javascript://">Accueil</a></li>
                <li class="nav"><a href="javascript://">Blog</a></li>
                <li class="nav"><a href="javascript://">CV</a></li>
                <li class="nav"><a href="javascript://">Accueil</a></li>
                <li class="nav"><a href="javascript://">Blog</a></li>
                <li class="nav"><a href="javascript://">CV</a></li>
            </ul>
        </nav>
         <aside class="cote">
                <h3>Votre recherche :</h3>
                <p>Bonjour</p>
                <p>Bonjour</p>
                <p>Bonjour</p>
                <p>Bonjour</p>
                <p>Bonjour</p>
                <p>Bonjour</p>
            </aside>
     <section class=sectionn>   
	<article class="article">               
                <ul class="tab">
                  <li><a href="javascript://"class="Projet"
                  onclick="document.getElementById('10').innerHTML =document.getElementById('11').innerHTML;"><span >Projet</span></a></li>
                  <li><a href="javascript://"class="Description"><span>Description</span></a></li>
                  ﻿<li><a href="javascript://"class="Environnement"><span>Environnement</span></a></li>
                  <li><a href="javascript://"class="Profil"><span>Profil</span></a></li>
                  <li><a href="javascript://"class="Contact"><span>Contact</span></a></li>
                  ﻿<li><a href="javascript://"class="Culture"  onclick="document.getElementById('10').innerHTML =document.getElementById('12').innerHTML;" ><span>Culture</span></a></li>
                  ﻿﻿﻿<li><a href="javascript://"class="Similaires"><span>Similaires</span></a></li>
                </ul>
                <div class="boxon" id=10></div>
              <div class="box"  id=11>
			    
				<h5><a href="http://www.agorabiz.com/annonces/details/fonds-de-commerce/a-vendre-fonds-de-commer-brasserie-sur-albi-81000/211405">
					Fonds de commerce - BRASSERIE - sur Albi Tarn</a></h5>				
											
				<div class="photo">
				<img class="rounded" src="http://dyn.visuels.poliris.com/thumbnails/f/7/5/a/f75a9fd9-4049.jpg" alt="1 photo">
				</div>
				<div class="info" >
			    <p class="info">Brasserie environ 230m² avec ses 90 couverts + 50 en terrasse. Matériel et agencements en bon état. CA: 338 738&nbsp;€</p>				
			    </div>	
				<div class="price">Prix : <span class="number">310 140&nbsp;€</span>
				</div>
				 <div class="financement">Capacité de financement : 150 000&nbsp;€
				</div>	
					
		      </div>
		      <div class="boxe" id=12>
     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
     ﻿laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
     ﻿proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </div>              
            </article> 
                 <script>
      document.getElementById('10').innerHTML=document.getElementById('11').innerHTML;
            </script>  
            </section>
            
            <section class=sectionn>
            <article class="article">               
                <ul class="tab">
                  <li><a href="javascript://"class="Projet"
                  onclick="document.getElementById('20').innerHTML =document.getElementById('21').innerHTML;"><span >Projet</span></a></li>
                  <li><a href="javascript://"class="Description"><span>Description</span></a></li>
                  ﻿<li><a href="javascript://"class="Environnement"><span>Environnement</span></a></li>
                  <li><a href="javascript://"class="Profil"><span>Profil</span></a></li>
                  <li><a href="javascript://"class="Contact"><span>Contact</span></a></li>
                  ﻿<li><a href="javascript://"class="Culture"  onclick="document.getElementById('20').innerHTML =document.getElementById('22').innerHTML;" ><span>Culture</span></a></li>
                  ﻿﻿﻿<li><a href="javascript://"class="Similaires"><span>Similaires</span></a></li>
                </ul>
                <div class="boxon"  id=20></div>
              <div class="box" id=21>
			   
				<h5><a href="http://www.agorabiz.com/annonces/details/fonds-de-commerce/a-vendre-fonds-de-commer-brasserie-sur-albi-81000/211405">
					Fonds de commerce - BRASSERIE - sur Albi Tarn</a></h5>				
													
				<div class="photo">
				<img class="rounded" src="http://dyn.visuels.poliris.com/thumbnails/f/7/5/a/f75a9fd9-4049.jpg" alt="1 photo">
				</div>
				<div class="info">
			    <p class="info">Brasserie environ 230m² avec ses 90 couverts + 50 en terrasse. Matériel et agencements en bon état. CA: 338 738&nbsp;€</p>				
			    </div>	
				<div class="price">Prix : <span class="number">310 140&nbsp;€</span>
				</div>
				 <div class="financement">Capacité de financement : 150 000&nbsp;€
				</div>		
		      </div>
                <div class="boxe" id=22>
     ﻿Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
     ﻿laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
     ﻿proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </div>
            </article>
            <script>
     document.getElementById('20').innerHTML=document.getElementById('21').innerHTML;
            </script>  
            </section>
            
            <section class=sectionn>
            <article class="article">               
                <ul class="tab">
                  <li><a href="javascript://"class="Projet"
                  onclick="document.getElementById('30').innerHTML =document.getElementById('31').innerHTML;"><span >Projet</span></a></li>
                  <li><a href="javascript://"class="Description"><span>Description</span></a></li>
                  ﻿<li><a href="javascript://"class="Environnement"><span>Environnement</span></a></li>
                  <li><a href="javascript://"class="Profil"><span>Profil</span></a></li>
                  <li><a href="javascript://"class="Contact"><span>Contact</span></a></li>
                  ﻿<li><a href="javascript://"class="Culture"  onclick="document.getElementById('30').innerHTML =document.getElementById('32').innerHTML;" ><span>Culture</span></a></li>
                  ﻿﻿﻿<li><a href="javascript://"class="Similaires"><span>Similaires</span></a></li>
                </ul>
                <div class="boxon" id=30></div>
              <div class="box" id=31>
			    <div class="itemprojet">
				<h5><a href="http://www.agorabiz.com/annonces/details/fonds-de-commerce/a-vendre-fonds-de-commer-brasserie-sur-albi-81000/211405">
					Fonds de commerce - BRASSERIE - sur Albi Tarn</a></h5>				
				</div>										
				<div class="photo">
				<img class="rounded" src="http://dyn.visuels.poliris.com/thumbnails/f/7/5/a/f75a9fd9-4049.jpg" alt="1 photo">
				</div>
				<div class="info" >
			    <p class="info">Brasserie environ 230m² avec ses 90 couverts + 50 en terrasse. Matériel et agencements en bon état. CA: 338 738&nbsp;€</p>				
			    </div>	
				<div class="price">Prix : <span class="number">310 140&nbsp;€</span>
				</div>
				 <div class="financement">Capacité de financement : 150 000&nbsp;€
				</div>		
		      </div>
                <div class="boxe" id=32>
     ﻿Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
     ﻿laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
     ﻿proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </div>
            </article>
            <script>
     document.getElementById('30').innerHTML=document.getElementById('31').innerHTML;
            </script>  
            </section>
            
            <section class=sectionn>
            <article class="article">               
                <ul class="tab">
                  <li><a href="javascript://"class="Projet"
                  onclick="document.getElementById('40').innerHTML =document.getElementById('41').innerHTML;"><span >Projet</span></a></li>
                  <li><a href="javascript://"class="Description"><span>Description</span></a></li>
                  ﻿<li><a href="javascript://"class="Environnement"><span>Environnement</span></a></li>
                  <li><a href="javascript://"class="Profil"><span>Profil</span></a></li>
                  <li><a href="javascript://"class="Contact"><span>Contact</span></a></li>
                  ﻿<li><a href="javascript://"class="Culture"  onclick="document.getElementById('40').innerHTML =document.getElementById('42').innerHTML;" ><span>Culture</span></a></li>
                  ﻿﻿﻿<li><a href="javascript://"class="Similaires"><span>Similaires</span></a></li>
                </ul>
                <div class="boxon" id=40></div>
              <div class="box" id=41>
			    <div class="itemprojet">
				<h5><a href="http://www.agorabiz.com/annonces/details/fonds-de-commerce/a-vendre-fonds-de-commer-brasserie-sur-albi-81000/211405">
					Fonds de commerce - BRASSERIE - sur Albi Tarn</a></h5>				
				</div>										
				<div class="photo">
				<img class="rounded" src="http://dyn.visuels.poliris.com/thumbnails/f/7/5/a/f75a9fd9-4049.jpg" alt="1 photo">
				</div>
				<div class="info" >
			    <p class="info">Brasserie environ 230m² avec ses 90 couverts + 50 en terrasse. Matériel et agencements en bon état. CA: 338 738&nbsp;€</p>				
			    </div>	
				<div class="price">Prix : <span class="number">310 140&nbsp;€</span>
				</div>
				 <div class="financement">Capacité de financement : 150 000&nbsp;€
				</div>		
		      </div>
                <div class="boxe" id=42>
     ﻿Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
     ﻿laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
     ﻿proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </div>
            </article>
            <script>
     document.getElementById('40').innerHTML=document.getElementById('41').innerHTML;
            </script>  
            </section>      
                    
        <footer class="pied">
            <p class="pied">Copyright gi - Tous droits réservés<br />
            <a href="javascript://">Me contacter !</a></p>
        </footer>
         <script>
     /*(function() { // On utilise une IEF pour ne pas polluer l'espace global
     
    var storage = {}; // Contient l'objet du div en cours de déplacement
     
     
    function addEvent(element, event, func) { // Une fonction pour gérer les événements sous tous les navigateurs
        if (element.attachEvent) {
            element.attachEvent('on' + event, func);
        } else {
            element.addEventListener(event, func, true);
        }
    }
     
     
    function init() { // La fonction d'initialisation
        var elements = document.getElementsByTagName('article'),
            elementsLength = elements.length;
         
        for (var i = 0 ; i < elementsLength ; i++) {
            if (elements[i].className === 'article') {
         
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
     
})();*/
      </script>
    </body>
<?php
  }
}
?>
