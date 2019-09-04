<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        sort($nums);
        for ($i = 0; $i < count($nums) - 1; $i++) {
            if ($nums[$i] == $nums[$i + 1]) {
                $i++;
            } else {
                return $nums[$i];
            }
        }
        return end($nums);
    }
}
