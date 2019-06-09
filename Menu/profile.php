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
	
	position: relative;
}
div {
color: #ffa31a;    
}

#live_data {
	padding:40px;
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

.change_btn {
	
	background-color: 	#FF6347;
	color: black;
	width: 300px;
	height: 38px;
	font-size: 15px;
	cursor: pointer;
}


</style>
    
     
    </head>
    <body>
	<div id="container">
		<h1>ΤΟ ΠΡΟΦΙΛ ΣΟΥ <?php echo $_SESSION['username'];?></h1>
		
		<div id="live_data"></div>
		
		<div id="audiocont">
			<audio controls>
				<source src="../Help/profil.mp3" type="audio/mpeg">
			</audio>
		</div> 
	</div>
	<div id="container">	
		
		
		<div id="center">
			<h2 align="left">ΔΗΜΟΓΡΑΦΙΚΑ ΣΤΟΙΧΕΙΑ</h2>
			
			
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
				<td><button class="change_btn" id="submit_btn" >ΑΛΛΑΓΗ ΔΗΜΟΓΡΑΦΙΚΩΝ ΣΤΟΙΧΕΙΩΝ</button>
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
				<td><button class="change_btn" id="pass_btn">ΑΛΛΑΓΗ ΚΩΔΙΚΟΥ</button></td>
			</tr>
			</table>
			</div>
			
			<div>
			<table>
			<tr>
			<td>
			<h2>ΔΥΣΚΟΛΙΑ ΠΑΙΧΝΙΔΙΩΝ</h2>
			</td>
			</tr>
			<tr>
			<td>
			<p><select class="diff" name="diff"></p>
				 <option value=5 selected="difficulty_level_all">
					  ΟΛΑ ΤΑ ΕΠΙΠΕΔΑ
				  </option>
				<option value=1>ΕΥΚΟΛΟ</option>
				<option value=2>ΜΕΣΑΙΟ</option>
				<option value=3>ΠΡΟΧΩΡΗΜΕΝΟ</option>
				<option value=4>ΕΥΚΟΛΟ ΕΩΣ ΜΕΣΑΙΟ</option>
			</select>
			</td>
			</tr>
			<tr>
			<p><td><button class="change_btn" id="diff_btn">ΑΛΛΑΓΗ ΔΥΣΚΟΛΙΑΣ</button></p>
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


document.getElementById("logout_btn").onclick = function () {
        location.href = "../Menu/unset_sess.php";
};

document.getElementById("cont_btn").onclick = function () {
        location.href = "../Menu/menu.php";
};

document.getElementById("submit_btn").onclick = function () {
        var gender = $("input[name='gender']:checked").val();
		var education = $("input[name='education']:checked").val();
		var city = $("input[name='city']").val();
		var birthdate = $("input[name='birthdate']").val();
		json_data = {
			gender: gender,
			education:education,
			city:city,
			birthdate:birthdate
		};
		post_data(json_data);
};

document.getElementById("pass_btn").onclick = function () {
        var password = $("input[name='password']").val();
		json_data = {password: password};
		post_data(json_data);
};

document.getElementById("diff_btn").onclick = function () {
        var difficulty = $('select.diff').find(':selected').val();
		json_data = {difficulty: difficulty};
		post_data(json_data);
};

$(document).ready(get_data); 

function get_data(){
	$.ajax({  
		url:"profile_data.php",  
		method:"GET",
		success:function(data){  
			
			$('#live_data').html(data); 
			
		}  
	}); 
}

function post_data(json_data){
	
	$.post('change_settings.php',json_data,function(data){get_data();});
	
}


</script>


