<?php
class Solution 
{
    /**
     * @param Integer $s
     * @param Integer[] $nums
     * @return Integer
     */
    public function minSubArrayLen($s, $nums) 
	{
        $count = count($nums);
        $minLen = $count+1;
        $sum = 0;
        $i = 0;
        $j = -1;
        while ($i < $count) {
            if ($j < $count && $sum < $s) {
                $sum += $nums[++$j];
            } else {
                $sum -= $nums[$i++];
            }
            if ($sum >= $s) {
                $minLen = min($minLen, $j-$i+1);
            }
        }
        if ($minLen == $count+1) {
            return 0;
        }
        return $minLen;
    }
}

//test
$nums = [2,3,1,2,4,3];
$s = new Solution();
var_dump($s->minSubArrayLen(7, $nums));
