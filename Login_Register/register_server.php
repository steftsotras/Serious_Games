 <?php
include "connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['submit'])) && ($_POST['submit'] == 'Submit')) {

    
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, md5($_POST['password']));
    $gender = mysqli_real_escape_string($link, $_POST['gender']);
    $city = mysqli_real_escape_string($link, $_POST['city']);
    $birthdate = $_POST['birthdate'];
    $education = mysqli_real_escape_string($link, $_POST['education']);
    //$difficulty = $_POST['difficulty'];

	
	echo $username . ' ' . $password . ' ' . $gender . ' ' . $city . ' ' . $birthdate . ' ' . $education;
	
	if ((empty($username)) || empty($password)) {
		
		echo "<center><div class='success'>";
        echo "empty username pass";
        echo "</div></center>";
		
        header("Location: register.php");
        exit();
    }
	$difficulty_level = 1;
	$ai = 1;
    mysqli_autocommit($link, false);

    $query = "insert into userr 
                            (
                                userID,
                                username,
								password,
                                gender,
                                city,
                                birthdate,
                                education,
                                difficulty_level
                            ) 
                            Values
                            (
                                '$ai',
                                '$username',
								'$password',
                                '$gender',
                                '$city',
                                '$birthdate',
                                '$education',
                                '$difficulty_level'
                            )";
							
	
//echo $query;
//die;
    $result = mysqli_query($link, $query);

    if ($result) {
        mysqli_commit($link);
		
		echo "<center><div class='success'>";
        echo "noice";
        echo "</div></center>";
		
        header("Location: ../index.php");
        exit();
    } else {
        mysqli_rollback($link);
		
		echo "<center><div class='fail'>";
        echo "problem with database";
        echo "</div></center>";
		
    }
}
?>