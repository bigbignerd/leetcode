<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer[][]
     */
    function generateMatrix($n) {
        $res = [];
        $top = $left = 0;
        $bottom = $right = $n - 1;
        $steps = 0;
        $num = 1;
        while ($steps < $n * $n) {
            for ($i = $left; $i <= $right; $i++) {
                $res[$top][$i] = $num++;
                $steps++;
            }
            $top++;
            for ($i = $top; $i <= $bottom; $i++) {
                $res[$i][$right] = $num++;
                $steps++;
            }
            $right--;
            for ($i = $right; $i >= $left; $i--) {
                $res[$bottom][$i] = $num++;
                $steps++;
            }
            $bottom--;
            for ($i = $bottom; $i >= $top; $i--) {
                $res[$i][$left] = $num++;
                $steps++;
            }
            $left++;
        }
        foreach ($res as $k => $v) {
            ksort($v);
            $res[$k] = $v;
        }
        return $res;
    }
}
