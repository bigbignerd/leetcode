<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function countPrimes($n) {
        $count = 0;
        for ($i = 1; $i < $n; $i++) {
            if ($this->isPrim($i)) {
                $count++;
            }
        }
        return $count;
    }
    function isPrim($n) {
        if ($n <= 1) {
            return false;
        }
        for ($i = 2; $i * $i <= $n; $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true;
    }
}
