<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        $row = count($matrix);
        $col = count($matrix[0]);

        for ($i = 0; $i < $row; $i++) {
            $ele = $matrix[$i][$col - 1];
            if ($ele == $target) {
                return true;
            }
            if ($target < $ele) {
                for ($j = 0; $j < $col; $j++) {
                    if ($matrix[$i][$j] == $target) {
                        return true;
                    }
                }
                return false;
            }
        }
        return false;
    }
}
