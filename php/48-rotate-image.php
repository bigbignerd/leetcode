<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(&$matrix) {
        $n = count($matrix);
		// 对角线对折
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n - $i; $j++) {
                $temp = $matrix[$i][$j];
                $matrix[$i][$j] = $matrix[$n - $j - 1][$n - $i - 1];
                $matrix[$n - $j - 1][$n - $i - 1] = $temp;
            }
        }
        $half = $n >> 1;
		// 水平对折
        for ($i = 0; $i < $half; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $temp = $matrix[$i][$j];
                $matrix[$i][$j] = $matrix[$n - $i - 1][$j];
                $matrix[$n - $i - 1][$j] = $temp;
            }
        }
    }
}
