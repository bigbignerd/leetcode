<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function numDecodings($s) {
        if (empty($s)) {
            return 0;
        }
        $counts[0] = $s[0] == '0'? 0 : 1;
        $counts[-1] = 1;
        $len = strlen($s);
        for ($i = 1; $i < $len; $i++) {
            $num1 = intval($s[$i]);
            $num2 = intval($s[$i-1].$s[$i]);
            $counts[$i] = 0;
            if ($num1 !== 0) {
                $counts[$i] += $counts[$i-1];
            }
            if ($num2 >= 10 && $num2 <= 26) {
                $counts[$i] += $counts[$i-2];
            }
        }
        return $counts[$len-1];
    }
}
