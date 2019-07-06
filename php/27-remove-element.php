<?php
class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val) {
        $count = count($nums);
        $mewLen = $count;
        for ($i = 0; $i < $count; $i++) {
            if ($nums[$i] == $val) {
                unset($nums[$i]);
                $newLen--;
            }
        }
        return $newLen;
    }
}
