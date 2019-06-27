<?php
class Solution {
    private $col;
    private $row;
    private $direction = [
        [1, 0],
        [0, -1],
        [-1, 0],
        [0, 1]
    ];
    /**
     * @param Integer[][] $matrix
     * @return Integer[][]
     */
    function pacificAtlantic($matrix) {
        $this->row = count($matrix);
        $this->col = count($matrix[0]);
        
        $pacific = array_fill(0, $this->row, array_fill(0, $this->col, false));
        $atlantic = $pacific;
        for ($i = 0; $i < $this->row; $i++) {
            $this->dfs($matrix, $pacific, PHP_INT_MIN, $i, 0);
            $this->dfs($matrix, $atlantic, PHP_INI_MIN, $i, $this->col - 1);
        }
        for ($i = 0; $i < $this->col; $i++) {
            $this->dfs($matrix, $pacific, PHP_INT_MIN, 0, $i);
            $this->dfs($matrix, $atlantic, PHP_INT_MIN, $this->row-1, $i);
        }
        $res = [];
        for ($i = 0; $i < $this->row; $i++) {
            for ($j = 0; $j < $this->col; $j++) {
                if ($pacific[$i][$j] && $atlantic[$i][$j]) {
                    $res[] = [$i, $j];
                } 
            }
        }
        return $res;
    }
    function dfs($matrix, &$visited, $pre, $x, $y) {
        if ($x < 0 || $y < 0 || $x >= $this->row || $y >= $this->col || $visited[$x][$y] || $matrix[$x][$y] < $pre) {
            return;
        }
        $visited[$x][$y] = true;
        for ($i = 0; $i < 4; $i++) {
            $nextX = $x + $this->direction[$i][0];
            $nextY = $y + $this->direction[$i][1];
            $this->dfs($matrix, $visited, $matrix[$x][$y], $nextX, $nextY);
        }
    }
}
