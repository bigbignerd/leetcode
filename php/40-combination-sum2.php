<?php
class Solution {
    private $target;
    private $count;
    private $data = [];
    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum2($candidates, $target) {
        $this->target = $target;
        $this->count = count($candidates);
        sort($candidates);
        $this->helper($candidates, 0, []);
        return $this->data;
    }
    function helper(&$candidates, $start, $val) {
        $sum = array_sum($val);
        if ($sum > $this->target) {
            return;
        }
        if ($sum == $this->target) {
            $this->data[] = $val;
            return;
        }
        for ($i = $start; $i < $this->count; $i++) {
            if ($i != $start && $candidates[$i] == $candidates[$i-1]) {
                continue;
            }
            if ($sum + $candidates[$i] > $this->target) continue;
            array_push($val, $candidates[$i]);
            $this->helper($candidates, $i+1, $val);
            
            array_pop($val);
        }
    }
}
