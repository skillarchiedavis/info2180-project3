<?php
    require 'hireme.php';
    session_start();

    
    $user_check=$_SESSION['login_user'];
    $find = $conn->query("SELECT firstname, lastname FROM Users WHERE email='$user_check'");
    $user_info = $find->fetchAll(PDO::FETCH_ASSOC);
    $login_session = $user_info['firstname'];
    
    if(!isset($login_session)){
        //header('Location: index.php');
    }

    
?>