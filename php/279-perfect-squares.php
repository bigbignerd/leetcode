<?php
class Solution {
    private $map = [];
    /**
     * @param Integer $n
     * @return Integer
     */
    function numSquares($n) {
        if (isset($this->map[$n])) {
            return $this->map[$n];
        }
        $min = $n;
        $i = 1;
        while (pow($i, 2) <= $n) {
            $leftNum = $n - pow($i, 2);
            $min = min($min, $this->numSquares($leftNum)+1);
            $i++;
        }
        $this->map[$n] = $min;
        return $min;
    }
}
