<?php

namespace ArrayMethods;

use TimeCounter\TimeCounter;

class ArrayMethods
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
    public static function changeIntElements(int &$a, int &$b)
    {
        $a = $a + $b;
        $b = $a - $b;
        $a = $a - $b;
    }

    public static function insertElement(array &$array, int $key, $newElement)
    {
        array_splice($array, $key, 0, $newElement);
    }

    public static function sort(array $array, string $method): array
    {
        $sortedArray = [];

        $time = new TimeCounter();
        $time->start();

        switch ($method) {
            case 'scalarBubble':
                $sortedArray = self::sortingBubbleScalar($array);
                break;
            case 'scalarInsertion':
                $sortedArray = self::sortingInsertionScalar($array);
                break;
        }

        $time->finish();
        $result = [
            'array' => $sortedArray,
            'duration' => $time->duration,
        ];
        return $result;
    }

    /**
     * Bubble sorter. Return sorted array by bubble method.
     *
     * @param array $array
     * @return array
     */
    public static function sortingBubbleScalar(array $array): array
    {
        for($finishElementIndex = count($array); $finishElementIndex > 0; $finishElementIndex--)
        {
            for($i=0; $i < $finishElementIndex-1; $i++) 
            {
                if ($array[$i] > $array[$i+1]) {
                    self::changeIntElements($array[$i], $array[$i+1]);
                }
            }
        } 
        return $array;           
    }

    public static function sortingInsertionScalar(array $array): array
    {
        for($finishElementIndex = count($array); $finishElementIndex > 0; $finishElementIndex--)
        {
            for($i=0; $i < $finishElementIndex-1; $i++) 
            {
                if ($array[$i] > $array[$i+1]) {
                    self::changeIntElements($array[$i], $array[$i+1]);
                }
            }
        } 
        return $array;           
    }
    
}