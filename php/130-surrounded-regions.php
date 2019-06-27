<?php
class Solution {
    private $row;
    private $col;
    private $direction = [
        [1, 0],
        [0, -1],
        [-1, 0],
        [0, 1]
    ];
    private $visited = [];
    /**
     * @param String[][] $board
     * @return NULL
     */
    function solve(&$board) {
        $this->row = count($board);
        $this->col = count($board[0]);
        $this->visited = array_fill(0, $this->row-1, array_fill(0, $this->col-1, false));
        for ($i = 0; $i < $this->row; $i++) {
            for ($j = 0; $j < $this->col; $j++) {
                if ($board[$i][$j] == 'O' && $this->onBorder($i, $j)) {
                    $this->dfs($board, $i, $j);
                }
            }
        }
        
        for ($i = 0; $i < $this->row; $i++) {
            for ($j = 0; $j < $this->col; $j++) {
                if (!$this->visited[$i][$j]) {
                    $board[$i][$j] = 'X';
                }
            }
        }
        return ;
    }
    function dfs(&$board, $x, $y) {
        if ($board[$x][$y] == 'X') {
            return true;
        }
        $this->visited[$x][$y] = true;
        for ($i = 0; $i < 4; $i++) {
            $nextX = $x + $this->direction[$i][0];
            $nextY = $y + $this->direction[$i][1];
            if ($this->inArea($nextX, $nextY) && !$this->visited[$nextX][$nextY]) {
                $this->dfs($board, $nextX, $nextY);
            }
        }
        return true;
    }
    function inArea($x, $y) {
        return $x >=0 && $x < $this->row && $y >= 0 && $y < $this->col;
    }
    function onBorder($x, $y) {
        if ($x == 0 || $x == $this->row-1 || $y == 0 || $y == $this->col-1) {
            return true;
        }
        return false;
    }
}
