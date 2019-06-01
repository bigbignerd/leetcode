<?php

class Solution 
{
    /**
     * @param Integer[] $nums
     * @return NULL
     */
    public function moveZeroes(&$nums) 
	{
        if (empty($nums)) {
            return false;
        }
        $zeroNums = 0;
        foreach ($nums as $k => $v) {
            if ($v == 0) {
                $zeroNums++;
                unset($nums[$k]);
            }
        }
        $nums = array_merge($nums, array_fill(0, $zeroNums, 0));
    }
}

//test
$data = [0,1,0,3,12];
$s = new Solution();
$s->moveZeroes($data);
var_dump($data);

