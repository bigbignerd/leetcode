<?php
class Solution {
    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) {
        $record = [
            '0' => 0,
            '1' => 0,
            '2' => 0,
        ];
        foreach ($nums as $k => $num) {
            $record[$num] += 1;
        }
        $index = 0;
        foreach ($record as $number => $count) {
            while ($count > 0) {
                $nums[$index] = $number;
                $count--;
                $index++;
            }
        }
    }
}

//test
$nums = [2,0,2,1,1,0];
$s = new Solution();
$s->sortColors($nums);
var_dump($nums);




