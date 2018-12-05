<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';

require 'session.php';

$k = htmlspecialchars($_GET['k']);
$all = htmlspecialchars($_GET['all']);

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);



//get user_id
$logged_in = $_SESSION['login_user'];
$get_id = "SELECT id FROM Users WHERE email='$logged_in'";

$sql = $conn->query($get_id);
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
$user_id = $results[0]['id'];

$test = "SELECT * FROM `Jobs_Applied_For` WHERE user_id='$user_id'";
$applied ="Select * from (Select q1.firstname, q1.lastname, q1.id, q1.user_id, q1.job_id, q1.date_applied, Jobs.job_title, Jobs.job_description, Jobs.category, Jobs.company_name, Jobs.company_location, Jobs.date_posted from (select Users.firstname, Users.lastname, Jobs_Applied_For.id, Jobs_Applied_For.user_id, Jobs_Applied_For.job_id, Jobs_Applied_For.date_applied from Users Join Jobs_Applied_For on Users.id = Jobs_Applied_For.user_id) as q1 join Jobs on q1.job_id=Jobs.id) as q2 WHERE user_id='$user_id'";

$sql = $conn->query($applied);

$results = $sql->fetchAll(PDO::FETCH_ASSOC);


if($k === "userJobs" && $all == "true"){
    #echo "hey ".$results[0]['firstname']." ".$results[0]['lastname'];
    
    echo "
            <style type='text/css'>
                .tr:hover {
                    background-color: white;
                }
                
                table{
                    border-collapse: collapse;
                }
            </style>
    ";
    
    $send = "\"jobDetails.php?j=";
    echo "<table cellspacing='20' cellpadding='10'>";

    echo "<th>".'<b>#</b>'."</th>"."<th>".'Company'."</th>"."<th>".'Job Title'."</th>"."<th>".'Category'."</th>"."<th>".'Application Date'."</th>";
    foreach($results as $row){
        $j=$row['job_id'];
        $link=$send.$j."&a=true\"";
        echo "<tr id='button' class='tr' onclick='window.location.href = $link';>"."<td>".$row['id']."</td>" . ' ' ."<td>".$row['company_name']."</td>" . ' ' . "<td>".$row['job_title']."</td>" . ' ' . "<td>".$row['category']."</td>" . ' ' . "<td>".$row['date_applied']."</td>"."</tr>";
    }
    echo "</table>";
}

?>