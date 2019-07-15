<?php
class Solution {

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {
        $row = array_fill(0, 9, false);
        $col = $row;
        $cell = $row;
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if ($board[$i][$j] == '.') {
                    continue;
                }
                $c = $board[$i][$j] - 1;
                $cellN = 3 * intval($i / 3) + intval($j / 3);
                if ($row[$i][$c] || $col[$j][$c] || $cell[$cellN][$c]) {
                    return false;
                }
                $row[$i][$c] = true;
                $col[$j][$c] = true;
                $cell[$cellN][$c] = true;
            }
        }
        return true;
    }
}
