<?php

    $online = false;

    if($online) 
    {
        define('DB_HOST', 'localhost');
        define('DB_USER', 'u652515858_raffle_loisv');
        define('DB_PASS', '##SDO1Nraffle##');
        define('DB_NAME', 'u652515858_raffle');
    }
    else 
    {
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'raffle');
    }

    // $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    include 'kint.phar';
    Kint::$aliases[] = 'dd';
    function dd(...$vars) { return die(Kint::dump(...$vars)); }
?>