<?php

require_once '../db.php';
require_once '../functions.php';
require_once 'dataset.config.php';

$queryarray = query("SELECT * FROM " . DATASET . " WHERE status = 'valid'");
confirm($queryarray);

$namearray = [];

while($row = fetch_array($queryarray))
{
	$namearray[] = [
        $row['name'],       // 0
        $row['district'],   // 1
        $row['school'],     // 2
        $row['position'],   // 3
        $row['id']          // 4
    ];
}

$id = (int)$_POST['res'];

// echo '<pre>'; print_r($namearray[$id][0]); echo '</pre>';
// echo '<pre>'; print_r($namearray[$id][2]); echo '</pre>';

if(count($namearray) == 0)
{
    $outputText = '<div class="alert alert-danger" role="alert">No active participants left</div>';
}
else
{
    $outputText = <<<LOIPOGI
        <p style="font-family: Trebuchet MS;">Congratulations!</p>
        <p style="text-transform: uppercase; font-family: Trebuchet MS;">&nbsp;{$namearray[$id][0]}&nbsp;</p>
        <p style="font-size: 32px; font-family: Trebuchet MS;">{$namearray[$id][3]}</p>
    	<p style="font-size: 32px; font-family: Trebuchet MS;">{$namearray[$id][1]}, {$namearray[$id][2]}</p>
LOIPOGI;
    
    $winner = $namearray[$id][4];

    
    $update_status = query("UPDATE " . DATASET . " SET status = 'invalid' WHERE id = '{$winner}'");
    confirm($update_status);

    $insert_winner = query(
        "INSERT INTO 
         winners(win_staff_id, win_name, win_level, win_school, win_position) 
         VALUES('{$winner}', '{$namearray[$id][0]}','" . DATASET_NAME . "','{$namearray[$id][2]}','{$namearray[$id][3]}')
        ");
    confirm($insert_winner);

}

echo $outputText;


// Debug Code Below
// echo '<pre>'; print_r($namearray); echo '</pre>';

?>

