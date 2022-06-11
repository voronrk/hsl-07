<?php

require_once('TimeCounter.php');

function debug($data)
{
    echo "<pre>";
    echo (print_r($data, true) . PHP_EOL);
    echo "</pre>";

}

$time = new TimeCounter;

$time->start();
sleep(1);
$time->finish();
debug($time->getDuration());
debug($time);

