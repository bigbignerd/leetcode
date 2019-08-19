<?php
class Solution {

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex) {
        $res = [[1]];
        if ($rowIndex == 0) {
            return $res[0];
        }
        for ($i = 1; $i <= $rowIndex; $i++) {
            $row = [1];
            for ($j = 1; $j < $i; $j++) {
                $row[] = $res[$i - 1][$j - 1] + $res[$i - 1][$j];
            }
            $row[] = 1;
            $res[] = $row;
        }
        return $res[$rowIndex];
    }
}
