<?php

    $online = true;

    if($online) 
    {
        define('DB_HOST', 'localhost');
        define('DB_USER', 'u652515858_raffle_loisv');
        define('DB_PASS', 'f&fgJzs!3fKJ216#');
        define('DB_NAME', 'u652515858_raffle');
    }
    else 
    {
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'raffle');
    }

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>