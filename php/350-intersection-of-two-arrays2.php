<?php
class Solution 
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */ 
    public function intersect($nums1, $nums2) 
	{
        $record = [];
        foreach ($nums1 as $k => $v) {
            $record[$v]++;
        }
        $result = [];
        foreach ($nums2 as $k => $v) {
            if (isset($record[$v]) && $record[$v] > 0) {
                $result[] = $v;
                $record[$v]--;
            }
        }
        return $result;
    }
}
