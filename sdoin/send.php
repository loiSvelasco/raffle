<?php

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

// End of functions

$queryarray = query("SELECT * FROM participants_sdoin WHERE status = 'valid'");
confirm($queryarray);

$namearray = array();

while($row = fetch_array($queryarray))
{
	$namearray[] = array($row['name'], $row['district'], $row['school'], $row['position'], $row['id']);
}

$id = (int)$_POST['res'];

$outputText = <<<LOIPOGI
	<p style="font-family: Trebuchet MS;">Congratulations!</p>
	<p style="text-transform: uppercase; font-family: Trebuchet MS;">&nbsp;{$namearray[$id][0]}&nbsp;</p>
	<p style="font-size: 32px; font-family: Trebuchet MS;">{$namearray[$id][3]}</p>
	<p style="font-size: 32px; font-family: Trebuchet MS;">{$namearray[$id][1]}, {$namearray[$id][2]}</p>
LOIPOGI;

$winner = $namearray[$id][4];

echo $outputText;

$update_status = query("UPDATE participants_sdoin SET status = 'invalid' WHERE id = '{$winner}'");
confirm($update_status);

$update_elemsec = query("UPDATE participants_elemsec SET status = 'invalid' WHERE name REGEXP '[[:<:]]{$namearray[$id][0]}[[:>:]]' AND position REGEXP '[[:<:]]{$namearray[$id][3]}[[:>:]]' ");
confirm($update_elemsec);

$update_elem = query("UPDATE participants_elem SET status = 'invalid' WHERE name REGEXP '[[:<:]]{$namearray[$id][0]}[[:>:]]' AND position REGEXP '[[:<:]]{$namearray[$id][3]}[[:>:]]' ");
confirm($update_elem);

$update_sec = query("UPDATE participants_sec SET status = 'invalid' WHERE name REGEXP '[[:<:]]{$namearray[$id][0]}[[:>:]]' AND position REGEXP '[[:<:]]{$namearray[$id][3]}[[:>:]]' ");
confirm($update_sec);

$update_do = query("UPDATE participants_do SET status = 'invalid' WHERE name REGEXP '[[:<:]]{$namearray[$id][0]}[[:>:]]' AND position REGEXP '[[:<:]]{$namearray[$id][3]}[[:>:]]' ");
confirm($update_do);

$insert_winner = query("INSERT INTO winners(win_name, win_level, win_school, win_position) VALUES('{$namearray[$id][0]}','SDOIN','{$namearray[$id][2]}','{$namearray[$id][3]}')");
confirm($insert_winner);

// Debug Code Below
// echo '<pre>'; print_r($namearray); echo '</pre>';

?>

