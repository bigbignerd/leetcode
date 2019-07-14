<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums) {
        $count = count($nums);
        if ($count == 0) {
            return 0;
        }
        $memo = array_fill(0, $count, 1);
        $res = 1;
        for ($i = 1; $i < $count; $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($nums[$j] < $nums[$i]) {
                    $memo[$i] = max($memo[$i], $memo[$j] + 1);
                }
            }
            $res = max($res, $memo[$i]);
        }
        return $res;
    }
}
