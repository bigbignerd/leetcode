<?php
class Solution {

    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b) {
        $i = strlen($a) - 1;
        $j = strlen($b) - 1;
        $res = "";
        $next = 0;
        while ($i >= 0 || $j >= 0) {
            $sum = $next;
            if ($i >= 0) {
                $sum += $a[$i--];
            }
            if ($j >= 0) {
                $sum += $b[$j--];
            }
            $val = $sum % 2;
            $next = intval($sum / 2);
            $res .= $val;
        }
        if ($next > 0) {
            $res .= $next;
        }
        return strrev($res);
    }
}
