<?php
class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        $x = (string)$x;
        $len = strlen($x);
        $left = 0;
        $right = $len - 1;
        while ($left < $right) {
            if ($x[$left] != $x[$right]) {
                return false;
            }
            $left++;
            $right--;
        }
        return true;
    }
}
