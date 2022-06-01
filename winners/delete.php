<?php

require_once("../db.php");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

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


if(isset($_GET['del_winner_id']))
{
	$delete_id = $_GET['del_winner_id'];
	
	$get_level = query("SELECT * FROM winners WHERE win_id = '{$delete_id}'");
	confirm($get_level);
	
	while($winnerRow = fetch_array($get_level))
	{
		if($winnerRow['win_level'] == "Elementary")
		{
			$level = "participants_elem";
		}
		else
		{
			$level = "participants_sec";
		}

		$raffleID = $winnerRow['win_raffle_id'];
		
		$update = query("UPDATE {$level} SET status = 'valid' WHERE id = '{$raffleID}'");
		confirm($update);
		$del = query("DELETE FROM winners WHERE win_id = '{$delete_id}'");
		confirm($del);
		
		header('Location: ../winners');
	}

	
}
else
{
	echo "something went wrong";
}


?>