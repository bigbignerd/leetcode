<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
        $count = count($nums);
        if ($count == 0 || $k == 0) {
            return;
        }
        $steps = $k % $count;
        $right = array_splice($nums, $count - $steps);
        $left = array_splice($nums, 0, $count - $steps);
        $nums = array_merge($right, $left);
    }
}
