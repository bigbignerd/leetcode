<?php
class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {
        foreach ($nums as $index => $value) {
            if ($target <= $value) {
                return $index;
            }
        }
        return $index + 1;
    }
}
