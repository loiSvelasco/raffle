<?php
$f = "visit.php";
//generate visit.php file if not found then write 0 to the generated file
if(!file_exists($f)){
	touch($f);
	$handle =  fopen($f, "w" ) ;
	fwrite($handle,0) ;
	fclose ($handle);
}

require_once("db.php");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Functions

function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result)
{
    global $connection;

    if(!$result)
    {
        die("Query Failed: " . mysqli_error($connection));
    }
}

function escape_string($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

function fetch_assoc($result)
{
    return mysqli_fetch_assoc($result);
}

function row_count($query)
{
    return mysqli_num_rows($query);
}


function get_winners()
{
	$get_winners = query("SELECT * FROM winners ORDER BY win_id DESC");
	confirm($get_winners);

	while($row = fetch_array($get_winners))
	{
		$winnerID = $row['win_id'];
		$name = $row['win_name'];
		$level = $row['win_level'];
		$raffleID = $row['win_raffle_id'];
		$school = $row['win_school'];
		$position = $row['win_position'];
		
		$winners = <<<LOIPOGI
			<tr>
				<td>{$winnerID}</td>
				<td>{$name}</td>
				<td>{$raffleID}</td>
				<td>{$level}</td>
				<td>{$school}</td>
				<td>{$position}</td>
				<td>
					<a href="delete.php?del_winner_id={$winnerID}" class="btn btn-danger" href="#" role="button">Delete</a>
				</td>
			</tr>
LOIPOGI;
	echo $winners;
	
	}
}

?>
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
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
  		<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>

		<!-- <link rel="stylesheet" href="css/style.css"> -->
    </head>
	
	<body onload="startTime()">
		
		<nav class="navbar-inverse" role="navigation">
			<a href="#">
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
				<div id="output" style="font-size: 5rem;">SDOIN Raffle Draw</div>
				<div class="alert alert-warning alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<strong>Notice:</strong> The list of participants are generated from sdoindivisionbeis.net as of Dec. 13, 2021 @ 10:00AM</div>
				<hr>
				<div><p id="instruction">
					<h3>Select which dataset to use for the raffle draw:</h3>
					<div class="btn-group btn-group-lg" role="group" aria-label="...">
						<a href="elem/" target="_blank" type="button" class="btn btn-default">Elementary</a>
						<a href="sec/" target="_blank" type="button" class="btn btn-default">Secondary</a>
						<a href="elemsec/" target="_blank" type="button" class="btn btn-default">Elementary and Secondary</a>
						<a href="sdoin/" target="_blank" type="button" class="btn btn-default">Whole of SDOIN</a>
						<a href="do/" target="_blank" type="button" class="btn btn-default">Division Office Only</a>
					</div>
					<h3>Winners can be viewed <a href="winners/">here.</a></h3>
				</div>
				<div class="footer navbar-fixed-bottom" style="margin-bottom: 2em;">
				<pre style="font-size: 1.5rem;">This system is developed & designed by: <a href="https://www.facebook.com/louis.superficial.velasco.1" target="_blank">Louis Velasco</a></pre>
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