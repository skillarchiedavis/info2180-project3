<?php
	include('login.php');
	
	if(isset($_SESSION['login_user'])){
		foreach($userdata as $user){
			echo $user['firstname'].','.$user['lastname'];
    		echo " | ".$user['email'];
    		$_SESSION['firstname'] = $user['firstname'];
    		$_SESSION['lastname'] = $user['lastname'];
			$_SESSION['email'] = $user['email'];
			
		}
		header("location: dash.php");
	}
?>

<!DOCTYPE html>
<!--
users can only be added by an administrator,
there is no feature for new users to self-sign up. An administrator logs in and
completes the new user form

A user goes to the login page and logs in with their Email address and password. The
system keeps track of the user using PHP sessions. Once logged in they are presented
with the Dashboard/Home Screen which shows a list of available jobs and the
particular jobs that a user has applied for
-->


<html>
    <head>
        <title>HireMe Login</title>
	    <link rel="stylesheet" type="text/css" href="form.css">
    </head>
    <body>
        <div class="head">
			<h2 class="">Hire me</h2>
			
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
			<div class="main">
				<h1>Sign in</h1>
				
				<form method ="post">
				    <div class = "field">
					    <label>Email:</label><br><input id="emailLogin" class="form-inline" type="text" placeholder="e.g. johndoe@example.com" name="username" required></input><label class="correct"></label>
					    <br>
					    <label>Password:</label><br><input id="passwordLogin" class="form-inline" type="password" name="password" required></input>
				    <br>
				    <input name ="sign_submit" id="subLogin" class="form-inline" type="submit" value="login"> <!--Submit</button>-->
				    </div>
				     
				</form>
				
				<span><?php echo $error; ?></span>
			</div>
		</div>
    </body>
</html>