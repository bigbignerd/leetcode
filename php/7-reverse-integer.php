<?php
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $flag = 1;
        if ($x < 0) {
            $flag = -1;
        }
        $s = (string)$x;
        $right = strlen($s) - 1;
        $left = 0;
        while ($left < $right) {
            [$s[$left], $s[$right]] = [$s[$right], $s[$left]];
            $left++;
            $right--;
        }
        $val = intval($s);
        $maxInt32 = (1<<31) - 1;
        return ($val > $maxInt32)? 0 : $flag * $val;
    }
}
