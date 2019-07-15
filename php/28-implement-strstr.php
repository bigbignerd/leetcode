<?php
class Solution {

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle) {
        $lenh = strlen($haystack);
        $lenn = strlen($needle);
        if ($lenn == 0) {
            return 0;
        }
        if ($lenh < $lenn) {
            return -1;
        }
        $h = 0;
        while ($h < $lenh) {
            if ($needle[0] == $haystack[$h] && substr($haystack, $h, $lenn) == $needle) {
                return $h;
            }
            $h++;
        }
        return -1;
    }
}
