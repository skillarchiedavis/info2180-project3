window.onload = function val(){
var form = document.getElementsByClassName("form-inline");
var firstname = document.getElementById("firstname");
var lastname = document.getElementById('lastname');
var password = document.getElementById("password");
var telNum = document.getElementById("telNum");
var email = document.getElementById("email");
var sub = document.getElementById("sub");
var job_submit = document.getElementById("job_submit");
var title = document.getElementById("title");
var desc = document.getElementById("desc");
var category = document.getElementById("category");
var company = document.getElementById("company");
var location = document.getElementById("location");
		
		validate();
		
		
		
			
			
			

			function validate(){
				
					
					job_submit.onclick = function(){
						clearErrors();
						if(title.value.trim().length == 0){
							title.classList.remove("form-inline");
                    		title.classList.add("fieldError");
						}
						
						if(desc.value.trim().length == 0){
							desc.classList.remove("form-inline");
                    		desc.classList.add("fieldError");
						}
						
						if(category.value == ""){
							category.classList.remove("form-inline");
                    		category.classList.add("fieldError");
						}
						
						if(company.value.trim().length == 0){
							company.classList.remove("form-inline");
                    		company.classList.add("fieldError");
						}
						
						if(location.value.trim().length == 0){
							location.classList.remove("form-inline");
                    		location.classList.add("fieldError");
						}
						
						
						
						var error = 0;
						if(title.classList.contains("fieldError")){
							error+=1;
							
						}
						
						if(desc.classList.contains("fieldError")){
							error+=1;
							
						}
						
						if(category.classList.contains("fieldError")){
							error+=1;
							
						}
						
						if(company.classList.contains("fieldError")){
							error+=1;
							
						}
						
						if(location.classList.contains("fieldError")){
							error+=1;
							
						}
						
						
						if(error>0){
							alert("Please ensure the information you have entered is correct");
							//return false
						}
						else{
							console.log("test1");
							redirect();
							//return true;
						}
					};
					

			};	
			
			function clearErrors(){
				title.classList.remove("fieldError");
                title.classList.add("form-inline");
				
				desc.classList.remove("fieldError");
                desc.classList.add("form-inline");
				
				category.classList.remove("fieldError");
                category.classList.add("form-inline");
                
                company.classList.remove("fieldError");
                company.classList.add("form-inline");
                
                location.classList.remove("fieldError");
                location.classList.add("form-inline");
			}


	function redirect(){
        var url = "record_job.php"
        var http = new XMLHttpRequest();
        
        var term = "?title=";
        term += title.value;
        var params = 'title='+title.value+'&job_description='+desc.value+'&category='+category.value+'&company='+company.value+'&location='+location.value;
		http.open('POST', url, true);

		//Send the proper header information along with the request
		http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		http.onreadystatechange = function() {//Call a function when the state changes.
    		if(http.readyState == 4 && http.status == 200) {
        		alert("New Job added!");
        		window.location.href = "dash.php";
    		}
		}
		http.send(params);
	}
};		


			
		