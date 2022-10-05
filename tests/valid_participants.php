<?php
require_once '../functions.php';
require_once 'dataset.config.php';

$getNumValid = query("SELECT * FROM participants_tests WHERE status = 'valid'");
confirm($getNumValid);

echo row_count($getNumValid);

?>