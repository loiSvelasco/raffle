<?php

session_start();

$_SESSION['DB_HOST'] = 'localhost';
$_SESSION['DB_USER'] = 'root';
$_SESSION['DB_PASS'] = '';
$_SESSION['DB_NAME'] = 'raffle';

// ghetto way of doing things when server does not support composer ;-;