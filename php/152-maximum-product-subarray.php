<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums) {
        $count = count($nums);
        if ($count == 0) {
            return 0;
        }
        if ($count == 1) {
            return $nums[0];
        }
        $max = $min = [$nums[0]];
        $res = $nums[0];
        for ($i = 1; $i < $count; $i++) {
            $max[$i] = $this->max3($max[$i-1]*$nums[$i], $nums[$i], $min[$i-1]*$nums[$i]);
            $min[$i] = $this->min3($min[$i-1]*$nums[$i], $nums[$i], $max[$i-1]*$nums[$i]);
            $res = max($res, $max[$i]);
        }
        return $res;
    }
    function max3($a, $b, $c) {
        return max(max($a, $b), $c);
    }
    function min3($a, $b, $c) {
        return min(min($a, $b), $c);
    }
}
