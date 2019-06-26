<?php
class Solution {
    private $target;
    private $result = [];
    private $count = 0;
    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
        if (empty($candidates)) {
            return [];
        }
        // sort and foreach break:Runtime: 12 ms, faster than 100.00%
        sort($candidates);
        $this->target = $target;
        $this->count = count($candidates);
        $this->helper($candidates, 0, []);
        return $this->result;
    }
    function helper(&$candidates, $index, $value) {
        $sum = array_sum($value);
        if ($sum > $this->target) {
            return;
        }
        if ($sum == $this->target) {
            $this->result[] = $value;
            return;
        }
        for ($i = $index; $i < $this->count; $i++) {
            if ($sum + $candidates[$i] > $this->target) {
                break;
            } 
            array_push($value, $candidates[$i]);
            $this->helper($candidates, $i, $value);
            array_pop($value);
        }
    }
}
