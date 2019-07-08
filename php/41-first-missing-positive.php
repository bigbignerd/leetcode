<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function firstMissingPositive($nums) {
        sort($nums);
        $count = count($nums);
        $i = 0;
        while ($i < $count) {
            if ($nums[$i] <= 0) {
                $i++;
                continue;
            }
			if ($i == 0 && $nums[$i] > 1) {
				return 1;
			}
            if ($i > 0 && $nums[$i] > 1 && $nums[$i - 1] <= 0) {
                return 1;
            }
            if ($i > 0 && $nums[$i - 1] > 0 &&  $nums[$i] - $nums[$i-1] > 1) {
                return $nums[$i-1] + 1;
            }
            $i++;
        }
        return $nums[$count - 1] > 0 ? $nums[$count - 1] + 1 : 1;
    }
}

//test
$nums = [0, 1, 1, 2, 2];
$s = new Solution();
echo $s->firstMissingPositive($nums);

