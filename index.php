<!DOCTYPE html>
<html>
    <head>
        <title>SDOIN Raffle Draw</title>
		<link href="resources/img/favicon.ico" rel="icon" type="image">
		<link rel="stylesheet" href="resources/css/bootstrap.min.css">
		<link rel="stylesheet" href="resources/css/style.css">
		<script src="resources/js/jquery.min.js"></script>
		<script src="resources/js/jquery-3.5.1.min.js"></script>
		<script src="resources/js/bootstrap.min.js"></script>
		<script src="resources/js/navbarclock.js"></script>
		<link rel="stylesheet" type="text/css" href="resources/css/jquery.dataTables.css">
  		<script type="text/javascript" charset="utf8" src="resources/js/jquery.dataTables.js"></script>

		<!-- <link rel="stylesheet" href="css/style.css"> -->
    </head>
	
	<body onload="startTime()">
		
		<nav class="navbar-inverse" role="navigation">
			<a href="#">
				<img src="resources/img/sdoin_logo_100x100.png" class="hederimg">
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
				<div id="output" style="font-size: 5rem;">SDOIN Raffle Draw</div>
				<!-- <div class="alert alert-warning alert-dismissible" role="alert">
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  					<strong>Notice:</strong> The list of participants are generated from sdoindivisionbeis.net as of Dec. 13, 2021 @ 10:00AM
				</div> -->
				<hr>
				<div><p id="instruction">
					<h3>Select which dataset to use for the raffle draw:</h3>
					<div class="btn-group btn-group-lg" role="group" aria-label="...">
						<a href="elem/" target="_blank" type="button" class="btn btn-default">Elementary</a>
						<a href="sec/" target="_blank" type="button" class="btn btn-default">Secondary</a>
						<a href="tests/" target="_blank" type="button" class="btn btn-default">Tests</a>
					</div>
					<h3>Winners can be viewed <a href="winners/">here.</a></h3>
				</div>
				<div class="footer navbar-fixed-bottom" style="margin-bottom: 2em;">
				<pre style="font-size: 1.5rem;">This system is developed & designed by: © <a href="https://www.facebook.com/louis.superficial.velasco.1" target="_blank">Louis Velasco</a> | <a href="https://github.com/loiSvelasco/raffle/blob/master/LICENSE" target="_blank">License</a></pre>
				</div>
			</div>
		</div> <!-- /#content -->	
		
	</body>
	
	<script>
	$(document).ready( function () {
    $('#winnersTable').DataTable();
} );
	</script>
</html>