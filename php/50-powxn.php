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
    // 这个好理解一点
    function myPow2($x, $n) {
        if ($n < 0) {
            return 1 /$this->p($x, -$n);
        } else {
            return $this->p($x, $n);
        }
    }
    function p($x, $n) {
        if ($n == 0) {
            return 1;
        }
        return $this->p($x * $x, intval($n / 2)) * ($n % 2 == 0)? 1 : $x;
    }
}
