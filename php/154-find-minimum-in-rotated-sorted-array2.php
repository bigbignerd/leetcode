<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums) {
        $count = count($nums);
        for ($i = 0; $i < $count - 1; $i++) {
            if ($nums[$i] > $nums[$i + 1]) {
                return $nums[$i + 1];
            }
        }
        return $nums[0];
    }
}
