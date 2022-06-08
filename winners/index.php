<?php
$f = "visit.php";
//generate visit.php file if not found then write 0 to the generated file
if(!file_exists($f)){
	touch($f);
	$handle =  fopen($f, "w" ) ;
	fwrite($handle,0) ;
	fclose ($handle);
}

require_once("../db.php");

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
		$school = $row['win_school'];
		$position = $row['win_position'];
		
		$winners = <<<LOIPOGI
			<tr>
				<td>{$winnerID}</td>
				<td>{$name}</td>
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
			<a href="../" class="btn btn-light mb-2"><i class="fa fa-arrow-left"></i>Back</a>
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
			
			<!-- <br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br><br> -->
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