<?php
session_start();
include "../connect.php";



if ((isset($_POST['gender'])) ) {

    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $birthdate = $_POST['birthdate'];
    $education = $_POST['education'];
	
    mysqli_autocommit($link, false);

    $query = "UPDATE user SET gender = '".$gender."', city = '".$city."', birthdate = '".$birthdate."', education = '".$education."' WHERE username = '".$_SESSION['username']."'";


    $result = mysqli_query($link, $query);

    if ($result) {
        mysqli_commit($link);
		
    } else {
        mysqli_rollback($link);
		
		echo "<center><div class='fail'>";
        echo "problem with database";
        echo "</div></center>";
		
    }



}
elseif ((isset($_POST['password']))) {

	$password = md5($_POST['password']);

	mysqli_autocommit($link, false);

    $query = "UPDATE user SET password = '".$password."' WHERE username = '".$_SESSION['username']."'";


    $result = mysqli_query($link, $query);

    if ($result) {
        mysqli_commit($link);
		
    } else {
        mysqli_rollback($link);
		
		echo "<center><div class='fail'>";
        echo "problem with database";
        echo "</div></center>";
		
    }

}

if ((isset($_POST['difficulty']))) {

	$difficulty = $_POST['difficulty'];
	
	$query = "UPDATE user SET difficulty_level = '".$difficulty."' WHERE username = '".$_SESSION['username']."'";


    $result = mysqli_query($link, $query);

    if ($result) {
        mysqli_commit($link);
		
    } else {
        mysqli_rollback($link);
		
		echo "<center><div class='fail'>";
        echo "problem with database";
        echo "</div></center>";
		
    }

}


?>