<?php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s) {
        $s = ltrim($s);
        $s = rtrim($s);
        $res = explode(" ", $s);
        $rev = [];
        foreach ($res as $v) {
            if (empty($v)) {
                continue;
            }
            $temp = ltrim($v);
            $temp = rtrim($v);
            array_unshift($rev, $temp);
        }
        return implode(" ", $rev);
    }
}
