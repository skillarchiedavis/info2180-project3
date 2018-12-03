<?php
include('session.php');
if (!isset($_SESSION['email']))
  {
    header('Location: logout.php');
  }
  
require 'userJobs.php';
echo "
    
    <head>
	<title>Dashboard</title>
	<script src='dashboard.js'></script>
	
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jsSHA/2.0.2/sha.js'></script>

	<link rel='stylesheet' type='text/css' href='form.css'>
	</head>

		<div class='head'>
			<h2 class=''>Hire me</h2>
			<span class='loggedin'>
				Welcome, ".$_SESSION['firstname']." ". $_SESSION['lastname'].'!'
			."</span>
		</div>
		
		<div class='overall'>

			<div class = 'toolbar'>
				<ul>
				  <li><a href='dash.php'>HOME</a></li>
				  <li><a href='index.php' class='hidden'>SIGN IN</a></li>
				  <li><a href='register.php'>ADD USER</a></li>
				  <li><a href='job.php'>NEW JOB</a></li>
				  <li><a href='logout.php'>LOGOUT</a></li>
				  
				</ul>
			</div>
    
    
";



#echo "Job ID: ";
$j = htmlspecialchars($_GET['j']);
$a = htmlspecialchars($_GET['a']);
#echo " ".$j;
#echo " applied= ".$a;

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$findJob = "SELECT * FROM `Jobs` WHERE id='$j'";
$sql = $conn->query($findJob);
$results = $sql->fetchAll(PDO::FETCH_ASSOC);

if($a==="true"){
  foreach($results as $job){
    echo ""
    ."<div class='main'>"
    ."<div class='jobArea'>"
    ."<h1>"
    .$job['job_title']
    ."</h1>"
    ."<p class='Post-Cat'>"
    ."Posted ". $job['date_posted']
    ."<br/>"
    .$job['category']
    ."</p>"
    ."<b>"
    .$job['company_name']
    ."<br/>"
    .$job['company_location']
    ."</b>"
    ."<br/>"
    ."<hr/>"
    ."<h3>"
    ."Job Description"
    ."</h3>"
    ."<p class=desc>"
    .$job['job_description']
    ."</p>"
    ."</div>"
    ."</div>"
    ."";
    
  }
  die();
}
foreach($results as $job){
    echo ""
    ."<div class='main'>"
    ."<div class='jobArea'>"
    ."<button id='app'>Apply Now</button>"
    ."<h1>"
    .$job['job_title']
    ."</h1>"
    ."<p class='Post-Cat'>"
    ."Posted ". $job['date_posted']
    ."<br/>"
    .$job['category']
    ."</p>"
    ."<b>"
    ."Jamaica Yellow Pages"
    ."<br/>"
    .$job['company_location']
    ."</b>"
    ."<br/>"
    ."<hr/>"
    ."<h3>"
    ."Job Description"
    ."</h3>"
    ."<p class=desc>"
    .$job['job_description']
    ."</p>"
    ."</div>"
    ."</div>"
    ."";
    
}
?>