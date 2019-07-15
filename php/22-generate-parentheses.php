<?php
class Solution {
    private $res = [];
    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        $this->dfs($n, 0, 0);
        return $this->res;
    }
    function dfs($n, $left, $right, $p = '') {
        if ($left >= $n && $right >= $n) {
            $this->res[] = $p;
            return;
        }
        if ($left < $n) {
            $this->dfs($n, $left + 1, $right, $p . '(');
        }
        if ($right < $left) {
            $this->dfs($n, $left, $right + 1, $p . ')');
        }
    }
}
