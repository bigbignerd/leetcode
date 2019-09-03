<?php
class Solution {

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function multiply($num1, $num2) {
        $len1 = strlen($num1);
        $len2 = strlen($num2);
        $len = $len1 + $len2;
        $ans = array_fill(0, $len, 0);
        for ($i = $len1 - 1; $i >= 0; $i--) {
            for ($j = $len2 - 1; $j >= 0; $j--) {
                $sum = $ans[$i + $j + 1] + $num1[$i] * $num2[$j];
                $ans[$i + $j + 1] = $sum % 10;
                $ans[$i + $j] += intval($sum / 10);
            }
        }
        for ($i = 0; $i < $len; $i++) {
            if ($ans[$i] != 0 || $i == $len - 1) {
                return implode("", (array_splice($ans, $i)));
            }
        }
        return "";
    }
}
