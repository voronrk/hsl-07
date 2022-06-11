<?php

namespace ArraySort;

use TimeCounter\TimeCounter;

class ArraySort
{
    private float $startTime;
    private float $finishTime;
    public float $diration;

    /**
     * This function change value of two integer variables.
     * !WARNING! Don't use this for float variables because you can get a rounding error!
     *
     * @param int $a
     * @param int $b
     * @return void
     */
    private static function changeIntElements(int &$a, int &$b)
    {
        $a = $a + $b;
        $b = $a - $b;
        $a = $a - $b;
    }

    /**
     * Bubble sorter. Return array with sorted array and duration of sorting.
     *
     * @param array $array
     * @return array
     */
    public static function bubbleSort(array $array): array
    {
        $time = new TimeCounter();
        $time->start();
        
        for($finishElementIndex = count($array); $finishElementIndex > 0; $finishElementIndex--)
        {
            for($i=0; $i < $finishElementIndex-1; $i++) 
            {
                if ($array[$i] > $array[$i+1]) {
                    self::changeIntElements($array[$i], $array[$i+1]);
                }
            }
        }            

        $time->finish();
        $result = [
            'array' => $array,
            'duration' => $time->duration,
        ];
        return $result;
    }
    
}