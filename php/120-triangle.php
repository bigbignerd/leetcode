<?php
class Solution {
    private $mem = [];
    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle) {
        return $this->getMin($triangle, 0, 0);
    }
    function getMin(&$triangle, $level, $index) {
        if ($level == count($triangle)) {
            return 0;
        }
        if (isset($this->mem[$level][$index])) {
            return $this->mem[$level][$index];
        }
        $s1 = $triangle[$level][$index] + $this->getMin($triangle, $level+1, $index);
        $s2 = $triangle[$level][$index] + $this->getMin($triangle, $level+1, $index+1);
        $this->mem[$level][$index] = min($s1, $s2);
        return $this->mem[$level][$index];
    }
}
