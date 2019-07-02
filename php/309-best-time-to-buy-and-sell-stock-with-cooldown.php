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
        $buy[] = -$prices[0];
        $sell[] = 0;
        $cool[] = 0;

        for ($i = 1; $i < $count; $i++) {
            $cool[$i] = $sell[$i-1];
            $buy[$i] = max($cool[$i-1] - $prices[$i], $buy[$i-1]);
            $sell[$i] = max($sell[$i-1], $buy[$i-1] + $prices[$i]);
        }
        return max($sell[$count-1], $cool[$count-1]);
    }
}
