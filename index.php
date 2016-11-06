<?php
require_once('function.php');
$config = require_once 'config.php';

$pdo = db_connect($config);
render_data();