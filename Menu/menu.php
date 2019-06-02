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

#container {
	width: 100%;
	display: flex;
	text-align:center;
	margin: 0 auto;
	position: relative;
}



</style>
    
     
    </head>
	
    <body>
	<br>
	<div align="center">
		<h1><?php echo $_SESSION['username'];?> ΔΙΑΛΕΞΕ ΠΑΙΧΝΙΔΙ</h1>
	</div>
	</body>
	
</html>