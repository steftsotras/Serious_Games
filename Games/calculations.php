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
	width: 90%;
	text-align:center;
	position: absolute;
}

body {
  background-color: #2f2f1e;
  font-size: 15pt;
  line-height: 25pt;
  font-family: Arial, sans serif; 
}

h1 {
  color: #ffa31a;
} 

#center{
	width: 537px;
	margin: 0px auto;
}

#btns{
	margin: 0px auto;
	
}

.grid-container {
  
  display: grid;
  grid-template-columns: 100px 100px 100px 100px 100px;
  grid-template-rows: 100px 100px 100px 100px 100px;
  grid-gap: 5px;
  padding: 8px;
  background-color:	#8B0000;
}


.grid-container > div {
  background-color: #FFFACD;
  text-align: center;
  padding: 2px 0;
  font-size: 50px;
  color: #00008B;
  vertical-align: middle;
  line-height: 100px;
}

.item_block {
  background-color: #B0C4DE;
}

textarea {
  background-color: #FFFACD;
  text-align: center;
  font-size: 50px;
  color: #00008B;
  vertical-align: middle;
  line-height: 100px; 
  width: 100px;
  height: 98px;
  overflow:hidden;
  resize:none;
  outline: none;
  border: none;
	
}

button
{
	background-color: red;
	color: black;
	width: 270px;
	height: 60px;
	font-size: 20px;
	cursor: pointer;
}

#back_bton{
    float: left;
	margin-top:30px
}


#label1{
	background-color: #ffa31a;
	color: black;
	font-size: 20px;
	width:100%;
}

#timer{
	font-size: 50px;
	color: #D2691E;
	width: 100px;
}

#wrapper {
    width: 600px;
	height:120px;
    overflow: hidden; /* will contain if #first is longer than #second */
	
}

#time {
	margin-right:50px;
	margin-left:47px;
    width: 170px;
    float:left; /* add this */
}

</style>
    
     
    </head>
	
    <body>
	
	<div id="container">
	
	<div align="center" style="margin: 0px auto;">
		<h1>ΠΑΙΧΝΙΔΙ ΥΠΟΛΟΓΙΣΜΟΣ</h1>
	</div>
	
	
	<div id="center">
	
	
	<div id="wrapper">
		<div id="time"><b><p id="timer">01:30</p></b></div>
		<div id="back_bton"><button id="back_btn" type="button">ΠΙΣΩ ΣΤΟ ΜΕΝΟΥ</button></div>
	
	</div>
	
	<div class="grid-container">
	  <div id="item1" class="item1"></div>
	  <div id="item2" class="item2"></div>
	  <div id="item3" class="item3"><textarea id="text3"></textarea></div>  
	  <div id="item4" class="item4"></div>
	  <div id="item5" class="item5"></div>
	  <div id="item6" class="item6"></div>
	  <div id="item7" class="item_block"></div>
	  <div id="item8" class="item8"></div>
	  <div id="item9" class="item_block"></div>
	  <div id="item10" class="item10"></div>
	  <div id="item11" class="item11"></div>  
	  <div id="item12" class="item12"></div>
	  <div id="item13" class="item13"></div>
	  <div id="item14" class="item14"></div>
	  <div id="item15" class="item15"><textarea id="text15"></textarea></div> 
	  <div id="item16" class="item16"></div>  
	  <div id="item17" class="item_block"></div>
	  <div id="item18" class="item18"></div>
	  <div id="item19" class="item_block"></div>  
	  <div id="item20" class="item20"></div>
	  <div id="item21" class="item21"><textarea id="text21"></textarea></div> 
	  <div id="item22" class="item22"></div>
	  <div id="item23" class="item23"><textarea id="text23"></textarea></div> 
	  <div id="item24" class="item24"></div>
	  <div id="item25" class="item25"></div>  	  
	</div>
	<br>
	<div>
		<label id="label1"></label>
	</div>
	</div>
	<div id="btns">
		<button id="check_btn" type="button">ΕΛΕΓΧΟΣ</button>
		<button id="clear_btn" type="button">ΚΑΘΑΡΙΣΜΟΣ</button>
	</div>
	
	
	</div>
	
	</body>
	
</html>


<script>

var lvl_played;
var dif = <?php echo $_SESSION['dif'];?>;
var counter = 0;
var time = 90;
var interval = 0;

document.getElementById("clear_btn").onclick = function () {
    clear();
};

document.getElementById("back_btn").onclick = function () {
    location.href = "../Menu/menu.php";
};

document.getElementById("check_btn").onclick = function () {
    check();
};

$(document).ready(function(){
	
	
	
	if(dif == 1 || dif == 4 || dif == 5){
		lvl_played = 1;
		lvl1();
	}
	if(dif == 2){
		lvl_played = 2;
		lvl2();
	}
	else if(dif == 3){
		lvl_played = 3;
		lvl3();
	}
	
	interval = setInterval("tiktok()",1000);
	
});


function tiktok(){
	
	if(counter == time){
		time_out();
	}
	
	counter++;
	var timeleft = time - counter;
	var min = Math.floor(timeleft/60);
	var sec = timeleft % 60;
	
	
	if(sec >= 10){
		
		$('#timer').html("0"+min+":"+sec);
	}
	else{
		$('#timer').html("0"+min+":0"+sec);
	}
	
	
}

function time_out(){
	
	clearInterval(interval);
	alert("ΤΕΛΙΩΣΕ Ο ΧΡΟΝΟΣ!");
	location.href = "../Menu/menu.php";
}

function lvl1(){
	
	$('#item1').text(8);
	$('#item2').text('+');
	$('#item4').text('=');
	$('#item5').text(15);
	$('#item6').text('+');
	$('#item7').css('background-color', '#696969');
	$('#item8').text('-');
	$('#item9').css('background-color', '#696969');
	$('#item10').text('-');
	$('#item11').text(2);
	$('#item12').text('+');
	$('#item13').text(5);
	$('#item14').text('=');
	$('#item16').text('=');
	$('#item17').css('background-color', '#696969');
	$('#item18').text('=');
	$('#item19').css('background-color', '#696969');
	$('#item20').text('=');
	$('#item22').text('-');
	$('#item24').text('=');
	$('#item25').text(8);
	
}

function lvl1_2(){
	
	$('#item1').text(10);
	$('#item2').text('-');
	$('#item4').text('=');
	$('#item5').text(7);
	$('#item6').text('-');
	$('#item7').css('background-color', '#696969');
	$('#item8').text('-');
	$('#item9').css('background-color', '#696969');
	$('#item10').text('-');
	$('#item11').text(5);
	$('#item12').text('-');
	$('#item13').text(1);
	$('#item14').text('=');
	$('#item16').text('=');
	$('#item17').css('background-color', '#696969');
	$('#item18').text('=');
	$('#item19').css('background-color', '#696969');
	$('#item20').text('=');
	$('#item22').text('-');
	$('#item24').text('=');
	$('#item25').text(3);
	
}

function lvl2(){
	
	$('#item1').text(60);
	$('#item2').text('-');
	$('#item4').text('=');
	$('#item5').text(42);
	$('#item6').text('-');
	$('#item7').css('background-color', '#696969');
	$('#item8').text('-');
	$('#item9').css('background-color', '#696969');
	$('#item10').text('-');
	$('#item11').text(30);
	$('#item12').text('-');
	$('#item13').text(6);
	$('#item14').text('=');
	$('#item16').text('=');
	$('#item17').css('background-color', '#696969');
	$('#item18').text('=');
	$('#item19').css('background-color', '#696969');
	$('#item20').text('=');
	$('#item22').text('-');
	$('#item24').text('=');
	$('#item25').text(18);
	
}

function lvl2_2(){
	
	$('#item1').text(60);
	$('#item2').text('-');
	$('#item4').text('=');
	$('#item5').text(24);
	$('#item6').text('+');
	$('#item7').css('background-color', '#696969');
	$('#item8').text('+');
	$('#item9').css('background-color', '#696969');
	$('#item10').text('+');
	$('#item11').text(75);
	$('#item12').text('-');
	$('#item13').text(36);
	$('#item14').text('=');
	$('#item16').text('=');
	$('#item17').css('background-color', '#696969');
	$('#item18').text('=');
	$('#item19').css('background-color', '#696969');
	$('#item20').text('=');
	$('#item22').text('-');
	$('#item24').text('=');
	$('#item25').text(63);
	
}


function lvl3(){
	
	$('#item1').text(8);
	$('#item2').text('x');
	$('#item4').text('=');
	$('#item5').text(32);
	$('#item6').text(':');
	$('#item7').css('background-color', '#696969');
	$('#item8').text(':');
	$('#item9').css('background-color', '#696969');
	$('#item10').text(':');
	$('#item11').text(2);
	$('#item12').text('x');
	$('#item13').text(2);
	$('#item14').text('=');
	$('#item16').text('=');
	$('#item17').css('background-color', '#696969');
	$('#item18').text('=');
	$('#item19').css('background-color', '#696969');
	$('#item20').text('=');
	$('#item22').text('x');
	$('#item24').text('=');
	$('#item25').text(8);
	
}

function lvl3_2(){
	
	$('#item1').text(50);
	$('#item2').text(':');
	$('#item4').text('=');
	$('#item5').text(10);
	$('#item6').text(':');
	$('#item7').css('background-color', '#696969');
	$('#item8').text(':');
	$('#item9').css('background-color', '#696969');
	$('#item10').text(':');
	$('#item11').text(10);
	$('#item12').text(':');
	$('#item13').text(5);
	$('#item14').text('=');
	$('#item16').text('=');
	$('#item17').css('background-color', '#696969');
	$('#item18').text('=');
	$('#item19').css('background-color', '#696969');
	$('#item20').text('=');
	$('#item22').text(':');
	$('#item24').text('=');
	$('#item25').text(5);
	
}



function check(){
	
	var it3 = $('#text3').val();
	var it15 = $('#text15').val();
	var it21 = $('#text21').val();
	var it23 = $('#text23').val();
	
	
	if(lvl_played == 1){
		if(it3 == 7 && it15 == 7 && it21 == 10 && it23 == 2){
			if(dif == 1){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ, ΔΟΚΙΜΑΣΙΑ ΣΥΜΠΛΗΡΩΣΕ ΤΗ ΔΕΥΤΕΡΗ');
				lvl_played = 12;
				clear();
				lvl1_2();
			}
			else if(dif == 4 || 5){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ ΔΟΚΙΜΑΣΙΑ ΑΝΕΒΑΙΝΕΙΣ ΕΠΙΠΕΔΟ');
				lvl_played = 2;
				clear();
				lvl2();
				
			}
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
			clear();
		}
	}
	else if(lvl_played == 12){
		if(it3 == 3 && it15 == 4 && it21 == 5 && it23 == 2){
		
			clearInterval(interval);
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(10));
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
			clear();
		}
	}
	else if(lvl_played == 2){
		if(it3 == 18 && it15 == 24 && it21 == 30 && it23 == 12){
			if(dif == 2){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ, ΔΟΚΙΜΑΣΙΑ ΣΥΜΠΛΗΡΩΣΕ ΤΗ ΔΕΥΤΕΡΗ');
				lvl_played = 22;
				clear();
				lvl2_2();
			}
			else if(dif == 4){
				clearInterval(interval);
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(30));
			}
			else if(dif == 5){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ ΔΟΚΙΜΑΣΙΑ ΑΝΕΒΑΙΝΕΙΣ ΕΠΙΠΕΔΟ');
				lvl_played = 3;
				clear();
				lvl3();
			}
		
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
			clear();
		}
	}
	else if(lvl_played == 22){
		if(it3 == 36 && it15 == 39 && it21 == 135 && it23 == 72){
			
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(20));
			clearInterval(interval);
			points(20);
			
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
			clear();
		}
	}
	else if(lvl_played == 3){
		if(it3 == 4 && it15 == 4 && it21 == 4 && it23 == 2){
			if(dif == 3){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ ΔΟΚΙΜΑΣΙΑ ΣΥΜΠΛΗΡΩΣΕ ΤΗ ΔΕΥΤΕΡΗ');
				lvl_played = 32;
				clear();
				lvl3_2();
			}
			else if(dif == 5){
				clearInterval(interval);
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(70));
			}
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
			clear();
		}
	}
	else if(lvl_played == 32){
		if(it3 == 5 && it15 == 2 && it21 == 5 && it23 == 1){
				
			clearInterval(interval);
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(40));
			
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
			clear();
		}
	}
	
	
}


function clear(){
	$('#text3').val("");
	$('#text15').val("");
	$('#text21').val("");
	$('#text23').val("");
	
}

function points(p){
	
 	return point = Math.round(p * (1-(counter/time)));
}

</script>

