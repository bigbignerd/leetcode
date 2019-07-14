<?php

class Solution {
    private $memo = [];
    /**
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     */
    function coinChange($coins, $amount) {
        $memo = array_fill(0, $amount+1, $amount + 1);
        $memo[0] = 0;
        for ($i = 1; $i <= $amount; $i++) {
            foreach ($coins as $c) {
                if ($c <= $i) {
                    $memo[$i] = min($memo[$i], $memo[$i-$c]+1);
                }
            }
        }
        return ($memo[$amount] > $amount)? -1 : $memo[$amount];
    }
    function coinDfs(&$coins, $amount) {
        if ($amount < 0) {
            return -1;
        }
        if ($this->memo[$amount] != PHP_INT_MAX) {

            return $this->memo[$amount];
        }
        foreach ($coins as $coin) {
            $v = $this->coinDfs($coins, $amount - $coin);
            if ($v >= 0) {
                $this->memo[$amount] = min($this->memo[$amount], $v + 1);
            }
        }
        return $this->memo[$amount] == PHP_INT_MAX? -1 : $this->memo[$amount];
    }
}
