

<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LOGIN</title>
 <h1>ΠΑΙΧΝΙΔΙΑ ΣΟΒΑΡΟΥ ΣΚΟΠΟΥ</h1><br>
 <h2>Είσοδος Χρήστη</h2>
 
 <style>
     h2{
         color :#ffa31a;
     }
       body {
  background-color: #2f2f1e;
}
h1 {
  color: #ffa31a;
  margin-left: 40px;
} 
tr {
color: #ffa31a;
margin-left: 30px;
font-size: 18pt;
line-height: 25pt;
font-family: Arial, sans serif;        
}

        
    </style>
</head>
<body>
     
    <form name="login" method="post" action="Login_Register/Login.php">
    <table>
        <tr>
             <td>Αναγνωριστικό Χρήστη</td>
            <td><input type="text" name="username"
                       placeholder="εισαγωγη εδω"></td> 
            </tr>
        <tr>
            <td>Κωδικός Χρήστη</td>
            <td><input type="password" name="password"
                       placeholder="εισαγωγη εδω"></td>
            </tr>
        
             <tr>
            <td>
	<form action="profile.php">
             <input type="submit" value="Submit">
            </form> 

            </td>
            
            <td>
                ΔΕΝ ΕΧΕΤΕ ΛΟΓΑΡΙΑΣΜΟ?<a href="Login_Register/register.html" style="color:red;margin-left: 25px">πατήστε εδώ για δημιουργία</a>
            </td>
            
        </tr>
    </table>
        </form>
	
	<audio controls>
  <source src="Recording1.m4a" type="audio/mpeg">
</audio>
    
    
    <?php
			
				$out = '<td width="220"><span style="font-size:11pt;">';
				if(isset($_GET['error'])){
					if($_GET['error'] == 2){
								
						$out .= '
								 *Please write both your username and password
								';
						$_GET['error'] == 0;
					}
					else if($_GET['error'] == 1){
						$out .= '  
								 *Problem with database connection
								';
						$_GET['error'] == 0;
					}
					else if($_GET['error'] == 3){
						$out .= '  
								 *Wrong username or password
								';
						$_GET['error'] == 0;
					}
				}
				$out .= '</span></td>';	
				
				echo $out;
			?>
      

</body>
</html>
