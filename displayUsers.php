<?php
include 'userJobs.php';
?>
<DOCTYPE html>
<html>
    <head>
    <title>HireMe Job Board</title>
    <script src="/users.js"></script>
    <link rel="stylesheet" type="text/css" href="form.css">
    </head>
    <body>
        
		<div class="head">
			<h2 class="">Hire me</h2>
			<span class="loggedin">
				<?php 
					echo 'Welcome '.$_SESSION['firstname'];
					echo ' '. $_SESSION['lastname'].'!';
				?>
			</span>
		</div>
            
            
        
        
        <div class="overall">

			<div class = "toolbar">
				<ul>
				  <li><a href="dash.php">HOME</a></li>
				  <li><a href="index.php" class="hidden">SIGN IN</a></li>
				  <li><a href="register.html">ADD USER</a></li>
				  <li><a href="job.html">NEW JOB</a></li>
				  <li><a href="logout.php">LOGOUT</a></li>
				  
				</ul>
			</div>
			<div class="dashboard">
				<div class="dashbar">
					<br>
					<h1>dashboard</h1>
					<button id="sub" type="submit">Post a Job</button>
				</div>
				<hr>
				<br>
				
				  
				      <h2>New User Successfully Added!</h2><br>
				      <h3>Users:</h3>
				      <div id = "users"></div>
            
            
				
			
				
    </body>
    
</html>



