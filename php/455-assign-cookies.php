<?php
class Solution {

    /**
     * @param Integer[] $g
     * @param Integer[] $s
     * @return Integer
     */
    function findContentChildren($g, $s) {
        rsort($g);
        rsort($s);

        $countG = count($g);
        $countS = count($s);
        
        $indexG = $indexS = 0;
        $res = 0;
        while ($indexS < $countS && $indexG < $countG) {
            if ($s[$indexS] >= $g[$indexG]) {
                $res++;
                $indexS++;
                $indexG++;
            } else {
                $indexG++;
            }
        }
        return $res;
    }
}
