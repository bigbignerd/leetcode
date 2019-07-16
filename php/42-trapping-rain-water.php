<?php
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        $count = count($height);
        if ($count <= 2) {
            return 0;
        }
        //单调递减栈
        $stack = [];
        $water = 0;
        for ($i = 0; $i < $count; $i++) {
            $top = end($stack);
            if (empty($stack) || $height[$top] > $height[$i]) {
                array_push($stack, $i);
            } else {
                while (!empty($stack) && $height[end($stack)] < $height[$i]) {
                    $v = array_pop($stack);
                    if (!empty($stack)) {
                        $left = end($stack);
                        $w = $i - $left - 1;
                        $h = min($height[$left], $height[$i]) - $height[$v];
                        $water += $w * $h;
                    }
                }
                array_push($stack, $i);
            }
        }
        return $water;
    }
}
