<?php
include 'session.php';
if (!isset($_SESSION['email']))
  {
    header('Location: logout.php');
  }
  
require 'jobDetails.php';



//echo isset($_SESSION['jid']) ? $_SESSION['jid'] : '';
//echo $_SESSION['email'];

$jid = $_SESSION['jid'];
$ue = $_SESSION['email'];


$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $sql = $conn->query("SELECT * FROM Users WHERE email='$ue'");
    $resultsNew = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    //echo $jid." ".$ue." ".$resultsNew[0]['id'];
    $uid = $resultsNew[0]['id'];
    
    $statement = "INSERT INTO Jobs_Applied_For (job_id, user_id, date_applied) VALUES(?,?,?)";
    $apply = $conn->prepare($statement)->execute([$jid, $uid, date("Y-m-d")]);
    header('Location: dash.php');
?>