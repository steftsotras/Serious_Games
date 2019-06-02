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

#g1{
    height: auto; 
    width: auto; 
    max-width: 250px; 
    max-height: 250;
}

#g1{
	border: 2px solid red;
	border-radius: 15px;
	padding: 10px;
	cursor: pointer;
	
}

#sub{
	text-align:center;
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
		<div align="center">
			<div id= "sub">
				<img src="../Images/ypologismos.png" id="g1" />
			</div>
		<div>
	</div>
	</body>
	
</html>

<script>

document.getElementById("g1").onclick = function () {
        location.href = "../Games/calculations.php";
};

$(document).ready(function(){
    
  });
  
  
  
  
</script>