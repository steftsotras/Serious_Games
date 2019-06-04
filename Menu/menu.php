<?php
session_start();
if(!isset($_SESSION['username'])){
	header('Location: ../index.php');
}
?>
<html>
    <head>
        <title>Serious Games</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		
		
<style>       


body {
  background-color: #2f2f1e;
  font-size: 15pt;
  line-height: 25pt;
  font-family: Arial, sans serif; 
}

h1 {
  color: #ffa31a;
} 

#container {
	width: 100%;
	text-align:center;
	position: absolute;
}

.images{
    height: auto; 
    width: auto; 
    max-width: 250px; 
    max-height: 250px;
}

.images{
	border: 2px solid red;
	border-radius: 15px;
	padding: 10px;
	cursor: pointer;
	
}

#sub{
	text-align:center;
	margin: 0px auto;
	
}

#logout_btn
{
	background-color: red;
	color: bold black;
	width: 270px;
	height: 60px;
	font-size: 20px;
	cursor: pointer;
}

#prof_btn
{
	background-color: purple;
	color: black;
	width: 270px;
	height: 60px;
	font-size: 20px;
	cursor: pointer;
}

.grid-container {
  display: grid;
  grid-template-columns: repeat(3,0fr);
  grid-gap: 50px;
  padding: 10px;
}

#center{
	width: 537px;
	margin: 0px auto;
}


</style>
    
     
    </head>
	
    <body>
	<br>
	<div id="container">
		<div align="center">
			<h1><?php echo $_SESSION['username'];?> ΔΙΑΛΕΞΕ ΠΑΙΧΝΙΔΙ</h1>
		</div>
		<br>
		<div id="center">
		<div class="grid-container">
			
			<div id="sub"><img src="../Images/ypologismos.png" class="images" id="g1" /></div>
			<div id="sub"><img src="../Images/sounds.png" class="images" id="g2" /></div>
			
		</div>
		</div>
		<br>
		<br>
		
		<div id="btns">
			<button id="prof_btn" type="button">ΡΥΘΜΙΣΕΙΣ ΠΡΟΦΙΛ</button>
			<button id="logout_btn" type="button">ΑΠΟΣΥΝΔΕΣΗ</button>
		</div>
		
		
	</div>
	</body>
	
</html>

<script>

document.getElementById("logout_btn").onclick = function () {
        location.href = "../Menu/unset_sess.php";
};

document.getElementById("prof_btn").onclick = function () {
        location.href = "../Menu/profile.php";
};

document.getElementById("g1").onclick = function () {
        location.href = "../Games/calculations.php";
};

document.getElementById("g2").onclick = function () {
        location.href = "../Games/sounds.php";
};

$(document).ready(function(){
    
  });
  
  
  
  
</script>