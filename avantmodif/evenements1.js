var clickme = document.getElementById('connect');
 tache ='<p>&bull; Me connecter non</p><form method="post" action="receptionformulaire1.php"><p class="connexion" >Pseudonyme :<br/><input type="text" name="pseudo" size="20" maxlength="30"/><br/><br/>Mot de passe :<br/><input type="password" name="passwd" size="20" maxlength="30"/><br/><br/><input type="submit" value="Valider"><br/><br/></p>';
  
    clickme.addEventListener('click', function(e) {
     
     			         e.target.innerHTML = tache;
		 
    }, false);
var blurme = document.getElementById('connect');    
   blurme.addEventListener('dblclick', function(f) {
       f.target.innerHTML = 'Vous etes sorti !';
    }, false);




/*pchild=this.getElementsByTagName('p');
 if(pchild[0].style.visibility!='hidden'){
	 pchild[0].style.visibility='hidden'; pchild[0].style.height='0';
	 }
	 else{
		 pchild[0].style.visibility=''; pchild[0].style.height='';
		 }*/
