<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums) {
        $count = count($nums);
        $i = $count - 1;
        while ($i > 0 && $nums[$i-1] >= $nums[$i]) {
            $i--;
        }
        if ($i === 0) {
            sort($nums);
            return;
        } else {
            $iVal = $nums[$i - 1];
            for ($j = $count - 1; $j > $i - 1; $j--) {
                if ($nums[$j] > $iVal) {
                    // swap
                    [$nums[$j], $nums[$i - 1]] = [$nums[$i - 1], $nums[$j]];
                    // reorder
                    $descendPart = array_slice($nums, $i);
                    sort($descendPart);
                    array_splice($nums, $i, $count, $descendPart);
                    return;
                }
            }
        }
        sort($nums);
        return;
    }
}
