<?php
class Solution {
    private $result = [];
    private $count;
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $this->count = count($nums);
        $this->helper($nums, 0, []);
        return $this->result;
    }
    function helper(&$nums, $start, $val) {
        $this->result[] = $val;
        for ($i = $start; $i < $this->count; $i++) {
            array_push($val, $nums[$i]);
            $this->helper($nums, $i+1, $val);
            array_pop($val);
        }
    }

}
