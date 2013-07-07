function demande(domaineSelect) {
	
    var value = domaineSelect.options[domaineSelect.selectedIndex].value;
    var xhr2   = getXMLHttpRequest();
    
    xhr2.onreadystatechange = function() {
        if (xhr2.readyState == 4 && (xhr2.status == 200 || xhr2.status == 0)) {
			 
            lireData(xhr2.responseText);
           
                      
        } else if (xhr2.readyState < 4) {
           
        }
    };
     
    xhr2.open("POST", "data1.php", true);
    xhr2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr2.send("iddomaine1=" + value);
 
}
 
function lireData(metier1) {
      
    var docuSelect = document.getElementById("metie");
    docuSelect.innerHTML=metier1;
    var formSelect = document.getElementById("met");
    formSelect.innerHTML="";
    
    }

