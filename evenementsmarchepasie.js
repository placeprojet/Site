var clickme = document.getElementById('connect');
    pchild=clickme.getElementsByTagName('p');
    clickme.addEventListener('click', function(e) {if(pchild[1].style.visibility='hidden'){pchild[1].style.visibility='visible';
    pchild[0].style.height='160';}e.target.innerHTML = '&bull; Fermer le formulaire';}, false);
var blurme = document.getElementById('connect');    
    pchilds=blurme.getElementsByTagName('p');
    blurme.addEventListener('dblclick', function(f){if(pchilds[1].style.visibility='visible'){pchilds[1].style.visibility='hidden';
    pchilds[1].style.height='160';}f.target.innerHTML = '&bull; Me connecter';}, false);
