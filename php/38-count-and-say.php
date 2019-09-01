<?php
class Solution {

    /**
     * @param Integer $n
     * @return String
     */
    function countAndSay($n) {
        if ($n == 1) {
            return "1";
        }
        $seq = "1";
        for ($i = 1; $i < $n; $i++) {
            $seq = $this->getNext($seq);
        }
        return $seq;
    }
    function getNext($seq) {
        $len = strlen($seq);
        $res = "";
        for ($i = 0; $i < $len; $i++) {
            $count = 1;
            while ($i < $len - 1 && $seq[$i] == $seq[$i+1]) {
                $count++;
                $i++;
            }
            $res .= $count;
            $res .= $seq[$i];
        }
        return $res;
    }
}
