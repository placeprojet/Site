function request(regionSelect) {
	
    var value = regionSelect.options[regionSelect.selectedIndex].value;
    var xhr   = getXMLHttpRequest();
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			 
            readData(xhr.responseText);
           
                      
        } else if (xhr.readyState < 4) {
           
        }
    };
     
    xhr.open("POST", "XMLHttpRequest_getListData.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("region_id=" + value);
 
}
 
function readData(departe) {
      
    var docuSelect = document.getElementById("departements");
    docuSelect.innerHTML=departe;
    var docSelect = document.getElementById("depart");
    docSelect.innerHTML="";
    
    }

