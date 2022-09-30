<!DOCTYPE html>
<html>
    <head>
        <title>SDOIN Raffle Draw</title>
		<link href="../resources/img/favicon.ico" rel="icon" type="image">
		<link href="../resources/css/bootstrap.min.css" rel="stylesheet">
		<script src="../resources/js/jquery.min.js"></script>
		<script src="../resources/js/jquery-3.5.1.min.js"></script>
		<script src="../resources/js/bootstrap.min.js"></script>
		<script src="../resources/js/navbarclock.js"></script>
		<link rel="stylesheet" href="../resources/css/style.css">
		<meta charset="UTF-8">
    </head>
	
	<body onload="startTime()">
		
		<nav class="navbar-inverse" role="navigation">
			<a href="../">
				<img src="../resources/img/sdoin_logo_100x100.png" class="hederimg">
			</a>

			<div id="clockdate">
				<div class="clockdate-wrapper">
					<div id="clock"></div>
					<div id="date"><?php echo date('l, F j, Y'); ?></div>
				</div>
			</div>
		</nav>