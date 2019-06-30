<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function integerBreak($n) {
        $mem = array_fill(0, $n+1, -1);
        $mem[1] = 1;
        for ($i = 2; $i <= $n; $i++) {
            for ($j = 1; $j < $i; $j++) {
                $mem[$i] = $this->max3($mem[$i], $j * ($i - $j), $j * $mem[$i-$j]);
            }
        }
        return $mem[$n];
    }
    function max3($a, $b, $c) {
        return max($a, max($b, $c));
    }
}
