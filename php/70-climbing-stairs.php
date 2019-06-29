<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        $mem[1] = 1;
        $mem[2] = 2;
        for ($i = 3; $i <= $n; $i++) {
            $mem[$i] = $mem[$i-1] + $mem[$i-2];
        }
        return $mem[$n];
    }
}
