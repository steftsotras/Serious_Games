<?php
session_start();
include "../connect.php";

$sql = "SELECT gender,city,birthdate,education,difficulty_level FROM user WHERE username = '" .$_SESSION['username']. "'";
$query = mysqli_query($link, $sql) or die(mysqli_error($link));

$row = mysqli_fetch_assoc($query);


if($row['gender']=='male'){
	$gen = 'ΑΡΣΕΝΙΚΟ'; 
}
elseif($row['gender']=='female'){
	$gen = 'ΘΥΛΗΚΟ'; 
}


if($row['education']=='none'){
	$edu = 'KAMIA';
}
elseif($row['education']=='elementary'){
	$edu = 'ΔΗΜΟΤΙΚΟ';
}
elseif($row['education']=='second'){
	$edu = 'ΓΥΜΝΑΣΙΟ';
}
elseif($row['education']=='high'){
	$edu = 'ΛΥΚΕΙΟ';
}
elseif($row['education']=='uni'){
	$edu = 'ΠΑΝΕΠΙΣΤΗΜΙΟ';
}


if($row['difficulty_level']==1){
	$dif = 'ΕΥΚΟΛΟ';
	$_SESSION['dif'] = 1;
}
elseif($row['difficulty_level']==2){
	$dif = 'ΜΕΣΑΙΟ';
	$_SESSION['dif'] = 2;
}
elseif($row['difficulty_level']==3){
	$dif = 'ΠΡΟΧΩΡΗΜΕΝΟ';
	$_SESSION['dif'] = 3;
}
elseif($row['difficulty_level']==4){
	$dif = 'ΕΥΚΟΛΟ ΩΣ ΜΕΣΑΙΟ';
	$_SESSION['dif'] = 4;
}
elseif($row['difficulty_level']==5){
	$dif = 'ΟΛΑ ΤΑ ΕΠΙΠΕΔΑ';
	$_SESSION['dif'] = 5;
}


$view = '<table cellspacing="15" style="color: #ADFF2F;">
			<tr>
				<td>ΦΥΛΛΟ: </td>
				<td>'.$gen.'</td>
			</tr>
			<tr>
				<td>ΠΟΛΗ: </td>
				<td>'.$row['city'].'</td>
			</tr>
			<tr>
				<td>ΗΜ/ΝΙΑ ΓΕΝΝΗΣΗΣ: </td>
				<td>'.$row['birthdate'].'</td>
			</tr>
			<tr>
				<td>ΕΚΠΑΙΔΕΥΣΗ: </td>
				<td>'.$edu.'</td>
			</tr>
			<tr>
				<td>ΔΥΣΚΟΛΙΑ: </td>
				<td>'.$dif.'</td>
			</tr>
		
		 </table>
		';

echo $view;


?>