<?php
    defined("DB_HOST") ? null : define("DB_HOST", "localhost");
    defined("DB_USER") ? null : define("DB_USER", "u652515858_raffle_loisv");
    defined("DB_PASS") ? null : define("DB_PASS", "f&fgJzs!3fKJ216#");
    defined("DB_NAME") ? null : define("DB_NAME", "u652515858_raffle");

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>