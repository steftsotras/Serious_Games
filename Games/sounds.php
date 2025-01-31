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
  grid-template-rows: 135px 135px 135px 135px;
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
		<h1>ΠΑΙΧΝΙΔΙ ΤΑΙΡΙΑΣΜΑ ΗΧΩΝ</h1>
	</div>
	
	
	<div id="center">
	
	<div id="wrapper">
		<div id="time"><b><p id="timer">00:30</p></b></div>
		<div id="back_bton"><button id="back_btn" type="button">ΠΙΣΩ ΣΤΟ ΜΕΝΟΥ</button></div>
	
	</div>
	
	<div id="cont"><button id="cont_btn" type="button">ΕΚΚΙΝΗΣΗ</button></div>
	
	<br>
	
	<div id="audiocont">
			<audio controls>
				<source src="../Help/tairiasma_hxwn.mp3" type="audio/mpeg">
			</audio>
	</div> 
	
	<div class="grid-container" id="clickables">
	  <div id="item1" class="item1"><img value=1 src="../Images/image_sounds/app.png" id="g1" /></div>
	  <div id="item2" class="item2"><img value=2 src="../Images/image_sounds/cat.png" id="g1" /></div>
	  <div id="item3" class="item3"><img value=3 src="../Images/image_sounds/row.png" id="g1" /></div>  
	  <div id="item4" class="item4"><img value=4 src="../Images/image_sounds/drum.png" id="g1" /></div>
	  <div id="item5" class="item5"><img value=5 src="../Images/image_sounds/guitar.png" id="g1" /></div>
	  <div id="item6" class="item6"><img value=6 src="../Images/image_sounds/Horse.png" id="g1" /></div>
	  <div id="item7" class="item7"><img value=7 src="../Images/image_sounds/keybo.png" id="g1" /></div>
	  <div id="item8" class="item8"><img value=8 src="../Images/image_sounds/printer.png" id="g1" /></div>
	  <div id="item9" class="item9"><img value=9 src="../Images/image_sounds/sax.png" id="g1" /></div>
	  <div id="item10" class="item10"><img value=10 src="../Images/image_sounds/train.png" id="g2" /></div>
	  <div id="item11" class="item11"><img value=11 src="../Images/image_sounds/snak.png" id="g1" /></div>  
	  <div id="item12" class="item12"><img value=12 src="../Images/image_sounds/telephone.png" id="g2" /></div>  
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

function start(){
	
	hide_grid();
	$('#audiocont').hide();
	$('#cont').hide();
	
	if(lvl_played == 1 || lvl_played == 12){
		
		setTimeout(playSound,500,1);
	}
	if(lvl_played == 2 || lvl_played == 22){
		setTimeout(playSound,500,2);
	}
	else if(lvl_played == 3 || lvl_played == 32){
		setTimeout(playSound,500,3);
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
	
	counter = 0;
	time = 30;
	interval = setInterval("tiktok()",1000);
	
}

function playSound(lvl){
	
	var rand=0;
	
	if(lvl == 1 || lvl == 12){
		rand = Math.floor((Math.random() * 6) + 1);
	}
	else if(lvl == 2 || lvl == 22){
		rand = Math.floor((Math.random() * 9) + 1);
	}
	else if(lvl == 3 || lvl == 32){
		rand = Math.floor((Math.random() * 12) + 1);
	}
	
	toPlay = playlist[rand-1];
	numPlayingNow = rand;
	
	toPlay.play();
	
	if(lvl == 1 || lvl == 12){
		setTimeout(lvl1,5000);
	}
	else if(lvl == 2 || lvl == 22){
		setTimeout(lvl2,5000);
	}
	else if(lvl == 3 || lvl == 32){
		setTimeout(lvl3,5000);
	}
	
}


$('#clickables').on('click', 'img', function(e) {
   var clicked = $(e.target).attr('value');
   check(clicked);
      
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
			
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(20));
			clearInterval(interval);
			
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

