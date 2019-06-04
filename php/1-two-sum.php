<?php
class Solution 
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public function twoSum($nums, $target) 
    {
        $map = [];
        foreach ($nums as $index => $num) {
            $map[$num] = $index;
        }
        foreach ($nums as $index => $num) {
            $need = $target - $num;
            if (isset($map[$need]) && $map[$need] != $index) {
                return [$index, $map[$need]];
            }
        }
    }
}
