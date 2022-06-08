<?php require_once '../functions.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>SDOIN Raffle Draw</title>
		<link href="img/favicon.ico" rel="icon" type="image">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/navbarclock.js"></script>

		<link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
 
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/datatables.min.js"></script>

		<!-- <link rel="stylesheet" href="css/style.css"> -->
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
			<div id="output" style="font-size: 5rem;">Schools Division of Ilocos Norte Raffle Draw Winners</div>
			<hr>
			<a href="../" class="btn btn-default">Back</a>
			<div><p id="instruction">
			
			<table id="winnersTable" class="display table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Winner Name</th>
						<th>Dataset</th>
						<th>School</th>
						<th>Position</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php get_winners(); ?>
				</tbody>
			</table>

			</div>
			
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br><br>
			<div class="footer navbar-fixed-bottom" style="margin-bottom: 2em;">
				<h4><small>Developed & Designed by: <a href="https://www.facebook.com/louis.superficial.velasco.1" target="_blank">Louis Velasco</a></small></h4>
				</div>
		</div>

		</div> <!-- /#content -->
		
					
		
	</body>
	
	<script>
	$(document).ready(function() {
		$('#winnersTable').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel'
			]
		} );
	} );
	</script>
</html>