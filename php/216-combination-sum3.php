<?php
class Solution {
    private $target;
    private $result = [];
    /**
     * @param Integer $k
     * @param Integer $n
     * @return Integer[][]
     */
    function combinationSum3($k, $n) {
        if ($k > 9 || $k <= 0) {
            return [];
        }
        $this->target = $n;
        $this->combination($k, 1, []);
        return $this->result;
    }
    function combination($k, $index, $val) {
        $count = count($val);
        $sum = array_sum($val);
        if ($count == $k) {
            if ($sum == $this->target) {
                $this->result[] = $val;
            }
            return;
        }
        for ($i = $index; $i <= 9; $i++) {
            if ($sum + $i > $this->target) {
                return;
            }
            array_push($val, $i);
            $this->combination($k, $i+1, $val);
            array_pop($val);
        }   
    }
}
