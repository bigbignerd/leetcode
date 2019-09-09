<?php
class Solution {

    /**
     * @param String $ransomNote
     * @param String $magazine
     * @return Boolean
     */
    function canConstruct($ransomNote, $magazine) {
        $map = [];
        $len = strlen($magazine);
        for ($i = 0; $i < $len; $i++) {
            !isset($map[$magazine[$i]]) && $map[$magazine[$i]] = 0;
            $map[$magazine[$i]]++;
        }
        $rlen = strlen($ransomNote);
        for ($i = 0; $i < $rlen; $i++) {
            if (!isset($map[$ransomNote[$i]]) || $map[$ransomNote[$i]] == 0) {
                return false;
            }
            $map[$ransomNote[$i]]--;
        }
        return true;
    }
}
