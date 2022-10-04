<?php

require_once '../functions.php';
require_once 'dataset.config.php';

$getNumValid = query("SELECT * FROM " . DATASET . " WHERE status = 'valid'");
confirm($getNumValid);

// if(row_count($getNumValid) == 0)
// {
// 	echo "<script>alert('No active participants left')</script>";
// 	header("Refresh:0; url=../");
// }

include '../resources/includes/header.php';
?>
		<div id="content">
		<div class="maincontent container">
			<pre style="font-size: 4rem;"><?= RAFFLE_LEVEL ?></pre>
			<div id="output" class="page-header"><?= RAFFLE_TITLE ?></div>
			<h2 id="output"></h2>
			<div id="alert"></div>
			<div><p id="instruction">Press <strong>'S'</strong> on your keyboard to Start Raffle</p></div>
			<script>
				var numvar = 0, //variable to prevent a key from pressing multiple times
				datafromform = ''; //make sure you have this variable empty to prevent empty modal showing
				var validnum;
				function getValidParticipants() {
					// debugger;
					var validnum; // get no. of valid participants
					$.ajax({
							type: 'GET',
							url: 'valid_participants.php',
							async: false,
							success: function(data) {
								validnum = data;
								// alert(data);
							},
						});
					return validnum;
				}
				validnum = getValidParticipants();
				// console.log(validnum);

				if(validnum == 0) {
					alert('No Active Participants Left.');
					window.location.href = "../";
				}

				$('body').keydown(function(e){

					//starts generating number if letter 'S' key is pressed
					if(e.keyCode == 83 && numvar == 0){
						if(datafromform != ''){
							$('#myModal').modal('toggle'); //closes modal if datafromform if is not empty
						}
						
						// $.ajax({
						// 	type: 'GET',
						// 	url: 'valid_participants.php',
						// 	success: function(data) {
						// 		validnum = data;
						// 	},
						// });

						// console.log(validnum);
						validnum = getValidParticipants();
						//random number animator here
						animationTimer = setInterval(function() {
							// generate no. of valid participants from previous ajax request
							var randnum = Math.floor(Math.random() * validnum), 
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

<?php include('../resources/includes/footer.php'); ?>