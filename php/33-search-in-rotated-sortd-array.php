<?php
class Solution {
    private $nums;
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $this->nums = $nums;
        $count = count($nums);
        $i = 0;
        $cut = $count - 1;
        while ($i < $count - 1) {
            if ($nums[$i] == $target) {
                return $i;
            }
            if ($nums[$i] > $nums[$i + 1]) {
                $cut = $i + 1;
                break;
            }
            $i++;
        }
        return $this->binarySearch($target, $cut, $count - 1);
    }
    function binarySearch($target, $start, $end) {
        if ($start > $end) {
            return -1;
        }
        $middle = ($start + $end) >> 1;
        
        $mVal = $this->nums[$middle];
        
        if ($mVal == $target) {
            return $middle;
        }
        if ($mVal > $target) {
            return $this->binarySearch($target, $start, $middle - 1);
        } else {
            return $this->binarySearch($target, $middle + 1, $end);
        }
        return -1;
    }
}
