<?php
require_once 'functions.php';

$getNumValid = query("SELECT * FROM participants_binnulig WHERE status = 'valid'");
confirm($getNumValid);

echo row_count($getNumValid);

?>