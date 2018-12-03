window.onload = function(){
    
    
    var db = document.getElementById("users");
    var xml = new XMLHttpRequest();
    
    
    
    xml.onreadystatechange = doThis;
    
    xml.open('GET', "https://info2180-project3-drelaing.c9users.io/record_user.php?q=users&all=true");
    xml.send();
    
    function doThis(){
        if(xml.readyState === XMLHttpRequest.DONE){
            if(xml.status === 200){
                var response =xml.responseText;
                db.innerHTML = response;
            }
            else{
                alert('Problem loading users');
            }
        }
        
    }
};