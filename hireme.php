<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';
$user = htmlspecialchars($_GET['user']);
$uPass = htmlspecialchars($_GET['password']);

$q = htmlspecialchars($_GET['q']);
$all = htmlspecialchars($_GET['all']);

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$newJobs = $conn->query("SELECT * FROM Jobs WHERE date_posted >= now() - interval 1 day");
$stmt = $conn->query("SELECT * FROM Jobs");


$resultsNew = $newJobs->fetchAll(PDO::FETCH_ASSOC);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


if($q === "jobs" && $all=="true"){
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

echo "<th>".'Company'."</th>"."<th>".'Job Title'."</th>"."<th>".'Category'."</th>"."<th>".'Date'."</th>";

foreach ($results as $row){
    
    if(in_array($row, $resultsNew)){
        $j=$row['id'];
        $link=$send.$j."\"";
        echo "<tr class='tr' onclick='window.location.href = $link';>"."<td>".$row['company_name']."</td>" . ' ' . "<td>".$row['job_title']."</td>" . ' ' . "<td>".$row['category']."</td>" . ' ' . "<td>".$row['date_posted'].' '."<img src='http://apitco.org/images/new-animated.gif' alt='new' style='width:25px;height:25px;'>"."</td>"."</tr>";
    }
    else{
        $j=$row['id'];
        $link=$send.$j."\"";
        echo "<tr class='tr' onclick='window.location.href = $link';>"."<td>".$row['company_name']."</td>" . ' ' . "<td>".$row['job_title']."</td>" . ' ' . "<td>".$row['category']."</td>" . ' ' . "<td>".$row['date_posted']."</td>"."</tr>";
    }
}

echo "</table>";
}