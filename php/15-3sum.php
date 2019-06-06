<?php
class Solution 
{
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    public function threeSum($nums) 
    {
        $len = count($nums);
        sort($nums);
        $k = 0;
        $result = [];
        while ($k < $len) {
            if ($k > 0 && $nums[$k-1] > 0) break;
            $i = $k+1;
            $j = $len-1;
            $target = 0 - $nums[$k];
            if ($k > 0 && $nums[$k] == $nums[$k-1]) {
                $k++;
                continue;
            }
            while ($i < $j) {
                if ($nums[$i]+$nums[$j] == $target) {
                    $result[] = [$nums[$k], $nums[$i], $nums[$j]];
                    while ($i < $j && $nums[$i] == $nums[$i+1]) $i++;
                    while ($j > $i && $nums[$j] == $nums[$j-1]) $j--;
                    $i++;
                    $j--;
                } else if ($nums[$i]+$nums[$j] < $target) {
                    $i++;
                } else {
                    $j--;
                }
            }
            $k++;
        }

        return $result;
    }
}




