<?php
class Solution 
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    public function fourSum($nums, $target) 
    {
        $len = count($nums);
        sort($nums);
        $result = [];
        for ($t1=0; $t1<$len-3; $t1++) {
            for ($t2=$t1+1; $t2<$len-2; $t2++) {
                $need = $target - $nums[$t1] - $nums[$t2];
                $left = $t2+1;
                $right = $len-1;
                while ($left < $right) {
                    if ($nums[$left] + $nums[$right] == $need) {
                        $result[] = [$nums[$t1], $nums[$t2], $nums[$left], $nums[$right]];
                        $left++;
                        $right--;
                        while ($left < $right && $nums[$left] == $nums[$left-1]) $left++;
                        while ($left < $right && $nums[$right] == $nums[$right+1]) $right--;
                    } else if ($nums[$left] + $nums[$right] > $need) {
                        $right--;
                    } else {
                        $left++;
                    }
                }
                //t2 unique
                while ($t2+1 < $len-1 && $nums[$t2+1] == $nums[$t2]) $t2++;
            }
            //t2 unique
            while ($t1+1 < $len-1 && $nums[$t1+1] == $nums[$t1]) $t1++;
        }
        return $result;
    }
}
