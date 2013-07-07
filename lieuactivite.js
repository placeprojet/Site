function demandelieu(domainelieuSelect) {
	
    var value = domainelieuSelect.options[domainelieuSelect.selectedIndex].value;
    var xhr   = getXMLHttpRequest();
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			 
            lirelieuactivite(xhr.responseText);
           
                      
        } else if (xhr.readyState < 4) {
           
        }
    };
     
    xhr.open("POST", "lieuactivite.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("iddomaine=" + value);
 
}
 
function lirelieuactivite(nomlieuactivite) {
    
   
    var lieuSelect = document.getElementById("lieuactivite");
    lieuSelect.innerHTML=nomlieuactivite;
     var activSelect = document.getElementById("lieuac");
     activSelect.innerHTML="";
    }

