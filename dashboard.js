window.onload = function(){
    var jobList = document.getElementById("JobList");
    var httpRequest = new XMLHttpRequest();
    var url = "https://info2180-project3-drelaing.c9users.io/hireme.php?q=jobs&all=true";
    httpRequest.onreadystatechange = doThis;
    httpRequest.open('GET', url);
    httpRequest.send();
    
  
    function doThis(){
        if(httpRequest.readyState === XMLHttpRequest.DONE){
            if(httpRequest.status === 200){
                var response =httpRequest.responseText;
                jobList.innerHTML = response;
            }
            else{
                alert('Problem loading job listing');
            }
        }
        
    }
    
    
    var appliedFor = document.getElementById('appliedFor');
    var xml = new XMLHttpRequest();
    var url2 = "https://info2180-project3-drelaing.c9users.io/userJobs.php?k=userJobs&all=true";
    xml.onreadystatechange = doThat;
    xml.open('GET', url2);
    xml.send();
    
    function doThat(){
       if(xml.readyState === XMLHttpRequest.DONE){
            if(xml.status === 200){
                var response2 = xml.responseText;
                appliedFor.innerHTML = response2;
            }
            else{
                alert("Problem loading");
            }
        } 
    }
    
    
    
};