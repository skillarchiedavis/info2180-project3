<?php

include('session.php');
	if (!isset($_SESSION['email']))
  {
    header('Location: logout.php');
  }
  
  
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$number = $_POST['number'];
$user_password = $_POST['password'];
$email = $_POST['email'];

$q = htmlspecialchars($_GET['q']);
$all = htmlspecialchars($_GET['all']);

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    if(isset($firstname)){
    filter_var($firstname, FILTER_SANITIZE_STRING);
    }
    if(isset($lastname)){
        filter_var($lastname, FILTER_SANITIZE_STRING);
    }
    if(isset($user_password)){
        filter_var($password, FILTER_SANITIZE_STRING);
    }
    if(isset($number)){
        filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    }
    if(isset($email)){
        filter_var($email, FILTER_SANITIZE_EMAIL);
    }
    
    
    $stmt = "INSERT INTO Users (firstname, lastname, password, telephone, email, date_joined) VALUES(?,?,?,?,?,?)";
    $new_user = $conn->prepare($stmt)->execute([$firstname, $lastname, $user_password, $number, $email, date("Y-m-d")]);
    
}

catch(PDOException $Exception){
	echo "FAILED TO UPDATE USERS";
}


 $sql = $conn->query("SELECT * FROM Users");
$resultsNew = $sql->fetchAll(PDO::FETCH_ASSOC);


if($q == "users" && $all == "true"){
    
       
        
        echo "<table cellspacing='20' cellpadding='10'>";
        echo "<th>".'ID'."</th>"."<th>".'Firstname'."</th>"."<th>".'Lastname'."</th>"."<th>".'Password'."</th>"."<th>".'Telephone'. "</th>". "<th>".'Email'."</th>"."<th>".'Date'."</th>";
        foreach($resultsNew as $row){
            echo "<tr>". "<td>".$row['id']."</td>"."<td>" .$row['firstname'] . "</td>" . " " . "<td>". $row['lastname'] ."</td>"." "."<td>".$row['user_password']."</td>"." " ."<td>".$row['telephone']."</td>"." " . 
            "<td>".$row['email']."</td>"." "."<td>".$row['date_joined'] . "</td>" ."</tr>";
            
            
        }
        
        echo "</table>";
        
}



?>

<DOCTYPE html>
<html>
    <head>
        <title>HireMe Job Board</title>
    <script src="users.js"></script>
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
				  <li><a href="register.php">ADD USER</a></li>
				  <li><a href="job.php">NEW JOB</a></li>
				  <li><a href="logout.php">LOGOUT</a></li>
				  
				</ul>
			</div>
			<div class="dashboard">
				<div class="dashbar">
					<br>
					<h1>Users</h1>
					<a href="register.php"><button id="sub" type="submit">Add User</button></a>
				</div>
				<hr>
				<br>
				
				  
				      <h2>New User Successfully Added!</h2><br>
				      <h3>Users:</h3>
				      
				      <?php 
				        echo "<table cellspacing='20' cellpadding='10'>";
                        echo "<th>".'ID'."</th>"."<th>".'Firstname'."</th>"."<th>".'Lastname'."</th>"."<th>".'Password'."</th>"."<th>".'Telephone'. "</th>". "<th>".'Email'."</th>"."<th>".'Date'."</th>";
                        foreach($resultsNew as $row){
                            echo "<tr>". "<td>".$row['id']."</td>"."<td>" .$row['firstname'] . "</td>" . " " . "<td>". $row['lastname'] ."</td>"." "."<td>".$row['user_password']."</td>"." " ."<td>".$row['telephone']."</td>"." " . 
                            "<td>".$row['email']."</td>"." "."<td>".$row['date_joined'] . "</td>" ."</tr>";
                        }
                        echo "</table>";
				      ?>
    </body>
    
</html>



