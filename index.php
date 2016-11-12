<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once('function.php');

$results = get_data();

use Philo\Blade\Blade;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

$blade = new Blade($views, $cache);
echo $blade->view()->make('main',['results' => $results])->render();
