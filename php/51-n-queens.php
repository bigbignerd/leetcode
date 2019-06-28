<?php
class Solution {
    private $res = [];
    private $col;
    private $diagonal1;
    private $diagonal2;
    
    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n) {
        // x column
        $this->col = array_fill(0, $n, false);
        //lower left to upper right
        $this->diagonal1 = array_fill(0, 2*n-1, false);
        //upper left to lower right
        $this->diagonal2 = $this->diagonal1;
        
        $this->putQueen($n, 0, []);
        
        $res = [];
        foreach ($this->res as $k => $v) {
            $rows = [];
            for ($i = 0; $i < $n; $i++) {
                $col = '';
                for ($j = 0; $j < $n; $j++) {
                    if ($v[$i] == $j) {
                        $col .= 'Q';
                    } else {
                        $col .= '.';
                    }
                }
                $rows[] = $col;
            }
            $res[] = $rows;
        }
        return $res;
    }
    function putQueen($n, $index, $row) {
        if ($index == $n) {
            $this->res[] = $row;
            return;
        }
        for ($j = 0; $j < $n; $j++) {
            if (!$this->col[$j] && !$this->diagonal1[$index+$j] && !$this->diagonal2[$index-$j+$n-1]) {
                $row[$index] = $j;
                $this->col[$j] = true;
                $this->diagonal1[$index+$j] = true;
                $this->diagonal2[$index-$j+$n-1] = true;
                
                $this->putQueen($n, $index+1, $row);
                
                $this->col[$j] = false;
                $this->diagonal1[$index+$j] = false;
                $this->diagonal2[$index-$j+$n-1] = false;
                unset($row[$index]);
            }
        }
        return;
    }
}
