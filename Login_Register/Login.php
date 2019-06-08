<?php
    session_start();
    include "../connect.php";
	
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, md5($_POST['password']));

    if (empty($username) || empty($password)) {
        
		$_GET['error'] = 2;
		
        header("Location: ../index.php");
        exit();
    }

    $sql = "SELECT username, password FROM user WHERE username='$username' and password='$password'";
    
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $count = mysqli_num_rows($result);

    if ($count >= 1) {
		
		$_SESSION['username'] = $username;
		
		header("Location: ../Menu/profile.php");
        exit();
	
    }else {
        
		$_GET['error'] = 3; 
		
        header("Location: ../index.php");
        exit();
    }

    
?>