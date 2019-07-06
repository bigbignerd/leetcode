<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {
        $left = 0;
        $right = count($nums) - 1;
        while ($left <= $right) {
            $middle = ($left+$right) >> 1;
            $mValue = $nums[$middle];
            if ($mValue == $target) {
                $goLeft = $middle;
                while ($nums[$goLeft - 1] === $target) {
                    $goLeft--;
                }
                $pos[] = $goLeft;
                while ($nums[$middle + 1] === $target) {
                    $middle++;
                }
                $pos[] = $middle;
                return $pos;
            } else if ($mValue < $target) {
                $left = $middle + 1;
            } else {
                $right = $middle - 1;
            }
        }
        return [-1, -1];
    }
}

