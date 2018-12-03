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
		
		
		console.log("test1");
			
			
			

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
							return false;
						}
						
						if(desc.classList.contains("fieldError")){
							error+=1;
							return false;
						}
						
						if(category.classList.contains("fieldError")){
							error+=1;
							return false;
						}
						
						if(company.classList.contains("fieldError")){
							error+=1;
							return false;
						}
						
						if(location.classList.contains("fieldError")){
							error+=1;
							return false;
						}
						
						
						if(error>0){
							alert("Please ensure the information you have entered is correct");
							return false
						}
						else{
							return true;
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

};		


			
		