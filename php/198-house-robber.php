<?php
class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
        $count = count($nums);
        if ($count == 0) {
            return 0;
        }
        $sum[0] = $nums[0];
        $sum[-1] = 0;
        $sum[-2] = 0;
        for ($i = 1; $i < $count; $i++) {
            $sum[$i] = max($sum[-1+$i], $nums[$i] + $sum[-2+$i]);
        }
        return $sum[$count-1];
    }
}
