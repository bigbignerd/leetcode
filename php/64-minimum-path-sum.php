<?php
class Solution {
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum2($grid) {
        $row = count($grid);
        $col = count($grid[0]);
        foreach ($grid as $i => $r) {
            foreach ($r as $j => $c) {
                $min = min($grid[$i-1][$j]?? PHP_INT_MAX, $grid[$i][$j-1]?? PHP_INT_MAX);
                $grid[$i][$j] += $min == PHP_INT_MAX? 0 : $min;
            }
        }
        return $grid[$row-1][$col-1];
    }
}
