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
  margin-left: 40px;
} 
div {
color: #ffa31a;
margin-left: 10px;       
}

tr {
color: #FFD700;
margin-left: 10px;
font-size: 18pt;
line-height: 30pt;
font-family: Arial, sans serif;       
}

input[type="radio"]{
  margin: 0 10px 0 10px;
}

</style>
    <h1>ΤΟ ΠΡΟΦΙΛ ΣΟΥ</h1>
     
    </head>
    <body>
	<br>
	<div>
	<h2>ΔΗΜΟΓΡΑΦΙΚΑ ΣΤΟΙΧΕΙΑ</h2>
	
	<form action="register_server.php" method="post">
    <table>
        
        <td>
        <tr>
            <td>Φύλλο</td>
            <td><input type="radio" name="gender" value="male">ΑΡΣΕΝΙΚΟ</td>
            <td><input type="radio" name="gender" value="female" style="margin-left: -300px" />ΘΥΛΗΚΟ</td>
            
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
            <td>Εκπαίδευση</td>
            <td><input type="radio" name="education" value="none">ΚΑΜΙΑ</td>
            <td><input type="radio" name="education" value="elementary" style="margin-left: -430px" />ΔΗΜΟΤΙΚΟ</td>
            <td><input type="radio" name="education" value="second" style="margin-left: -280px" />ΓΥΜΝΑΣΙΟ</td>
            <td><input type="radio" name="education" value="high" style="margin-left: -130px" />ΛΥΚΕΙΟ</td>
            <td><input type="radio" name="education" value="uni" style="margin-left: -10px" >ΠΑΝΕΠΙΣΤΗΜΙΟ</td>
        </tr>
		
		<td><input type="submit" name="submit"
            value="ΑΛΛΑΓΗ ΔΗΜΟΓΡΑΦΙΚΩΝ ΣΤΟΙΧΕΙΩΝ"></input>
        </td>
	</table>
	</div>
        
		<br>
		
		<tr>
            <td>Κωδικός χρήστη</td>
            <td><input type="password" name="password"
                       placeholder="εισαγωγη εδω"></td>
			<td><button onclick="Function1()">ΑΛΛΑΓΗ ΚΩΔΙΚΟΥ</button></td>
        </tr>
		<br>
       
        <p><select></p>
			 <option selected="difficulty_level_all">
                  ΟΛΑ ΤΑ ΕΠΙΠΕΔΑ
              </option>
            <option value="difficulty_level_1">ΕΥΚΟΛΟ</option>
            <option value="difficulty_level_2">ΜΕΣΑΙΟ</option>
            <option value="difficulty_level_3">ΠΡΟΧΩΡΗΜΕΝΟ</option>
            <option value="difficulty_level_4">ΕΥΚΟΛΟ ΕΩΣ ΜΕΣΑΙΟ</option>
        </select>
		
		<p><button onclick="Function2()">ΣΥΝΕΧΕΙΑ ΣΤΟ ΜΕΝΟΥ ΠΑΙΧΝΙΔΙΩΝ</button></p>
		
		
       <p id="demo"></p>
	   
	    <audio controls>
		  <source src="Recording.m4a" type="audio/mpeg">
		</audio>

		<br>
		<br>

	    <tr>
			<td>
				<button id="logout_btn">Logout</button>
			</td>
		</tr>  
        
   
    </body>
</html>



<script>

//Logout
var lgout_btn = document.getElementById('logout_btn');
lgout_btn.addEventListener('click', function() {
  document.location.href = 'unset_sess.php';
});





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


