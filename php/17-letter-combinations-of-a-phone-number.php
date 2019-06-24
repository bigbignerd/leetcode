<?php
class Solution {
    private $digitalMap = [
        '2' => 'abc',
        '3' => 'def',
        '4' => 'ghi',
        '5' => 'jkl',
        '6' => 'mno',
        '7' => 'pqrs',
        '8' => 'tuv',
        '9' => 'wxyz'
    ];
    private $data = [];
    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {
        if (empty($digits)) {
            return [];
        }
        $this->combination($digits, 0, "");
        return $this->data;
    }
    function combination(&$digits, $index, $s) {
        if ($index == strlen($digits)) {
            array_push($this->data, $s);
            return;
        }
        $str = $this->digitalMap[$digits[$index]];
        $len = strlen($str);
        for ($i = 0; $i < $len; $i++) {
            $this->combination($digits, $index+1, $s.$str[$i]);
        }
    }
}
