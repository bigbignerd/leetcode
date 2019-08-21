<?php
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $count = count($prices);
        if ($count == 0) {
            return 0;
        }
        $max = 0;
        for ($i = 1; $i < $count; $i++) {
            $max = ($prices[$i] - $prices[$i - 1]) > 0 ? $max + $prices[$i] - $prices[$i - 1] : $max;
        }
        return $max;
    }
}
