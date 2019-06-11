<?php
class Solution 
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    public function containsNearbyDuplicate($nums, $k) 
    {
        $count = count($nums);
        $i = $j = 0;
        $map = [];
        while ($j < $count) {
            while ($j < $count && $j - $i <= $k) {
                if (isset($map[$nums[$j]]) && $j-$map[$nums[$j]] <= $k) {
                    return true;
                } else {
                    $map[$nums[$j]] = $j;
                    $j++;
                }
            }
            $i++;
        }
        return false;
    }
}
