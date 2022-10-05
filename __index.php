<?php

if(isset($_GET['home'])) { include 'home.php'; }

$testing = true;

if($testing)
{
    if(isset($_GET['tests'])) { 
        include 'tests/index.php'; 
    }
}