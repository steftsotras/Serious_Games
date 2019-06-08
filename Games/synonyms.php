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
	width: 750px;
	margin: 0px auto;
}

#btns{
	margin: 0px auto;
	
}

.grid-container {
  
  display: grid;
  grid-template-columns: 230px 230px 230px;
  grid-template-rows: 60px 60px;
  grid-gap: 10px;
  padding: 10px;
}


.grid-container > div {
  border-radius: 25px;
  
  background-color: #FFFACD;
  cursor: pointer;
  
  text-align: center;
  padding: 2px 0;
  font-size: 30px;
  color:black;
  vertical-align: middle;
  line-height: 50px;
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
	display:none;
}

.block
{
	padding:15px;
	border-radius: 15px;
	border: 2px solid red;
	width: 750px;
	background-color: #FFFACD;
	
}

</style>
    
     
    </head>
	
    <body>
	
	<div id="container">
	
	<div align="center" style="margin: 0px auto;">
		<h1>ΠΑΙΧΝΙΔΙ ΓΛΩΣΣΑΣ</h1>
	</div>
	
	
	<div id="center">
	
	<div id="wrapper">
		<div id="time"><b><p id="timer">01:30</p></b></div>
		<div id="back_bton"><button id="back_btn" type="button">ΠΙΣΩ ΣΤΟ ΜΕΝΟΥ</button></div>
	
	</div>
	
	<div id="cont"><button id="cont_btn" type="button">ΕΚΚΙΝΗΣΗ</button></div>
	
	<div id ="game">
	<div class="block">
	
	<label class="labels" id="first_label">Βρες το</label>
	
	<div class="grid-container" id="first">
	  <div id="item1" class="item1" value=1>malaka</div>
	  <div id="item2" class="item2" value=2></div>
	  <div id="item3" class="item3" value=3></div>  
	  <div id="item4" class="item4" value=4></div>
	  <div id="item5" class="item5" value=5></div>
	  <div id="item6" class="item6" value=6></div>
	</div>
	
	</div>
	<br>
	
	<div class="block">
		
	<label class="labels" id="second_label">Βρες το</label>
	
	<div class="grid-container" id="second">
	  <div id="item21" class="item21" value=21></div>
	  <div id="item22" class="item22" value=22></div>
	  <div id="item23" class="item23" value=23></div>  
	  <div id="item24" class="item24" value=24></div>
	  <div id="item25" class="item25" value=25></div>
	  <div id="item26" class="item26" value=26></div>
	</div>
	
	</div>
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


var lvl_played;
var dif = <?php echo $_SESSION['dif'];?>;
var counter = 0;
var time = 30;
var interval = 0;
var clicked=[];
var currmotif=[];

var synToUse = [['Αβέβαιος','Απέριττος','Ανώφελος','Αχρηστος','Σύνθετος','Αποκρύπτω'],
['Βοήθεια','Μεμονομένα','Χρήσιμα','Επιβεβαίωση','Εγκώμιο','Αξία'],
['Γνώση','Λήψη','Σήμα','Καθοδήγηση','Αναλγησία','Έμπνευση']];

var syn      = ['Ασταθής','Ενίσχυση','Αντίληψη'];

var antToUse = [['Ησυχία','Ύπαρξη','Θόρυβος','Ένταση','Δυνατός','Θρόμβος'],
['Κατηγορία','Ανυπαρξία','Υπόσταση','Καθυστερημένα','Εμπιστοσύνη','Ποικιλογνωμία'],
['Μαζικός','Μάζα','Αμφιβολία','Πολυσύνθετος','Μόνος','Έρημος']];

var ant      = ['Φασαρία','Υπεράσπιση','Ατομικός'];


var currsyn = [];
var currwords = [];
var currant = [];
var word;
var prevrand = 0;
var rand = 0;
var clickeda = false;
var clickedb = false;
var clickedta;
var clickedtb;

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
    show_grid()
	//start();
};


$(document).ready(function(){
	
	//hide_grid();
	lvl1();
});


function hide_grid(){
	$('#game').hide();
	
}

function show_grid(){
	
	$('#game').show();
	
}

function initial_background(){
	
	$('#item1').css("backgroundColor", "#FFFACD");
	$('#item2').css("backgroundColor", "#FFFACD");
	$('#item3').css("backgroundColor", "#FFFACD");
	$('#item4').css("backgroundColor", "#FFFACD");
	$('#item5').css("backgroundColor", "#FFFACD");
	$('#item6').css("backgroundColor", "#FFFACD");
	
	
}

function resetClock(){
	
	counter = 0;
	time = 690;
	interval = setInterval("tiktok()",1000);
	
}

function starting_game(){
	
	initial_background();
	resetClock();
	
}

function start(){
	
	$('#cont').hide();
	initial_background();
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


function lvl1(){
	
	getSyn();
	$('#first_label').text("Βρες το συνώνυμο της λέξης "+word);
	
	$('#item6').text(currwords[0]);
	$('#item1').text(currwords[1]);
	$('#item2').text(currwords[2]);
	$('#item3').text(currwords[3]);
	$('#item4').text(currwords[4]);
	$('#item5').text(currwords[5]);
	
	
	getSyn();
	$('#second_label').text("Βρες το συνώνυμο της λέξης "+word);
	
	$('#item26').text(currwords[0]);
	$('#item21').text(currwords[1]);
	$('#item22').text(currwords[2]);
	$('#item23').text(currwords[3]);
	$('#item24').text(currwords[4]);
	$('#item25').text(currwords[5]);
}

function lvl2(){
	
	getAnt();
	$('#first_label').text("Βρες το αντώνυμο της λέξης "+word);
	
	$('#item6').text(currwords[0]);
	$('#item1').text(currwords[1]);
	$('#item2').text(currwords[2]);
	$('#item3').text(currwords[3]);
	$('#item4').text(currwords[4]);
	$('#item5').text(currwords[5]);
	
	
	getAnt();
	$('#second_label').text("Βρες το αντώνυμο της λέξης "+word);
	
	$('#item26').text(currwords[0]);
	$('#item21').text(currwords[1]);
	$('#item22').text(currwords[2]);
	$('#item23').text(currwords[3]);
	$('#item24').text(currwords[4]);
	$('#item25').text(currwords[5]);
}

function lvl3(){
	
	getSyn();
	$('#first_label').text("Βρες το συνώνυμο της λέξης "+word);
	
	$('#item6').text(currwords[0]);
	$('#item1').text(currwords[1]);
	$('#item2').text(currwords[2]);
	$('#item3').text(currwords[3]);
	$('#item4').text(currwords[4]);
	$('#item5').text(currwords[5]);
	
	
	getAnt();
	$('#second_label').text("Βρες το αντώνυμο της λέξης "+word);
	
	$('#item26').text(currwords[0]);
	$('#item21').text(currwords[1]);
	$('#item22').text(currwords[2]);
	$('#item23').text(currwords[3]);
	$('#item24').text(currwords[4]);
	$('#item25').text(currwords[5]);
}


function getSyn(){
	
	while(rand == prevrand){
		 rand = Math.floor((Math.random() * 3));
	}
	prevrand = rand;
	
	currwords = [];
	
	currwords = [...synToUse[rand]];
	currsyn[currsyn.length] = syn[rand];
	
	word = currwords[0];
	currwords[0] = syn[rand];
	shuffle(currwords);
}

function getAnt(){
	
	while(rand == prevrand){
		 rand = Math.floor((Math.random() * 3));
	}
	prevrand = rand;
	
	rand = Math.floor((Math.random() * 3));
	
	currwords = [...antToUse[rand]];
	currant[currsyn.length] = ant[rand];
	
	word = currwords[0];
	currwords[0] = ant[rand];
	
	shuffle(currwords);
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
   if(clicked.length < currmotif.length){
	    $(e.target).css("backgroundColor", "gray");
		clicked[clicked.length] = parseInt($(e.target).attr('value'), 10);
   }
   else if(clicked.length > currmotif.length){
	    mistake();
	   
   }
   
   
   if(clicked.length == currmotif.length){
	   check(clicked);
   }  
});


$('#first').on('click', 'div', function(e) {
   if(!clickeda){
	    $(e.target).css("backgroundColor", "gray");
		clickedta = $(e.target).text();
		clickeda = true;
		prevclicka = $(e.target);
   }
   else{
	   prevclicka.css("backgroundColor", "#FFFACD");
	   $(e.target).css("backgroundColor", "gray");
	   clickedta = $(e.target).text();
	   prevclicka = $(e.target);
	   
   }
   console.log(clickedta);
   
});

$('#second').on('click', 'div', function(e) {
   if(!clickedb){
	    $(e.target).css("backgroundColor", "gray");
		clickedtb = $(e.target).text();
		clickedb = true;
		prevclickb = $(e.target);
   }
   else{
	   prevclickb.css("backgroundColor", "#FFFACD");
	   $(e.target).css("backgroundColor", "gray");
	   clickedtb = $(e.target).text();
	   prevclickb = $(e.target);
	   
   }
   console.log(clickedtb);
   
});

function checkClicked(){
	
	if(clickeda && clickedb){
		
		clicked[0] = clickedta;
		clicked[1] = clickedtb;
		check(clicked);
		
	}
	else{
		$('#label1').html('ΕΠΕΛΕΞΕ ΚΑΙ ΓΙΑ ΤΙΣ ΔΥΟ ΛΕΞΕΙΣ');
	}
}


function arraysEqual(_arr1, _arr2) {

    var arr1 = _arr1.concat().sort();
    var arr2 = _arr2.concat().sort();

    for (var i = 0; i < arr1.length; i++) {

        if (arr1[i] !== arr2[i])
            return false;

    }

    return true;

}

function newlvl(){
	clicked = [];
	clearInterval(interval);
	start();
	
}

function mistake(){
	
	clicked = [];
	initial_background();
}


function check(clicked){
	
	
	if(lvl_played == 1){
		if(arraysEqual(clicked, currmotif)){
			if(dif == 1){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ, ΔΟΚΙΜΑΣΙΑ ΣΥΜΠΛΗΡΩΣΕ ΤΗ ΔΕΥΤΕΡΗ');
				lvl_played = 12;
				newlvl();
			}
			else if(dif == 4 || 5){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ ΔΟΚΙΜΑΣΙΑ ΑΝΕΒΑΙΝΕΙΣ ΕΠΙΠΕΔΟ');
				lvl_played = 2;
				newlvl();
				
			}
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
			mistake();
		}
	}
	else if(lvl_played == 12){
		if(arraysEqual(clicked, currmotif)){
		
			clearInterval(interval);
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(10));
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
			mistake();
		}
	}
	else if(lvl_played == 2){
		if(arraysEqual(clicked, currmotif)){
			if(dif == 2){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ, ΔΟΚΙΜΑΣΙΑ ΣΥΜΠΛΗΡΩΣΕ ΤΗ ΔΕΥΤΕΡΗ');
				lvl_played = 22;
				newlvl();
			}
			else if(dif == 4){
				clearInterval(interval);
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(30));
			}
			else if(dif == 5){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ ΔΟΚΙΜΑΣΙΑ ΑΝΕΒΑΙΝΕΙΣ ΕΠΙΠΕΔΟ');
				lvl_played = 3;
				newlvl();
			}
		
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
			mistake();
		}
	}
	else if(lvl_played == 22){
		if(arraysEqual(clicked, currmotif)){
			
			clearInterval(interval);
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(20));
			
			
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
			mistake();
		}
	}
	else if(lvl_played == 3){
		if(arraysEqual(clicked, currmotif)){
			if(dif == 3){
				$('#label1').html('ΜΠΡΑΒΟ!!! ΟΛΟΚΛΗΡΩΣΕΣ ΤΗΝ ΠΡΩΤΗ ΔΟΚΙΜΑΣΙΑ ΣΥΜΠΛΗΡΩΣΕ ΤΗ ΔΕΥΤΕΡΗ');
				lvl_played = 32;
				newlvl();
			}
			else if(dif == 5){
				clearInterval(interval);
				$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(70));
			}
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
			mistake();
		}
	}
	else if(lvl_played == 32){
		if(arraysEqual(clicked, currmotif)){
				
			clearInterval(interval);
			$('#label1').html('ΣΥΓΧΑΡΗΤΗΡΙΑ!!! ΝΙΚΗΣΕΣ ΤΟ ΠΑΙΧΝΙΔΙ ΜΕ SCORE: '+points(40));
			
		}
		else{
			$('#label1').html('ΛΑΘΟΣ! ΞΑΝΑΠΡΟΣΠΑΘΗΣΕ');
			mistake();
		}
	}
	
	
}


function points(p){
	
 	return point = Math.round(p * (1-(counter/time)));
}

</script>

