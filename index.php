<?php
require_once('function.php');
$config = require_once 'config.php';

$pdo = db_connect($config);

$results = get_data($pdo);

echo '<table>';

foreach ($results as $result) {
    echo '<tr>';
    echo '<td>';
    echo $result['time'];
    echo '</td>';
    echo '<td>';
    echo $result['cpu'];
    echo '</td>';
    echo '<td>';
    echo $result['memory'];
    echo '</td>';
    echo '<td>';
    echo $result['hdd'];
    echo '</td>';
    echo '</tr>';
}

echo '<table>';