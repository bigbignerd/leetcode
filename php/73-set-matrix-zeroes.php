<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix) {
        $row = [];
        $col = [];
        $rowC = count($matrix);
        $colC = count($matrix[0]);
        
        foreach ($matrix as $k => $v) {
            foreach ($v as $kk => $vv) {
                if ($vv == 0) {
                    $row[] = $k;
                    $col[] = $kk;
                }
            }
        }
        foreach ($row as $r) {
            for ($i = 0; $i < $colC; $i++) {
                $matrix[$r][$i] = 0;
            }
        }
        foreach ($col as $c) {
            for ($i = 0; $i < $rowC; $i++) {
                $matrix[$i][$c] = 0;
            }
        }
        return;
    }
}
