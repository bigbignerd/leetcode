<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
        $map = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000,
        ];
        $special = [
            'I' => ['V', 'X'],
            'X' => ['L', 'C'],
            'C' => ['M', 'D']
        ];
        $sum = 0;
        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            $c = $s[$i];
            if (isset($special[$c]) && $i + 1 < $len && in_array($s[$i+1], $special[$c])) {

                $sum += ($map[$s[$i+1]] - $map[$c]);
                $i++;
            } else {
                $sum += $map[$c];
            }
        }
        return $sum;
    }
}
