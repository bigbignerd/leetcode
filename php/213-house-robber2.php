<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
        $count = count($nums);
        if ($count == 1) {
            return $nums[0];
        }
        if ($count == 2) {
            return max($nums[0], $nums[1]);
        }
        $arr1 = array_slice($nums, 0, $count - 1);
        $arr2 = array_slice($nums, 1, $count - 1);
        return max($this->getMax($arr1), $this->getMax($arr2));
    }
    function getMax($nums) {
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
