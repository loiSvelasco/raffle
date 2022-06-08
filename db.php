<?php

    require 'config.php';

    defined("DB_HOST") ? null : define("DB_HOST", $_ENV['DB_HOST']);
    defined("DB_USER") ? null : define("DB_USER", $_ENV['DB_USER']);
    defined("DB_PASS") ? null : define("DB_PASS", $_ENV['DB_PASS']);
    defined("DB_NAME") ? null : define("DB_NAME", $_ENV['DB_NAME']);

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>