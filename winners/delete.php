<?php

require_once '../db.php';
require_once '../functions.php';

if(isset($_GET['del_winner_id']))
{
	$delete_id = $_GET['del_winner_id'];
	
	$get_level = query("SELECT * FROM winners WHERE win_id = '{$delete_id}'");
	confirm($get_level);
	
	while($winnerRow = fetch_array($get_level))
	{
		$level =    'participants_' . strtolower($winnerRow['win_level']);
		$staff = $winnerRow['win_staff_id'];
		$raffleID = $winnerRow['win_id'];
		
		$update = query("UPDATE {$level} SET status = 'valid' WHERE staff_id = '{$staff}'");
		confirm($update);

		$updategd = query("UPDATE participants_granddraw SET status = 'valid' WHERE staff_id = '{$staff}'");
		confirm($updategd);

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