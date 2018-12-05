<?php 
	include('session.php');
	if (!isset($_SESSION['email']))
  {
    header('Location: logout.php');
  }
  if(isset($_SESSION['email'])){
	if($_SESSION['email'] != 'admin@hireme.com'){
  		header('Location: ' . $_SERVER['HTTP_REFERER']);
		die;
	}
  }
?>
<!DOCTYPE html>

<html>
	
	<head>
		<script src="job.js"></script>
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

			<h1>New Job</h1>
		<div class="main">
			<form method="POST" action="record_job.php" onsubmit="return val()">
				

				<div class="field">
					<label>Job Title:</label><br><input id="title" type="text" name="title" class="form-inline" placeholder="e.g. Senior Designer" size=50  required></input>
				</div>

				<br>

				<div class="field">
					<label>Job Description:</label><br><textarea name ="job_description" class="form-inline" id="desc" rows="4" cols="50"></textarea>
				</div>

				<br>

				<div class="field">
					<label>Category:</label><br><select class="form-inline" name="category" id="category" required>
						<option value="" disabled selected class="hidden">Select option</option>
						<option value="Sales & Marketing">Sales & Marketing</option>
						<option value="Programming">Programming</option>
						<option value="Business & Management">Business & Management</option>
						<option value="Design">Design</option>
						<option value="Customer Support">Customer Support</option>
						<option value="DevOps & Sysadmin">DevOps & Sysadmin</option>
					</select>
				</div>

				<br>

				<div class="field">
					<label>Company:</label><br><input type="text" class="form-inline" name="company" id="company" size="50" required=""></input>
				</div>

				<br>

				<div class="field">
					<label>Job Location:</label><br><input type="text" class="form-inline" name="location" id="location" placeholder="e.g. Kingston, Jamaica" size="50" required></input>
				</div>

				<br>

				

			</form>

			<input class="form-inline" name="job_submit" id="job_submit" value="Submit" type="submit"></input>
		</div>
	</div>
	</body>
</html>