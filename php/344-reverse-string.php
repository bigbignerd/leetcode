<?php
class Solution {

    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString(&$s) {
        $len = count($s);
        $left = 0;
        $right = $len - 1;
        while ($left < $right) {
            list($s[$left], $s[$right]) = [$s[$right], $s[$left]];
            $left++;
            $right--;
        }
        return null;
    }
}
