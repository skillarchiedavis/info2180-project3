<DOCTYPE html>

<html>
	
	<head>
	<title>HireMe Job Board</title>
	<script src="form.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jsSHA/2.0.2/sha.js"></script>
	<link rel="stylesheet" type="text/css" href="form.css">
	</head>

	<body>
		<h2 class="head">Hire me</h2>
		<div class="overall">

			<div class = "toolbar">
				<ul>
				  <li><a href="dash.html">HOME</a></li>
				  <li><a href="sign.html">SIGN IN</a></li>
				  <li><a href="index.html">ADD USER</a></li>
				  <li><a href="job.html">NEW JOB</a></li>
				  <li><a href="logout.html">LOGOUT</a></li>
				  
				</ul>
			</div>
			<div class="main">
				<h1>New User</h1>
			
			
				<form method="POST" action="record_user.php" class="form-inline">
					

					
				<div class="field">
					<label>Firstname:</label><br><input id="firstname" type="text" placeholder="John" name="firstname" required></input>
					
					
				</div>

					<br>

				<div class="field">
					<label>Lastname:</label><br><input id="lastname" type="text" placeholder="Doe" name="lastname" required></input>

					
				</div>

					<br>

				<div class = "field">	

					<label>Password:</label><br><input id="password" type="password" name="password" required></input>
				</div>


					<br>
				
				<div class="field">	
					<label>Telephone number:</label><br><input id="telNum" type="tel" placeholder="87612345678" name="number" required></input>
				</div>


					<br>

				<div class = "field">
					<label>Email:</label><br><input id="email" type="email" placeholder="e.g. johndoe@example.com" name="email" required></input><label class="correct"></label>

					<br>


					<input name="newuser_submit" id="sub" type="submit"></input>

					<p></p>
				</form>

					
				
			</body>

			</div>
		</div>
		
	

		
		
</html>