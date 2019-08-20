<?php
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $max = 0;
        $min = $prices[0];
        $count = count($prices);
        for ($i = 1; $i < $count; $i++) {
            if ($prices[$i] < $min) {
                $min = $prices[$i];
            } else if ($prices[$i] - $min > $max) {
                $max = $prices[$i] - $min;
            }
        }
        return $max;
    }
}
