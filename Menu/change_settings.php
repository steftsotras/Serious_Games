<?php
session_start();
include "../connect.php";

$data = json_decode(file_get_contents("php://input"));

echo("<script>console.log('PHP: ".$data."');</script>");
//dhmografika stoixeia
if ((isset($data->gender)) ) {

    $gender = $data->gender;
    $city = $data->city;
    $birthdate = $data->birthdate;
    $education = $data->education;
	
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
elseif ((isset($data->password))) {

	$password = md5($data->password);

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

if ((isset($data->difficulty))) {

	$difficulty = $data->difficulty;
	
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