<?php
class Solution {

    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str) {
        $flag = 1;
        $str = ltrim($str);
        $len = strlen($str);
        $number = "";
        $start = 0;
        if ($str[0] == '+' || $str[0] == '-') {
            $flag = ($str[0] == '+')? 1 : -1;
            $start = 1;
        }
        for ($i = $start; $i < $len; $i++) {
            $c = $str[$i];
            if ($c < '0' || $c > '9') {
                break;
            }
            $number .= $c;
        }
        $number = intval($number) * $flag;
        $min32 = -(1 << 31);
        $max32 = (1 << 31) - 1;
        if ($number < $min32) {
            return $min32;
        }
        if ($number > $max32) {
            return $max32;
        }
        return $number;
    }
}
