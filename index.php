<?php

require_once('TimeCounter.php');
require_once('ArraySort.php');

use TimeCounter\TimeCounter;
use ArraySort\ArraySort;

function debug($data)
{
    echo "<pre>";
    echo (print_r($data, true) . PHP_EOL);
    echo "</pre>";
}

/**
 * Generate array of pseudo-random integer digits
 *
 * Size of Array
 * @param integer $size
 * @return array
 */
function generateDigitalArray(int $size): array
{   
    $resultArray = [];
    for($i=0; $i<$size; $i++)
    {
        $resultArray[$i] = rand(-1000, 1000);
    };
    return $resultArray;
}

$array = generateDigitalArray(10);
debug($array);
debug(ArraySort::bubbleSort($array));

