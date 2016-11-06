<?php
require_once('function.php');
$config = require_once 'config.php';

$pdo = db_connect($config);

$info = get_measurements();

save($info['cpu'], $info['memory'], $info['hdd'], $pdo);
