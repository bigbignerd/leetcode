<?php
class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $count = count($nums);
        $newLen = $count;
        for ($i = 1; $i < $count; $i++) {
            $j = $i;
            while ($nums[$i] === $nums[$j-1]) {
                unset($nums[$i]);
                $newLen--;
                $i++;
            }
        }
        return $newLen;
    }
}
