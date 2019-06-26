<?php 
class Solution {
    private $direction = [
        [0, -1],
        [1, 0],
        [0, 1],
        [-1, 0]
    ];
    private $col;
    private $row;
    private $visited = [];
    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word) {
        $this->row = count($board);
        $this->col = count($board[0]);
        $this->visited = array_fill(0, $this->row, array_fill(0, $this->col, false));
        for ($i = 0; $i < $this->row; $i++) {
            for ($j = 0; $j < $this->col; $j++) {
                $res = $this->getWord($board, $word, 0, $i, $j);
                if ($res) {
                    return true;
                }
            }
        }
        return false;
    }
    function getWord(&$board, $word, $index, $x, $y) {
        if ($index == strlen($word) - 1) {
            return $board[$x][$y] == $word[$index];
        }
        if ($word[$index] !== $board[$x][$y]) {
            return false;
        }
        $this->visited[$x][$y] = true;
        // continure search
        for ($i = 0; $i < 4; $i ++) {
            $nextX = $x + $this->direction[$i][0];
            $nextY = $y + $this->direction[$i][1];
            $isVisited = isset($this->visited[$nextX][$nextY]) && $this->visited[$nextX][$nextY];
            if ($this->inArea($nextX, $nextY) && !$isVisited) {
                if ($this->getWord($board, $word, $index+1, $nextX, $nextY)) {
                    return true;                    
                }
            }
        }
        $this->visited[$x][$y] = false;
        return false;
    }
    function inArea($x, $y) {
        return $x >=0 && $x < $this->row && $y >= 0 && $y < $this->col;
    }
}
