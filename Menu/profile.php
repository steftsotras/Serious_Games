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
h2 {
  color: #ffa31a;
} 
div {
color: #ffa31a;    
}

tr {
color: #FFD700;
margin-left: 20px;
font-size: 18pt;
line-height: 30pt;
font-family: Arial, sans serif;
}


#container {
    width: 100%;
	display: flex;
    text-align:center;
	margin: 0 auto;
	border: 1px solid red;
	position: relative;
}



#left {
	flex: 1;
    float:left;
    width:200px;
	margin-right:100px;
}

#center {
	flex: 1;
    display: inline-block;
    margin-right:10px;
    width:100px;
}

#right {
	flex: 1;
    margin-left:0px;
    width:200px;
}

#cont_btn
{
	background-color: purple;
	color: black;
	width: 270px;
	height: 60px;
	font-size: 20px;
	cursor: pointer;
}

#logout_btn
{
	background-color: red;
	color: black;
	width: 270px;
	height: 60px;
	font-size: 20px;
	cursor: pointer;
}


</style>
    
     
    </head>
    <body>
	<br>
	
	<div id="container">	
		<div id="left"><h1>ΤΟ ΠΡΟΦΙΛ ΣΟΥ</h1>
		<p>ΚΑΛΟΣΩΡΙΣΕΣ <?php echo $_SESSION['username'];?></p>
		
		
		<div id="live_data"></div>
		
		</div>
		
		<div id="center">
			<h2 align="left">ΔΗΜΟΓΡΑΦΙΚΑ ΣΤΟΙΧΕΙΑ</h2>
			
			<form action="change_settings.php" method="post">
			<table>
				<tr>
				<tr>
					<td>Φύλλο</td>
					<td><input type="radio" name="gender" value="male">ΑΡΣΕΝΙΚΟ</td>
					
				</tr>
				<tr><td></td><td><input type="radio" name="gender" value="female"/>ΘΥΛΗΚΟ</td></tr>
				</tr>
				<tr>
					<td>Πόλη διαμονής</td>
					<td><input type="text" name="city"
							   placeholder="εισαγωγη εδω"></td>
				</tr>
				
				<tr>
					<td>Ημερομηνία Γέννησης</td>
					<td><input type="date" name="birthdate"</td>
				</tr>
				
				<tr>
					<tr>
					<td>Εκπαίδευση</td>
					<td><input type="radio" name="education" value="none">ΚΑΜΙΑ</td>
					</tr>
					<tr><td></td><td><input type="radio" name="education" value="elementary" />ΔΗΜΟΤΙΚΟ</td></tr>
					<tr><td></td><td><input type="radio" name="education" value="second" />ΓΥΜΝΑΣΙΟ</td></tr>
					<tr><td></td><td><input type="radio" name="education" value="high" />ΛΥΚΕΙΟ</td></tr>
					<tr><td></td><td><input type="radio" name="education" value="uni" >ΠΑΝΕΠΙΣΤΗΜΙΟ</td></tr>
				</tr>
				
				<tr>
				<td><input type="submit" name="submit"
					value="ΑΛΛΑΓΗ ΔΗΜΟΓΡΑΦΙΚΩΝ ΣΤΟΙΧΕΙΩΝ"></input>
				</td>
				</tr>
			</table>
		
		</div>
		
		
		<div id="right">
			
			
			<div>
			<table><tr><td>
			<h2>ΚΩΔΙΚΟΣ ΧΡΗΣΤΗ</h2></td>
			</tr>
			
			<tr>
				<td><input type="password" name="password"
						   placeholder="εισαγωγη εδω"></td></tr>
			<tr>
				<td><button onclick="Function1()">ΑΛΛΑΓΗ ΚΩΔΙΚΟΥ</button></td>
			</tr>
			</table>
			</div>
			
			<br>
			<div>
			<table>
			<tr>
			<td>
			<h2>ΔΥΣΚΟΛΙΑ ΠΑΙΧΝΙΔΙΩΝ</h2>
			</td>
			</tr>
			<tr>
			<td>
			<p><select></p>
				 <option selected="difficulty_level_all">
					  ΟΛΑ ΤΑ ΕΠΙΠΕΔΑ
				  </option>
				<option value="difficulty_level_1">ΕΥΚΟΛΟ</option>
				<option value="difficulty_level_2">ΜΕΣΑΙΟ</option>
				<option value="difficulty_level_3">ΠΡΟΧΩΡΗΜΕΝΟ</option>
				<option value="difficulty_level_4">ΕΥΚΟΛΟ ΕΩΣ ΜΕΣΑΙΟ</option>
			</select>
			</td>
			</tr>
			<tr>
			<p><td><button onclick="Function1()">ΑΛΛΑΓΗ ΔΥΣΚΟΛΙΑΣ</button></p>
			</tr>
			</table>
			</div>
			
			<br>
			<div align="left">
				<p><button style="display:inline-block;" id="cont_btn" type="button">ΣΥΝΕΧΕΙΑ ΣΤΟ ΜΕΝΟΥ ΠΑΙΧΝΙΔΙΩΝ</button>
				</p>
				<p><button id="logout_btn" type="button">ΑΠΟΣΥΝΔΕΣΗ</button></p>
			</div>
			
		
		</div>
		
		
		
		
			
	
    </div>    
   
    </body>
</html>



<script>

//Logout
var lgout_btn = document.getElementById('logout_btn');
lgout_btn.addEventListener('click', function() {
  document.location.href = 'unset_sess.php';
});

document.getElementById("cont_btn").onclick = function () {
        location.href = "/menu.php";
};


//
function Function1() {
  document.getElementById("demo").innerHTML = "Hello World";
}
</script>

<script>
function Function3() {
  document.getElementById("demo").innerHTML = "Hello";
}
</script>
<script>
function Function2() {
  document.getElementById("demo").innerHTML = "World";
}

</script>


