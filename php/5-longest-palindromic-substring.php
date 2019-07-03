<?php
class Solution {
    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $len = strlen($s);
        if ($len == 0) {
            return '';
        }
        $max = 1;
        $start = 0;
        for ($i = 0; $i < $len; $i++) {
            $left = $right = $i;
            while ($right + 1 < $len && $s[$right] == $s[$right+1]) {
                $right++;
            }
            while ($left >= 0 && $right < $len && $s[$right] == $s[$left]) {
                $left--;
                $right++;
            }
            $curLen = $right - $left - 1;
            if ($curLen > $max) {
                $start = $left + 1;
                $max = $curLen;
            }
        }
        return substr($s, $start, $max);
    }
}
