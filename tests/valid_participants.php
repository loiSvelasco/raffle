<?php
require_once '../functions.php';
require_once 'dataset.config.php';

$getNumValid = query("SELECT * FROM " . DATASET . " WHERE status = 'valid'");
confirm($getNumValid);

echo row_count($getNumValid);

?>