<?php
class Solution {
    private $memo = [];
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canPartition($nums) {
        $sum = array_sum($nums);
        $count = count($nums);
        if ($sum % 2 != 0) {
            return false;
        }
        $halfSum = $sum / 2;
        return $this->tryPartition($nums, $halfSum, $count - 1);
    }
    function tryPartition(&$nums, $sum, $index) {
        if ($sum == 0) {
            return true;
        }
        if ($sum < 0 || $index < 0) {
            return false;
        }
        if (isset($this->memo[$index][$sum])) {
            return $this->memo[$index][$sum];
        }
        $res = $this->tryPartition($nums, $sum, $index - 1) || $this->tryPartition($nums, $sum - $nums[$index], $index -1);
        $this->memo[$index][$sum] = $res;
        
        return $res;
    }
}
