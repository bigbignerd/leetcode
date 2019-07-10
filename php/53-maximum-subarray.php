<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $count = count($nums);
        $max = PHP_INT_MIN;
        $sum = 0;
        for($i = 0; $i < $count; $i++) {
            $sum = $nums[$i] + ($sum > 0? $sum : 0);
            $max = max($max, $sum);
        }
        return $max;
    }
}

//test
$a =  [-2,1,-3,4,-1,2,1,-5,4];
echo (new Solution())->maxSubArray($a);
