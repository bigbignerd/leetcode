<?php
class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function uniquePaths($m, $n) {
        $counts[0][0] = 1;
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $left = $counts[$i-1][$j]?? 0;
                $up = $counts[$i][$j-1]?? 0;
                if (!$left && !$up) {
                    continue;
                }
                $counts[$i][$j] = $left + $up;
            }
        }
        return $counts[$m-1][$n-1];
    }
}
