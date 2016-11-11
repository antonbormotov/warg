<?php
require_once('function.php');
$config = require_once 'config.php';

$pdo = db_connect($config);

$results = get_data($pdo);

// @TODO Add required output.
$output = '';
$raw_time = '';
$raw_cpu = '';
$raw_mem = '';
$raw_hdd = '';

$output .= '<table>';
$output .= '<tr><td colspan=' . count($results) . '>Load by time</td></tr>';

foreach ($results as $result) {
    $raw_time .= '<td>' . $result['time'] . '</td>';
    $raw_cpu .= '<td>' . $result['cpu'] . '</td>';
    $raw_mem .= '<td>' . $result['mem'] . '</td>';
    $raw_hdd .= '<td>' . $result['hdd'] . '</td>';
}

$output .= '<tr>' . $raw_time . '</tr>';
$output .= '<tr>' . $raw_cpu . '</tr>';
$output .= '<tr>' . $raw_mem . '</tr>';
$output .= '<tr>' . $raw_hdd . '</tr>';

$output .='</table>';

echo $output;
