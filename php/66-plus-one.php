<?php
class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        $carry = 0;
        $count = count($digits);
        for ($i = $count - 1; $i >= 0; $i--) {
            if ($i == $count - 1) {
                $newNum = $digits[$i] + 1;
            } else {
                $newNum = $digits[$i];
            }
			$newNum += $carry;
            $carry = intval($newNum / 10);
            $num = $newNum % 10;
            $digits[$i] = $num;
        }
        if ($carry) {
            array_unshift($digits, $carry);
        }
        return $digits;
    }
}

//test
$s = new Solution();
var_dump($s->plusOne([9, 9]));
