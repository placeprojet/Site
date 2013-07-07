function demand(domaineSelect) {
	
    var value = domaineSelect.options[domaineSelect.selectedIndex].value;
    var xhr2   = getXMLHttpRequest();
    
    xhr2.onreadystatechange = function() {
        if (xhr2.readyState == 4 && (xhr2.status == 200 || xhr2.status == 0)) {
			 
            lireData2(xhr2.responseText);
           
                      
        } else if (xhr2.readyState < 4) {
           
        }
    };
     
    xhr2.open("POST", "data2.php", true);
    xhr2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr2.send("iddomaine2=" + value);
 
}
 
function lireData2(metier2) {
      
    var docuSelect = document.getElementById("meti");
    docuSelect.innerHTML=metier2;
    var formSelect = document.getElementById("me");
    formSelect.innerHTML="";
    
    }

