<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $count = count($nums);
        $half = ceil($count / 2);
        $map = [];
        foreach ($nums as $k => $v) {
            isset($map[$v])? $map[$v]++ : ($map[$v] = 1);
            if ($map[$v] >= $half) {
                return $v;
            }
        }
    }
}
