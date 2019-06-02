<?php

class Solution 
{
    /**
     * @param Integer[] $height
     * @return Integer
     */
    public function maxArea($height) {
        $max = 0;
        $i = 0;
        $j = count($height) - 1;
        while ($i < $j) {
            $area = ($j-$i)*min($height[$i], $height[$j]);
            if ($height[$i] > $height[$j]) {
                $j--;
            } else {
                $i++;
            }
            $max = max($area, $max);
        }
        return $max;
    }
}
