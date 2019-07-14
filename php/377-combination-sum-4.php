<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function combinationSum4($nums, $target) {
        $memo = array_fill(0, $target + 1, 0);
        $memo[0] = 1;
        for ($i = 1; $i <= $target; $i++) {
            foreach ($nums as $n) {
                if ($n <= $i) {
                    $memo[$i] += $memo[$i - $n];
                }
            }
        }
        return $memo[$target];
    }
}
