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
  border-radius: 25px;
  border: 3px solid #73AD21;
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


var audio1 = new Audio('../Images/image_sounds/applause_audio.mp3');
var audio2 = new Audio('../Images/image_sounds/Cat_audio.mp3');
var audio3 = new Audio('../Images/image_sounds/crow_audio.mp3');
var audio4 = new Audio('../Images/image_sounds/Drums_audio.mp3');
var audio5 = new Audio('../Images/image_sounds/guitar_audio.mp3');
var audio6 = new Audio('../Images/image_sounds/horse_audio.mp3');
var audio7 = new Audio('../Images/image_sounds/Keyboard_audio.mp3');
var audio8 = new Audio('../Images/image_sounds/Printer_audio.mp3');
var audio9 = new Audio('../Images/image_sounds/saxophone_audio.mp3');
var audio10 = new Audio('../Images/image_sounds/train_audio.mp3');
var audio11 = new Audio('../Images/image_sounds/snake_audio.wav');
var audio12 = new Audio('../Images/image_sounds/telephone_audio.mp3');



var toPlay = new Audio();

var playlist = new Array(audio1,audio2,audio3,audio4,audio5,audio6,audio7,audio8,audio9,audio10,audio11,audio12);
var numPlayingNow = 0;

var lvl_played;
var dif = <?php echo $_SESSION['dif'];?>;
var counter = 0;
var time = 30;
var interval = 0;
var clicked=[];
var currmotif=[];


if(dif == 1 || dif == 4 || dif == 5){
	lvl_played = 1;
}
if(dif == 2){
	lvl_played = 2;
}
else if(dif == 3){
	lvl_played = 3;
}
	


document.getElementById("back_btn").onclick = function () {
    location.href = "../Menu/menu.php";
};

document.getElementById("cont_btn").onclick = function () {
    start();
};


$(document).ready(function(){
	
	$('#clickables').hide();
	
});



function start(){
	
	$('#cont').hide();
	
	if(lvl_played == 1 || lvl_played == 12){
		
		setTimeout(playMotif,500,1);
	}
	if(lvl_played == 2 || lvl_played == 22){
		setTimeout(playMotif,500,2);
	}
	else if(lvl_played == 3 || lvl_played == 32){
		setTimeout(playMotif,500,3);
	}
	
		
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


function lvl1(){
	
	$('#item1').show();
	$('#item2').show();
	$('#item3').show();
	$('#item4').show();
	$('#item5').show();
	$('#item6').show();
	$('#item7').hide();
	$('#item8').hide();
	$('#item9').hide();
	$('#item10').hide();
	$('#item11').hide();
	$('#item12').hide();
	
	
	setTimeout(lvl1,5000);
	
	counter = 0;
	time = 30;
	interval = setInterval("tiktok()",1000);
	
}



function lvl2(){
	
	$('#item1').show();
	$('#item2').show();
	$('#item3').show();
	$('#item4').show();
	$('#item5').show();
	$('#item6').show();
	$('#item7').show();
	$('#item8').show();
	$('#item9').show();
	$('#item10').hide();
	$('#item11').hide();
	$('#item12').hide();
	
	
	setTimeout(lvl2,5000);
	
	counter = 0;
	time = 30;
	interval = setInterval("tiktok()",1000);
}


function lvl3(){
	
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
	
	
	setTimeout(lvl2,5000);
	
	counter = 0;
	time = 30;
	interval = setInterval("tiktok()",1000);
	
}

function 



function playMotif(lvl){
	
	var rand1,rand2,rand3,rand4;
	
	var randarr = [1,2,3,4,5,6,7,8,9];
	shuffle(randarr);
	
	
	if(lvl == 1 || lvl == 12){
		rand1 = randarr[0];
		rand2 = randarr[1];
		
		$('#item'+rand1).css("backgroundColor", "gray");
		$('#item'+rand2).css("backgroundColor", "gray");
	}
	else if(lvl == 2 || lvl == 22){
		rand1 = randarr[0];
		rand2 = randarr[1];
		rand3 = randarr[2];
		$('#item'+rand1).css("backgroundColor", "gray");
		$('#item'+rand2).css("backgroundColor", "gray");
		$('#item'+rand3).css("backgroundColor", "gray");
		
	}
	else if(lvl == 3 || lvl == 32){
		rand1 = randarr[0];
		rand2 = randarr[1];
		rand3 = randarr[2];
		rand4 = randarr[3];
		$('#item'+rand1).css("backgroundColor", "gray");
		$('#item'+rand2).css("backgroundColor", "gray");
		$('#item'+rand3).css("backgroundColor", "gray");
		$('#item'+rand4).css("backgroundColor", "gray");
	}
	
	toPlay = playlist[rand-1];
	numPlayingNow = rand;
	
	toPlay.play();
	
	
	
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


function check(clicked){
	
	
	if(lvl_played == 1){
		if(clicked == numPlayingNow){
			if(dif == 1){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ, ΔΟΚΙΜΑΣΙΑ ΣΥΜΠΛΗΡΩΣΕ ΤΗ ΔΕΥΤΕΡΗ');
				lvl_played = 12;
				clearInterval(interval);
				start();
			}
			else if(dif == 4 || 5){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ ΔΟΚΙΜΑΣΙΑ ΑΝΕΒΑΙΝΕΙΣ ΕΠΙΠΕΔΟ');
				lvl_played = 2;
				clearInterval(interval);
				start();
				
			}
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
		}
	}
	else if(lvl_played == 12){
		if(clicked == numPlayingNow){
		
			clearInterval(interval);
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(10));
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
		}
	}
	else if(lvl_played == 2){
		if(clicked == numPlayingNow){
			if(dif == 2){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ, ΔΟΚΙΜΑΣΙΑ ΣΥΜΠΛΗΡΩΣΕ ΤΗ ΔΕΥΤΕΡΗ');
				lvl_played = 22;
				clearInterval(interval);
				start();
			}
			else if(dif == 4){
				clearInterval(interval);
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(30));
			}
			else if(dif == 5){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ ΔΟΚΙΜΑΣΙΑ ΑΝΕΒΑΙΝΕΙΣ ΕΠΙΠΕΔΟ');
				lvl_played = 3;
				clearInterval(interval);
				start();
			}
		
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
		}
	}
	else if(lvl_played == 22){
		if(clicked == numPlayingNow){
			
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ');
			clearInterval(interval);
			points(20);
			
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
		}
	}
	else if(lvl_played == 3){
		if(clicked == numPlayingNow){
			if(dif == 3){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ ΔΟΚΙΜΑΣΙΑ ΣΥΜΠΛΗΡΩΣΕ ΤΗ ΔΕΥΤΕΡΗ');
				lvl_played = 32;
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
	else if(lvl_played == 32){
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

