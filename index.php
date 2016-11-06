<?php
require_once('function.php');
$config = require_once 'config.php';

$pdo = db_connect($config);

print_r(get_data($pdo));