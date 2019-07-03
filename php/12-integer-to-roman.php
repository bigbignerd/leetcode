<?php
class Solution {

    /**
     * @param Integer $num
     * @return String
     */
    function intToRoman($num) {
        $map = [
            '1000' => 'M',
            '900' => 'CM',
            '500' => 'D',
            '400' => 'CD',
            '100' => 'C',
            '90' => 'XC',
            '50' => 'L',
            '40' => 'XL',
            '10' => 'X',
            '9' => 'IX',
            '5' => 'V',
            '4' => 'IV',
            '1' => 'I',
        ];
        $str = '';
        $i = 0;
        while ($num) {
            foreach ($map as $k => $v) {
                if (intval($num/$k) > 0) {
                    break;
                }
            }
            $count = intval($num / $k);
            while ($count > 0) {
                $str .= $v;
                $count--;
            }
            $num = $num % $k;
        } 
        return $str;
    }
}
