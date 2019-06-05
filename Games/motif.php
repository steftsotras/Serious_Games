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
  grid-template-columns: 170px 170px 170px;
  grid-template-rows: 135px 135px 135px;
  grid-gap: 10px;
  padding: 10px;
}


.grid-container > div {
  /*border-radius: 25px;
  border: 3px solid #73AD21;*/
  background-color: #FFFACD;
  cursor: pointer;
}

.item_block {
  background-color: #B0C4DE;
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

#g2{
	padding-top:14px;
	max-width: 100%;
    max-height: 100%;
	object-fit: cover;
}

#g1{
	border-radius: 25px;
	max-width: 100%;
    max-height: 100%;
}

#cont_btn
{
	background-color:green;
	color: black;
	width: 270px;
	height: 60px;
	font-size: 20px;
	cursor: pointer;
}

</style>
    
     
    </head>
	
    <body>
	
	<div id="container">
	
	<div align="center" style="margin: 0px auto;">
		<h1>ΠΑΙΧΝΙΔΙ ΕΥΡΕΣΗΣ ΜΟΤΙΒΟΥ</h1>
	</div>
	
	
	<div id="center">
	
	<div id="wrapper">
		<div id="time"><b><p id="timer">00:30</p></b></div>
		<div id="back_bton"><button id="back_btn" type="button">ΠΙΣΩ ΣΤΟ ΜΕΝΟΥ</button></div>
	
	</div>
	
	<div id="cont"><button id="cont_btn" type="button">ΕΚΚΙΝΗΣΗ</button></div>
	
	<div class="grid-container" id="clickables">
	  <div id="item1" class="item1" value=1></div>
	  <div id="item2" class="item2" value=2></div>
	  <div id="item3" class="item3" value=3></div>  
	  <div id="item4" class="item4" value=4></div>
	  <div id="item5" class="item5" value=5></div>
	  <div id="item6" class="item6" value=6></div>
	  <div id="item7" class="item7" value=7></div>
	  <div id="item8" class="item8" value=8></div>
	  <div id="item9" class="item9" value=9></div>
	</div>
	<br>
	<div>
		<label id="label1"></label>
	</div>
	</div>
	
	</div>
	
	</body>
	
</html>





<script>


var lvl_played_played;
var dif = <?php echo $_SESSION['dif'];?>;
var counter = 0;
var time = 30;
var interval = 0;
var clicked=[];
var currmotif=[];


if(dif == 1 || dif == 4 || dif == 5){
	lvl_played_played = 1;
}
if(dif == 2){
	lvl_played_played = 2;
}
else if(dif == 3){
	lvl_played_played = 3;
}
	


document.getElementById("back_btn").onclick = function () {
    location.href = "../Menu/menu.php";
};

document.getElementById("cont_btn").onclick = function () {
    show_grid()
	start();
};


$(document).ready(function(){
	
	hide_grid();
	
});


function hide_grid(){
	
	$('#item1').hide();
	$('#item2').hide();
	$('#item3').hide();
	$('#item4').hide();
	$('#item5').hide();
	$('#item6').hide();
	$('#item7').hide();
	$('#item8').hide();
	$('#item9').hide();
	$('#item10').hide();
	$('#item11').hide();
	$('#item12').hide();
	
	
}

function show_grid(){
	
	$('#item1').show();
	$('#item2').show();
	$('#item3').show();
	$('#item4').show();
	$('#item5').show();
	$('#item6').show();
	$('#item7').show();
	$('#item8').show();
	$('#item9').show();
	$('#item10').show();
	$('#item11').show();
	$('#item12').show();
	
}

function initial_background(){
	
	$('#item1').css("backgroundColor", "#FFFACD");
	$('#item2').css("backgroundColor", "#FFFACD");
	$('#item3').css("backgroundColor", "#FFFACD");
	$('#item4').css("backgroundColor", "#FFFACD");
	$('#item5').css("backgroundColor", "#FFFACD");
	$('#item6').css("backgroundColor", "#FFFACD");
	$('#item7').css("backgroundColor", "#FFFACD");
	$('#item8').css("backgroundColor", "#FFFACD");
	$('#item9').css("backgroundColor", "#FFFACD");
	$('#item10').css("backgroundColor", "#FFFACD");
	$('#item11').css("backgroundColor", "#FFFACD");
	$('#item12').css("backgroundColor", "#FFFACD");
	
	
}

function resetClock(){
	
	counter = 0;
	time = 30;
	interval = setInterval("tiktok()",1000);
	
}

function starting_game(){
	
	initial_background();
	resetClock();
	
}

function start(){
	
	$('#cont').hide();
	setTimeout(playMotif,700);
	
}



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



function playMotif(){
	
	var randarr = [1,2,3,4,5,6,7,8,9];
	shuffle(randarr);
	
	
	if(lvl_played == 1 || lvl_played == 12){
		currmotif[0] = randarr[0];
		currmotif[1] = randarr[1];
		
		$('#item'+currmotif[0]).css("backgroundColor", "gray");
		$('#item'+currmotif[1]).css("backgroundColor", "gray");
	}
	else if(lvl_played == 2 || lvl_played == 22){
		currmotif[0] = randarr[0];
		currmotif[1] = randarr[1];
		currmotif[2] = randarr[2];
		
		$('#item'+currmotif[0]).css("backgroundColor", "gray");
		$('#item'+currmotif[1]).css("backgroundColor", "gray");
		$('#item'+currmotif[2]).css("backgroundColor", "gray");
		
	}
	else if(lvl_played == 3 || lvl_played == 32){
		currmotif[0] = randarr[0];
		currmotif[1] = randarr[1];
		currmotif[2] = randarr[2];
		currmotif[3] = randarr[3];
		
		$('#item'+currmotif[0]).css("backgroundColor", "gray");
		$('#item'+currmotif[1]).css("backgroundColor", "gray");
		$('#item'+currmotif[2]).css("backgroundColor", "gray");
		$('#item'+currmotif[3]).css("backgroundColor", "gray");
	}
	
	setTimeout(starting_game,3000);
	
	
}


function shuffle(a) {
    var j, x, i;
    for (i = a.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        x = a[i];
        a[i] = a[j];
        a[j] = x;
    }
    return a;
}


$('#clickables').on('click', 'div', function(e) {
   
   clicked[clicked.length] = $(e.target).attr('value');
   
   if(clicked.length == currmotif.length){
	   //check(clicked);
   }  
});


function arraysEqual(arr1, arr2) {
    if(arr1.length !== arr2.length)
        return false;
    for(var i = arr1.length; i--;) {
        if(arr1[i] !== arr2[i])
            return false;
    }

    return true;
}


function check(clicked){
	
	
	if(lvl_played_played == 1){
		if(clicked == numPlayingNow){
			if(dif == 1){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ, ΔΟΚΙΜΑΣΙΑ ΣΥΜΠΛΗΡΩΣΕ ΤΗ ΔΕΥΤΕΡΗ');
				lvl_played_played = 12;
				clearInterval(interval);
				start();
			}
			else if(dif == 4 || 5){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ ΔΟΚΙΜΑΣΙΑ ΑΝΕΒΑΙΝΕΙΣ ΕΠΙΠΕΔΟ');
				lvl_played_played = 2;
				clearInterval(interval);
				start();
				
			}
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
		}
	}
	else if(lvl_played_played == 12){
		if(clicked == numPlayingNow){
		
			clearInterval(interval);
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(10));
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
		}
	}
	else if(lvl_played_played == 2){
		if(clicked == numPlayingNow){
			if(dif == 2){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ, ΔΟΚΙΜΑΣΙΑ ΣΥΜΠΛΗΡΩΣΕ ΤΗ ΔΕΥΤΕΡΗ');
				lvl_played_played = 22;
				clearInterval(interval);
				start();
			}
			else if(dif == 4){
				clearInterval(interval);
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(30));
			}
			else if(dif == 5){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ ΔΟΚΙΜΑΣΙΑ ΑΝΕΒΑΙΝΕΙΣ ΕΠΙΠΕΔΟ');
				lvl_played_played = 3;
				clearInterval(interval);
				start();
			}
		
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
		}
	}
	else if(lvl_played_played == 22){
		if(clicked == numPlayingNow){
			
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ');
			clearInterval(interval);
			points(20);
			
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
		}
	}
	else if(lvl_played_played == 3){
		if(clicked == numPlayingNow){
			if(dif == 3){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ ΔΟΚΙΜΑΣΙΑ ΣΥΜΠΛΗΡΩΣΕ ΤΗ ΔΕΥΤΕΡΗ');
				lvl_played_played = 32;
				clearInterval(interval);
				start();
			}
			else if(dif == 5){
				clearInterval(interval);
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(70));
			}
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
		}
	}
	else if(lvl_played_played == 32){
		if(clicked == numPlayingNow){
				
			clearInterval(interval);
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(40));
			
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
		}
	}
	
	
}


function points(p){
	
 	return point = Math.round(p * (1-(counter/time)));
}

</script>

