<!DOCTYPE html>
<html>
<head>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>


<link href="prettify/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="prettify/prettify.js"></script>


<style type="text/css" media="screen">
	
#wrapperCanvas{
	width:1100px;
	height: auto !important;
	margin: 10px auto 20px auto;
	border-radius:10px;
	position:relative;
	background-color:transparent;
}

canvas{
	border:3px solid #29592E;
	box-shadow:0px 0px 10px 0px #333;
	background-color:#fff;
	margin:15px 0px 5px 50px;
	background-image:url(grass.jpg); 
	background-repeat:no-repeat;
}

.title{
	width:400px;
	margin:auto;
	padding-top:20px;
	text-align:center;
}

.copyright{
	text-align:center; 
	height:25px; 
	padding:10px 0px 10px 0px; 
	width:1100px;
	position:relative; 
	margin:auto;
	border-bottom-right-radius:10px;
	border-bottom-left-radius:10px;
}

#wrapperCanvas h4{
	font-family: sheepsans;
	margin:20px auto 10px auto;
	text-align:center;
}

#description{
	width:800px;
	height:auto;
	min-height:400px;
	background-color:#fff;
	border:1px solid #ddd;
	box-shadow:inset 0 0 3px 3px #000;
	font-family: sheepsans;
	margin:10px auto 0px auto;;
}


	
</style>


</head>

  



<script type="text/javascript">

var ctx;

//ball array
var balls = new Array();



//store pi variable
var PI = Math.PI * 2



//get document element
function $(id) {
	return document.getElementById(id);
}


//create ball values and detect canvas edges
function Ball(x, y, rx, ry) {

	this.x = x;
	this.y = y;
	this.rx = rx;
	this.ry = ry;
	this.deleted = false;

	this.move = function() {

		if(this.x > 995) {
			this.x = 995;
			this.rx = -this.rx;
		} else if(this.x < 5) {
			this.x = 5;
			this.rx = -this.rx;
		}

		if(this.y > 595) {
			this.y = 595;
			this.ry = -this.ry;
		} else if(this.y < 5) {
			this.y = 5;
			this.ry = -this.ry;
		}

		this.x+= this.rx;
		this.y+= this.ry;
		
		if (this.deleted == true){
			
		}
		else {
			ctx.beginPath();
			ctx.arc(this.x, this.y, 10, 0, PI, true);
			ctx.closePath();
			ctx.fill();
		}
	}
}

//create balls with loop 
function createBall() {

	for(var i=0; i<100; i++){
		x = Math.random() * 1000;
		y = Math.random() * 400;
		
		balls.push(new Ball(x, y, Math.random() * 10 - 3, Math.random() * 10 - 3));	
	}
	
	
}

//initialize functions
function init() {
	ctx = $('canvas').getContext('2d');
	window.setInterval(animate, 20);
	
}

//animate the stage with redrawing elements
function animate() {
	ctx.clearRect(0, 0, 1000, 400);
	fox();
}

//set variables for elements
var foxX = 500;
var foxY = 300;
var dx = 50;
var dy = 50;
var WIDTH = 1000;
var HEIGHT = 400;


//load fox image
function fox(){
	var img = new Image();
	img.onload = function(){
		ctx.drawImage(img, foxX, foxY);

//set the balls to move.
	for(var i = 0; i < 100; i++) {
		balls[i].move();
		
		//if balls hit don't hit the image....	
		if (Math.round(balls[i].x) >  foxX){
			ctx.fillStyle = 'orange';
			
		
		}
		else if(Math.round(balls[i].x) < foxX){
			ctx.fillStyle = 'orange';
				
		}
		//if they do hit.
		else if (Math.round(balls[i].x) == foxX){
			ctx.fillStyle = 'black';
			balls[i].deleted = true;
			
		}
		
	  }
	}
	img.src = 'foxGame/fox.png';
}


//set key events
function doKeyDown(evt){
switch (evt.keyCode) {
case 87:  /* Up arrow was pressed */
if (foxY - dy > -20){
foxY -= dy;
}

break;
case 83:  /* Down arrow was pressed */
if (foxY + dy < 350 ){
foxY += dy;
}

break;
case 65:  /* Left arrow was pressed */
if (foxX - dx > -20){
foxX -= dx;
}
break;
case 68:  /* Right arrow was pressed */
if ((foxX + dx < 900)){
foxX += dx;
}
break;
}
}

createBall();
window.addEventListener('keydown',doKeyDown,true);
</script>







<body onLoad="init(); prettyPrint();">
<div id="wrapperCanvas">
	<div class="title"><h2>Experimentation With Canvas<h2></div>
	<div class="title"><h3>Use the W, A, S & D keys to move.</h3></div>
	<canvas id="canvas" width="1000" height="400"></canvas>





	
<details>

<summary>Click here to see how it is done!</summary>

<h4>I created this 2d animation in HTML5 Canvas.  The code is below to show what is going on.</h4>


	<div id="description">

		
<pre class="prettyprint">
var ctx;

//ball array
var balls = new Array();

//store pi variable
var PI = Math.PI * 2

//get document element
function $(id) {
	return document.getElementById(id);
}

//create ball values and detect canvas edges
function Ball(x, y, rx, ry) {

	this.x = x;
	this.y = y;
	this.rx = rx;
	this.ry = ry;
	this.deleted = false;

	this.move = function() {

		if(this.x > 995) {
			this.x = 995;
			this.rx = -this.rx;
		} else if(this.x < 5) {
			this.x = 5;
			this.rx = -this.rx;
		}

		if(this.y > 595) {
			this.y = 595;
			this.ry = -this.ry;
		} else if(this.y < 5) {
			this.y = 5;
			this.ry = -this.ry;
		}

		this.x+= this.rx;
		this.y+= this.ry;
		
		if (this.deleted == true){
			
		}
		else {
			ctx.beginPath();
			ctx.arc(this.x, this.y, 10, 0, PI, true);
			ctx.closePath();
			ctx.fill();
		}
	}
}

//create balls with loop 
function createBall() {

	for(var i=0; i<100; i++){
		x = Math.random() * 1000;
		y = Math.random() * 400;
		
		balls.push(new Ball(x, y, Math.random() * 10 - 3, Math.random() * 10 - 3));	
	}
	
	
}

//initialize functions
function init() {
	ctx = $('canvas').getContext('2d');
	window.setInterval(animate, 20);
	
}

//animate the stage with redrawing elements
function animate() {
	ctx.clearRect(0, 0, 1000, 400);
	fox();
}

//set variables for elements
var foxX = 500;
var foxY = 300;
var dx = 50;
var dy = 50;
var WIDTH = 1000;
var HEIGHT = 400;


//load fox image
function fox(){
	var img = new Image();
	img.onload = function(){
		ctx.drawImage(img, foxX, foxY);

//set the balls to move.
	for(var i = 0; i < 100; i++) {
		balls[i].move();
		
		//if balls hit don't hit the image....	
		if (Math.round(balls[i].x) >  foxX){
			ctx.fillStyle = 'orange';
			
		
		}
		else if(Math.round(balls[i].x) < foxX){
			ctx.fillStyle = 'orange';
				
		}
		//if they do hit.
		else if (Math.round(balls[i].x) == foxX){
			ctx.fillStyle = 'black';
			balls[i].deleted = true;
			
		}
		
	  }
	}
	img.src = 'foxGame/fox.png';
}


//set key events
function doKeyDown(evt){
switch (evt.keyCode) {
case 87:  /* Up arrow was pressed */
if (foxY - dy > -20){
foxY -= dy;
}

break;
case 83:  /* Down arrow was pressed */
if (foxY + dy < 350 ){
foxY += dy;
}

break;
case 65:  /* Left arrow was pressed */
if (foxX - dx > -20){
foxX -= dx;
}
break;
case 68:  /* Right arrow was pressed */
if ((foxX + dx < 900)){
foxX += dx;
}
break;
}
}

createBall();
window.addEventListener('keydown',doKeyDown,true);
			
</pre>




	</div>


</div>
</details>	







</body>

</html> 






