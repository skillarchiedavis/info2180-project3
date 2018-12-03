 <?php
session_start();
require 'hireme.php';

    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = " ";
    }
    else{
        
        $username_=filter_var(($_POST['username']), FILTER_VALIDATE_EMAIL);
        $password_=htmlentities($_POST['password']);

        $password_ = hash('sha224',$password_);
        
        $query="SELECT * FROM (SELECT * FROM Users WHERE password='$password_' and email='$username_') as info";
        $find = $conn->query($query);
        $verify = $conn->query("SELECT count(*) FROM (SELECT * FROM Users WHERE password='$password_' and email='$username_') as found");
        
        $resultsf = $verify->fetchAll(PDO::FETCH_ASSOC);
        $userdata = $find->fetchAll(PDO::FETCH_ASSOC);
        
        
        foreach ($resultsf as $row){
            $count = $row['count(*)'];
        }
        
        if($count == 1){
            $_SESSION['login_user']=$username_;
            echo $count . ' user found ';
            //header("location: dash.php");
        }
        else{
            $error = "Username or Password is invalid";
        }
    }
?>