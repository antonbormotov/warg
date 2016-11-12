<?php
require_once('function.php');

$info = get_measurements();

save_data($info['cpu'], $info['memory'], $info['hdd']);
