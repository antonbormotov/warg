<?php
require_once('function.php');
$config = require_once 'config.php';

$pdo = db_connect($config);

$results = get_data($pdo);
// @TODO Add required output.
echo '<table>';
echo '<tr>';
echo '<td>Time</td>';
echo '<td>Cpu, %</td>';
echo '<td>Used memory, %</td>';
echo '<td>Hdd, %</td>';
echo '</tr>';

foreach ($results as $result) {
    echo '<tr>';
    echo '<td>';
    echo $result['time'] . '|';
    echo '</td>';
    echo '<td>';
    echo $result['cpu'] . '|';
    echo '</td>';
    echo '<td>';
    echo $result['memory'] . '|';
    echo '</td>';
    echo '<td>';
    echo $result['hdd'] . '|';
    echo '</td>';
    echo '</tr>';
}

echo '<table>';