<?php 
	include('session.php');
	if (!isset($_SESSION['email']))
  {
    header('Location: logout.php');
  }
?>
<DOCTYPE html>
<!-- 
The Dashboard/home screen allows a logged in user to see a list of the 5 most recent
jobs posted as well as a separate list of the jobs that the particular user that is logged
in has applied for. The list of jobs should display the Job Title, Company, Category and
date posted. There should also be a link that when clicked will allow the user to view
the full Job Description. (See Figure 2)
Each job in the recent available jobs list on the home screen should have an indicator
(or label) to show if it is "New". (See Figure 2) A Job is considered new if it has not been
applied for or the time that has elapsed since it was posted is less than 1 day (24
Hours). 
-->
<html>
	
	<head>
	<title>Dashboard</title>
	<script src="dashboard.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jsSHA/2.0.2/sha.js"></script>

	<link rel="stylesheet" type="text/css" href="form.css">
	</head>

	<body>
		<div class="head">
			<h2 class="">Hire me</h2>
			<span class="loggedin">
				<?php 
					echo 'Welcome, '.$_SESSION['firstname'];
					echo ' '. $_SESSION['lastname'].'!';
				?>
			</span>
		</div>
		
		<div class="overall">

			<div class = "toolbar">
				<ul>
				  <li><a href="dash.php">HOME</a></li>
				  <li><a href="index.php" class="hidden">SIGN IN</a></li>
				  <li><a href="register.php">ADD USER</a></li>
				  <li><a href="job.php">NEW JOB</a></li>
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
				<h3>Available Jobs</h3>
				<div id="JobList">
				
					
				</div>
				
				<h3>Jobs Applied For</h3>
				<div id="appliedFor">
					
				</div>
			</div>
				
		
	

		
		
</html>