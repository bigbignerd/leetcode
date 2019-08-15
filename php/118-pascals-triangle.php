<?php
class Solution {

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows) {
        if ($numRows == 0) {
            return [];
        }
        $res = [[1]];
        for ($i = 1; $i < $numRows; $i++) {
            $temp = [1];
            for ($j = 1; $j < $i; $j++) {
                $lastRow = $res[$i-1];
                $temp[$j] = $lastRow[$j-1] + $lastRow[$j];
            }
            $temp[] = 1;
            $res[] = $temp;
        }
        return $res;
    }
}
