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
        return true;
    }

    /**
     * Insert element to $key position to array
     *
     * @param array $array
     * @param integer $key
     * @param mixed $insertedElement
     * @return void
     */
    public static function insertElement(array &$array, int $key, mixed $insertedElement)
    {
        array_splice($array, $key, 0, $insertedElement);
        return true;
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

    /**
     * Insertion sorter. Return sorted array by insertion method.
     *
     * @param array $array
     * @return array
     */
    public static function sortingInsertionScalar(array $array): array
    {
        $sortedArray = [$array[0]];

        for($i = 1; $i < count($array); $i++) {
            $currentElement = $array[$i];
            $s = -1;
            do {
                $s++;
            } while(($s < count($sortedArray)) && ($currentElement > $sortedArray[$s]));

            if ($s == count($sortedArray) && ($currentElement > $sortedArray[$s-1])) {
                $sortedArray[] = $currentElement;
            } else {
                self::insertElement($sortedArray, $s, $currentElement);
            }            
        }
        return $sortedArray;           
    }

    public static function sortingMergeScalar(array $array): array
    {
        
    }
    
}