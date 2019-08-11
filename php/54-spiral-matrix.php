<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        if (empty($matrix)) {
            return [];
        }
        $res = [];
        $left = 0;
        $right = count($matrix[0]) - 1;
        $top = 0;
        $bottom = count($matrix) - 1;
        $steps = 0;
        $total = count($matrix[0]) * count($matrix);

        while ($left <= $right && $top <= $bottom && $steps <= $total) {
            for ($i = $left; $i <= $right; $i++) {
                $res[] = $matrix[$top][$i];
                $steps++;
            }
            $top++;
            for ($i = $top; $i <= $bottom; $i++) {
                $res[] = $matrix[$i][$right];
                $steps++;
            }
            $right--;
            for ($i = $right; $i >= $left; $i--) {
                $res[] = $matrix[$bottom][$i];
                $steps++;
            }
            $bottom--;
            for ($i = $bottom; $i >= $top; $i--) {
                $res[] = $matrix[$i][$left];
                $steps++;
            }
            $left++;
        }
        return array_slice($res, 0, $total);
    }
}
