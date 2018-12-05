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
	<title>HireMe Job Board</title>
	<script src="form.js"></script>
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
			<h1>New User</h1>
			<div class="main">
				
			
			
				<form method="POST" action="record_user.php" onsubmit = "return val()">
					

					
				<div class="field">
					<label>Firstname:</label><br><input id="firstname" class="form-inline" type="text" placeholder="John" name="firstname" required></input>
					
					
				</div>

					<br>

				<div class="field">
					<label>Lastname:</label><br><input id="lastname" class="form-inline" type="text" placeholder="Doe" name="lastname" required></input>

					
				</div>

					<br>

				<div class = "field">	

					<label>Password:</label><br><input id="password" class="form-inline" type="password" name="password" required></input>
				</div>


					<br>
				
				<div class="field">	
					<label>Telephone number:</label><br><input id="telNum" class="form-inline" type="tel" placeholder="876-123-4567" name="number" required></input>
				</div>


					<br>

				<div class = "field">
					<label>Email:</label><br><input id="email" type="email" class="form-inline" placeholder="e.g. johndoe@example.com" name="email" required></input>

					
				</div>
				
				<br>

				<div><input name="newuser_submit" class="form-inline" id="sub" type="submit"></input></div>

					
				</form>

					
				
			</body>

			</div>
		</div>
		
	

		
		
</html>