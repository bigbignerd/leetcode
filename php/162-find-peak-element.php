<?php
class Solution {

    function findPeakElement($nums) {
        $count = count($nums);
        $nums[-1] = PHP_INT_MIN;
        $nums[$count] = PHP_INT_MIN;
        return $this->binarySearch($nums, 0, $count -1);
    }
    function binarySearch(&$nums, $left, $right) {
        $middle = ($left + $right) >> 1;
        if ($left == $right) {
            return $left;
        }
        $value = $nums[$middle];
        if ($value <= $nums[$middle + 1]) {
            return $this->binarySearch($nums, $middle + 1, $right);
        } elseif ($value <= $nums[$middle - 1]) {
            return $this->binarySearch($nums, $left, $middle - 1);
        }
        return $middle;
    }
    /**
     * slow 
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement2($nums) {
        $count = count($nums);
        $nums[-1] = PHP_INT_MIN;
        $nums[$count] = PHP_INT_MIN;
        if ($count == 0) {
            return 0;
        }
        for ($i = 0; $i <  $count; $i++) {
            if ($nums[$i] > $nums[$i-1] && $nums[$i] > $nums[$i+1]) {
                return $i;
            }
        }
        return -1;
    }
}
