<?php
class Solution {

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        if ($n == 0) {
            return 1;
        }
        $half = $this->myPow($x, intval($n / 2));
        if ($n % 2 == 0) {
            return $half * $half;
        } 
        if ($n > 0) {
            return $half * $half * $x;
        }
        return $half * $half / $x;
    }
}
