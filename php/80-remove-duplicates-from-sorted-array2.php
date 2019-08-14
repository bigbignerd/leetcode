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
            $c = 1;
            while ($i < $count && $nums[$i] == $nums[$j - 1]) {
                if ($c >= 2) {
                    $newLen--;
                    unset($nums[$i]);
                } else {
                    $c++;
                }
                $i++;
            }
        }
        return $newLen;
    }
}
