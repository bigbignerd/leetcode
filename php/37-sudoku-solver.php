<?php
class Solution {

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solveSudoku(&$board) {
        $this->solve($board, 0, 0);
    }
    function solve(&$board, $x, $y) {
        if ($x == 9) {
            return true;
        }
        if ($y >= 9) {
            return $this->solve($board, $x+1, 0);
        }
        for ($n = 1; $n <= 9; $n++) {
            if ($board[$x][$y] == '.') {
                $board[$x][$y] = "".$n;
                if ($this->isValid($board, $x, $y)) {
                    if ($this->solve($board, $x, $y+1)) {
                        return true;
                    } 
                }
                $board[$x][$y] = '.';
            } else {
                return $this->solve($board, $x, $y+1);
            }
        }
    }
    function isValid(&$board, $x, $y) {
        for ($row = 0; $row < 9; $row++) {
            if ($row != $x && $board[$row][$y] == $board[$x][$y]) {
                return false;
            }
        }
        for ($col = 0; $col < 9; $col++) {
            if ($col != $y && $board[$x][$col] == $board[$x][$y]) {
                return false;
            }
        }
        for ($row = intval($x/3) * 3; $row < intval($x/3)*3+3; $row++) {
            for ($col = intval($y/3)*3; $col < intval($y/3)*3+3; $col++) {
                if (($x != $row || $y != $col) && $board[$x][$y] == $board[$row][$col]) {
                    return false;
                }
            }
        }
        return true;
    }
}
