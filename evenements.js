var clickme = document.getElementById('connect');
    pchild=clickme.getElementsByTagName('p');
    if (clickme.attachEvent) {
		clickme.attachEvent('onmouseover', function(e) {if(pchild[1].style.visibility='hidden'){pchild[1].style.visibility='visible'
    pchild[0].style.height='160';}e.parentNode.innerHTML = '&bull; Fermer le formulaire';});
   }else if (clickme.addEventListener){
    clickme.addEventListener('click', function(e) {if(pchild[1].style.visibility='hidden'){pchild[1].style.visibility='visible';
    pchild[0].style.height='160';}e.parentNode.innerHTML = '&bull; Fermer le formulaire';}, false);
    }
   
var blurme = document.getElementById('connect');    
    pchilds=blurme.getElementsByTagName('p');
     if (blurme.attachEvent) {
	blurme.attachEvent('ondblclick', function(f){if(pchilds[1].style.visibility='visible'){pchilds[1].style.visibility='hidden';
    pchilds[1].style.height='160';}f.parentNode.innerHTML = '&bull; Me connecter';});
   }else if (blurme.addEventListener){
    blurme.addEventListener('dblclick', function(f){if(pchilds[1].style.visibility='visible'){pchilds[1].style.visibility='hidden';
    pchilds[1].style.height='160';}f.parentNode.innerHTML = '&bull; Me connecter';}, false);
    }
