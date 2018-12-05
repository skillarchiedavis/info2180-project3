<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';
$title = $_POST['title'];
$job_description = $_POST['job_description'];
$company = $_POST['company'];
$location = $_POST['location'];
$category = $_POST['category'];


try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   
    
    $statement = "INSERT INTO Jobs (job_title, job_description, category, company_name, company_location, date_posted) VALUES(?,?,?,?,?,?)";
    $job = $conn->prepare($statement)->execute([$title, $job_description, $category, $company, $location, date("Y-m-d")]);
    header('Location: dash.php');

    if($job){
        $sql = "SELECT * FROM Jobs";
        
        echo "<table cellspacing='20' cellpadding='10'>";
        echo "<th>".'ID'."</th>"."<th>".'Job Title'."</th>"."<th>".'Job Description'."</th>"."<th>".'Category'."</th>"."<th>".'Company'. "</th>". "<th>".'Location'."</th>"."<th>".'Date'."</th>";
        foreach($conn->query($sql) as $row){
            echo "<tr>"."<td>".$row['id']. "</td>". "<td>".$row['job_title']."</td>"."<td>" .$row['job_description'] . "</td>" . " " . "<td>". 
            $row['category'] ."</td>"." "."<td>".$row['company_name']."</td>"." " ."<td>".$row['']."</td>"."<td>".$row['company_location']."</td>"." "."<td>".$row['date_posted'] . "</td>" ."</tr>";
            
            
        }
        echo "</table>";
        header('Location: dash.php');
    }
}

catch(PDOException $Exception){
	echo "FAILED TO UPDATE JOBS";
}

?>