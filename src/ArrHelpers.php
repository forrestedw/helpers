<?php


namespace Forrestedw\Helpers;


use Illuminate\Support\Str;

class ArrHelpers
{

    /**
     * An array of all the positions of a string within another string.
     * Helper function.
     *
     * @param $haystack
     * @param $needle
     * @return array
     */
    public static function arrayOfPositions(string $haystack, string $needle)
    {
        $currentOffset = 0;
        $allPositions = [];
        while (($position = strpos($haystack, $needle, $currentOffset)) !== FALSE) {
            $currentOffset = $position + 1;
            $allPositions[] = $position;
        }
        return $allPositions;
    }

    /**
     * If last element in an array contains given text.
     *
     * @param array $array
     * @param $contains
     * @return bool
     */
    public static function lastElementContains(array $array, $contains) : bool
    {
        return Str::contains(strtolower(end($array)), strtolower($contains));
    }
}
