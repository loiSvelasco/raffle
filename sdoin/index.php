<?php
$f = "visit.php";
//generate visit.php file if not found then write 0 to the generated file
if(!file_exists($f)){
	touch($f);
	$handle =  fopen($f, "w" ) ;
	fwrite($handle,0) ;
	fclose ($handle);
}

require_once("../functions.php");
?>

<?php 
	$getNumValid = query("SELECT * FROM participants_sdoin WHERE status = 'valid'");
	confirm($getNumValid);

	$validNos = row_count($getNumValid) - 1;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>ALL - SDOIN Raffle Draw</title>
		<link href="img/favicon.ico" rel="icon" type="image">
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/navbarclock.js"></script>
		<link rel="stylesheet" href="css/style.css">
		<meta charset="UTF-8">
    </head>
	
	<body onload="startTime()">
		
		<nav class="navbar-inverse" role="navigation">
			<a href="../">
				<img src="img/sdoin_logo_100x100.png" class="hederimg">
			</a>

			<div id="clockdate">
				<div class="clockdate-wrapper">
					<div id="clock"></div>
					<div id="date"><?php echo date('l, F j, Y'); ?></div>
				</div>
			</div>
		</nav>

		<div id="content">
		<div class="maincontent container">
		<pre style="font-size: 4rem;">Whole of SDOIN</pre>
			<div id="output" class="page-header">Schools Division of Ilocos Norte Raffle Draw</div>
			<div id="alert"></div>
			<div><p id="instruction">Press <strong>'S'</strong> on your keyboard to Start Raffle</p></div>
			<script>
				var numvar = 0, //variable to prevent a key from pressing multiple times
				datafromform = ''; //make sure you have this variable empty to prevent empty modal showing
				$('body').keydown(function(e){
					//starts generating number if letter 'S' key is pressed
					if(e.keyCode == 83 && numvar == 0){
						if(datafromform != ''){
							$('#myModal').modal('toggle'); //closes modal if datafromform if is not empty
						}
						//random number animator here
						animationTimer = setInterval(function() {
							var randnum = Math.floor(Math.random() * <?php echo $validNos ?>),  //generate random number
								strnum = ""+randnum+""; //convert number to string
							if(strnum.length == 2){//compare if length of generated number is equal to 2
								$('#output').text(''+randnum);
							}else{
								$('#output').text('0'+randnum);//add 0 if generated number is only 1 digit
							}
						}, 100);//milliseconds before generating new number again
						$('#instruction').text("Press 'X' to Stop Raffle");//set new instruction to the user
						
						numvar = numvar + 1;
					}
					
					
					//stops generating number if letter 'X' key is pressed
					if(e.keyCode == 88) {
						numvar = 0;//numvar is put back to zero
						clearInterval(animationTimer);//stops raffle
						//Ajax POST that sends the value of 'res' variable to send.php
						$.ajax({
						   type: "POST",
						   url: 'send.php',
						   data: 'res='+$('#output').text().trim(),
						   success: function(data){
							   //show query result from send.php back to #alert of this page
							   $('#queryresult').html(data);
						   }
						});
						$("#myModal").modal({backdrop: "static"});//show modalwith winner's name
						$('#instruction').text("Press 'S' to Start Raffle");//set new instruction to the user
						datafromform = 'good';//datafromform has now a value
						// RestartConfetti();
						// InitializeConfetti();
						// StartConfetti();
					}
				});

				// START CONFETTI
				(function () {
				// globals
				var canvas;
				var ctx;
				var W;
				var H;
				var mp = 150; //max particles
				var particles = [];
				var angle = 0;
				var tiltAngle = 0;
				var confettiActive = true;
				var animationComplete = true;
				var deactivationTimerHandler;
				var reactivationTimerHandler;
				var animationHandler;

				// objects

				var particleColors = {
					colorOptions: ["DodgerBlue", "OliveDrab", "Gold", "pink", "SlateBlue", "lightblue", "Violet", "PaleGreen", "SteelBlue", "SandyBrown", "Chocolate", "Crimson"],
					colorIndex: 0,
					colorIncrementer: 0,
					colorThreshold: 10,
					getColor: function () {
						if (this.colorIncrementer >= 10) {
							this.colorIncrementer = 0;
							this.colorIndex++;
							if (this.colorIndex >= this.colorOptions.length) {
								this.colorIndex = 0;
							}
						}
						this.colorIncrementer++;
						return this.colorOptions[this.colorIndex];
					}
				}

				function confettiParticle(color) {
					this.x = Math.random() * W; // x-coordinate
					this.y = (Math.random() * H) - H; //y-coordinate
					this.r = RandomFromTo(10, 30); //radius;
					this.d = (Math.random() * mp) + 10; //density;
					this.color = color;
					this.tilt = Math.floor(Math.random() * 10) - 10;
					this.tiltAngleIncremental = (Math.random() * 0.07) + .05;
					this.tiltAngle = 0;

					this.draw = function () {
						ctx.beginPath();
						ctx.lineWidth = this.r / 2;
						ctx.strokeStyle = this.color;
						ctx.moveTo(this.x + this.tilt + (this.r / 4), this.y);
						ctx.lineTo(this.x + this.tilt, this.y + this.tilt + (this.r / 4));
						return ctx.stroke();
					}
				}

				$(document).ready(function () {
					SetGlobals();
					InitializeButton();
					InitializeConfetti();

					$(window).resize(function () {
						W = window.innerWidth;
						H = window.innerHeight;
						canvas.width = W;
						canvas.height = H;
					});

				});

				function InitializeButton() {
					$('#stopButton').click(DeactivateConfetti);
					$('#startButton').click(RestartConfetti);
				}

				function SetGlobals() {
					canvas = document.getElementById("canvas");
					ctx = canvas.getContext("2d");
					W = window.innerWidth;
					H = window.innerHeight;
					canvas.width = W;
					canvas.height = H;
				}

				function InitializeConfetti() {
					particles = [];
					animationComplete = false;
					for (var i = 0; i < mp; i++) {
						var particleColor = particleColors.getColor();
						particles.push(new confettiParticle(particleColor));
					}
					StartConfetti();
				}

				function Draw() {
					ctx.clearRect(0, 0, W, H);
					var results = [];
					for (var i = 0; i < mp; i++) {
						(function (j) {
							results.push(particles[j].draw());
						})(i);
					}
					Update();

					return results;
				}

				function RandomFromTo(from, to) {
					return Math.floor(Math.random() * (to - from + 1) + from);
				}


				function Update() {
					var remainingFlakes = 0;
					var particle;
					angle += 0.01;
					tiltAngle += 0.1;

					for (var i = 0; i < mp; i++) {
						particle = particles[i];
						if (animationComplete) return;

						if (!confettiActive && particle.y < -15) {
							particle.y = H + 100;
							continue;
						}

						stepParticle(particle, i);

						if (particle.y <= H) {
							remainingFlakes++;
						}
						CheckForReposition(particle, i);
					}

					if (remainingFlakes === 0) {
						StopConfetti();
					}
				}

				function CheckForReposition(particle, index) {
					if ((particle.x > W + 20 || particle.x < -20 || particle.y > H) && confettiActive) {
						if (index % 5 > 0 || index % 2 == 0) //66.67% of the flakes
						{
							repositionParticle(particle, Math.random() * W, -10, Math.floor(Math.random() * 10) - 10);
						} else {
							if (Math.sin(angle) > 0) {
								//Enter from the left
								repositionParticle(particle, -5, Math.random() * H, Math.floor(Math.random() * 10) - 10);
							} else {
								//Enter from the right
								repositionParticle(particle, W + 5, Math.random() * H, Math.floor(Math.random() * 10) - 10);
							}
						}
					}
				}
				function stepParticle(particle, particleIndex) {
					particle.tiltAngle += particle.tiltAngleIncremental;
					particle.y += (Math.cos(angle + particle.d) + 3 + particle.r / 2) / 2;
					particle.x += Math.sin(angle);
					particle.tilt = (Math.sin(particle.tiltAngle - (particleIndex / 3))) * 15;
				}

				function repositionParticle(particle, xCoordinate, yCoordinate, tilt) {
					particle.x = xCoordinate;
					particle.y = yCoordinate;
					particle.tilt = tilt;
				}

				function StartConfetti() {
					W = window.innerWidth;
					H = window.innerHeight;
					canvas.width = W;
					canvas.height = H;
					(function animloop() {
						if (animationComplete) return null;
						animationHandler = requestAnimFrame(animloop);
						return Draw();
					})();
				}

				function ClearTimers() {
					clearTimeout(reactivationTimerHandler);
					clearTimeout(animationHandler);
				}

				function DeactivateConfetti() {
					confettiActive = false;
					ClearTimers();
				}

				function StopConfetti() {
					animationComplete = true;
					if (ctx == undefined) return;
					ctx.clearRect(0, 0, W, H);
				}

				function RestartConfetti() {
					ClearTimers();
					StopConfetti();
					reactivationTimerHandler = setTimeout(function () {
						confettiActive = true;
						animationComplete = false;
						InitializeConfetti();
					}, 100);

				}

				window.requestAnimFrame = (function () {
					return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function (callback) {
						return window.setTimeout(callback, 1000 / 60);
					};
				})();
			})();
				// END CONFETTI
			</script>
		</div>
		<div class="maincontent container">
			<div class="modal fade" id="myModal" style="overflow: hidden;" role="dialog">
			<canvas id="canvas"></canvas>
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							<p><br><strong id="queryresult"></strong></p>
							<p class="modal-body">Press 'S' on your keyboard to start a new Raffle</p>
						</div>
					</div>
				</div>
			</div>
			<div class="footer navbar-fixed-bottom" style="margin-bottom: 2em;">
			<pre style="font-size: 1.5rem;">This system is developed & designed by: <a href="https://www.facebook.com/louis.superficial.velasco.1" target="_blank">Louis Velasco</a></pre>
				</div>
		</div>
		</div> <!-- /#content -->
		
	</body>
</html>