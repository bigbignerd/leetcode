<?php
class Solution 
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    public function threeSumClosest($nums, $target) 
	{
        $count = count($nums);
        sort($nums);
        $result = null;
        $distance = null;
        for ($i=0; $i<$count-2; $i++) {
            $left = $i+1;
            $right = $count-1;
            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];
                if ($sum == $target) {
                    return $sum;
                } else {
                    $diff = abs($sum - $target);
                    if ($distance == null || $diff < $distance) {
                        $distance = $diff;
                        $result = $sum;
                    }
                }
                if ($sum < $target) {
                    $left++;
                    while ($left < $right && $nums[$left] == $nums[$left-1]) $left++;
                } else {
                    $right--;
                    while ($left < $right && $nums[$right] == $nums[$right+1]) $right--;
                }
                
            }
        }
        return $result;
    }
}
