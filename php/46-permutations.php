<?php
class Solution {
    private $paths = [];
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $this->comb($nums);
        return $this->paths;
    }
    function comb($nums, $val = []) {
        $count = count($nums);
        if ($count == 1) {
            $this->paths[] = array_merge($val, $nums);
            return;
        }
        $nums = array_values($nums);
        for ($i = 0; $i < $count; $i++) {
            $temp = $nums;
            $tempNums = $val;
            unset($temp[$i]);
            $tempNums[] = $nums[$i];
            $this->comb($temp, $tempNums);
        }
    }
}
