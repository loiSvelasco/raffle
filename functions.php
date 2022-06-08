<?php

require_once 'db.php';

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
		// $raffleID = $row['win_raffle_id'];
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