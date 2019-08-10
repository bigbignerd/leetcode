<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        $max = $nums[0];
        $count = count($nums);
        for ($i = 0; $i < $count; $i++) {
            if ($i > $max) {
                return false;
            }
            $max = max($max, $i + $nums[$i]);
        }
        return true;
    }
}
