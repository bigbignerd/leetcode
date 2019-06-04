<?php
class Solution 
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersection($nums1, $nums2) {
        $result = [];
        foreach ($nums2 as $k => $v) {
            if (in_array($v, $nums1)) {
                $result[$v] = $v;
            }
        }
        return $result;
    }
}

//test
$num1 = [1,2,2,1]; 
$nums2 = [2,2];

$s = new Solution();
var_dump($s->intersection($num1, $num2);
