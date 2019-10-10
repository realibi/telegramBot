<?php

use Core\Helpers;

sleep($argv[1]);

$limit = 15 + $argv[1];
set_time_limit($limit);

include "vendor/autoload.php";

$time = [];

do{

    $start = microtime(true);
    new App();
    $time[] = microtime(true) - $start;

}while(array_sum($time) / 1000 <= $limit - max($time)/1000);