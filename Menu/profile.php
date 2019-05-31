<?php
session_start();
?>
<html>
    <head>
        <title>Serious Games</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>       
div.relative {
  position: relative;
  left: 600px;
  width: 150%;
  
}
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


</style>
    <h1>ΤΟ ΠΡΟΦΙΛ ΣΟΥ</h1>
     
    </head>
    <body>
        <div class="relative">
		ΠΑΙΧΝΙΔΙΑ ΣΟΒΑΡΟΥ ΣΚΟΠΟΥ
		</div>
       <p><button onclick="Function1()">ΑΛΛΑΓΗ ΚΩΔΙΚΟΥ</button></p>
       <p><button onclick="Function3()">ΑΛΛΑΓΗ ΔΗΜΟΓΡΑΦΙΚΩΝ ΣΤΟΙΧΕΙΩΝ</button></p>
       
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

<script>
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
<br>
<br>
<br>

       <tr>
            <td>
			<form action="login.html">
             <input type="submit" value="ΑΠΟΣΥΝΔΕΣΗ">
            </form> 

            </td>
	     </tr>  
        
   
    </body>
</html>

