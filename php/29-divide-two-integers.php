<?php
class Solution {

    /**
     * @param Integer $dividend
     * @param Integer $divisor
     * @return Integer
     */
    function divide($dividend, $divisor) {

        $n = 0;
        $min32 = -(1 << 31);
        $max32 = (1 << 31) - 1;
        if ($divisor == 0 || ($divisor == -1 && $dividend == $min32)) {
            return $max32;
        }
        $flag = 1;
        if (($dividend > 0 && $divisor > 0) || ($dividend < 0 && $divisor < 0)) {
            $flag = 0;
        }
        $dividend = abs($dividend);
        $divisor = abs($divisor);
        if ($divisor == 1) {
            return ($flag == 1)? -$dividend : $dividend;
        }
        while ($dividend >= $divisor) {
            $n++;
            $dividend -= $divisor;
        }
        return ($flag == 1)? -$n : $n;
    }
}
