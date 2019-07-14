<?php
class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        $count = count($strs);
        if ($count == 0) {
            return "";
        }
        $res = "";
        $first = $strs[0];
        $firstLen = strlen($first);
        for ($i = 0; $i < $firstLen; $i++) {
            $flag = true;
            $c = $first[$i];
            for ($j = 1; $j < $count; $j++) {
                if (!isset($strs[$j][$i]) || $strs[$j][$i] != $c) {
                    $flag = false;
                    break;
                }
            } 
            if ($flag) {
                $res .= $c;
            } else {
                break;
            }
        }
        return $res;
    }
}
