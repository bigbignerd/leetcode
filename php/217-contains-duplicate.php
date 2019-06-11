<?php
class Solution 
{
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    public function containsDuplicate($nums) 
    {
        $map = [];
        foreach ($nums as $k => $v) {
            if (isset($map[$v]) && $map[$v] != $k) {
                return true;
            }
            $map[$v] = $k;
        }
        return false;
    }
}
