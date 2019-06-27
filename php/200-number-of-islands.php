<?php
class Solution {
    private $visited = [];
    private $col;
    private $row;
    private $direction = [
        [1, 0],
        [0, -1],
        [-1, 0],
        [0, 1]
    ];
    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {
        $this->row = count($grid);
        $this->col = count($grid[0]);
        $this->visited = array_fill(0, $this->row, array_fill(0, $this->col, false));
        $count = 0;
        for ($i = 0; $i < $this->row; $i++) {
            for ($j = 0; $j < $this->col; $j++) {
                if ($grid[$i][$j] == 1 && !$this->visited[$i][$j]) {
                    $count++;
                    $this->getLand($grid, $i, $j);
                }
            }
        }
        return $count;
    }
    function getLand(&$grid, $x, $y) {
        if ($grid[$x][$y] == 0) {
            return;
        }
        $this->visited[$x][$y] = true;
        
        for ($i = 0; $i < 4; $i ++) {
            $nextX = $x + $this->direction[$i][0];
            $nextY = $y + $this->direction[$i][1];
            if ($this->inArea($nextX, $nextY) && !$this->visited[$nextX][$nextY] && $grid[$nextX][$nextY] == 1) {
                $this->getLand($grid, $nextX, $nextY);
            }
        }
        return ;
    }
    function inArea($x, $y) {
        return $x >=0 && $x < $this->row && $y >= 0 && $y < $this->col;
    }
}
