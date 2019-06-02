<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    public function isPalindrome($s) 
	{
		$len = strlen($s);
        $i = 0;
        $j = $len-1;
        while ($i < $j) {
            $si = strtolower($s[$i]);
            $sj = strtolower($s[$j]);
            if (!is_numeric($s[$i]) && ($si > 'z' || $si < 'a')) {
                $i++;
                continue;
            }
            if (!is_numeric($s[$j]) && ($sj > 'z' || $sj < 'a')) {
                $j--;
                continue;
            }
            if ($si != $sj) {
                return false;
            } else {
                $i++;
                $j--;
            }
        }
        return true;
    }
}
//test
$s = new Solution();
//$str = 'A man, a plan, a canal: Panama';
$str = "0P";
var_dump($s->isPalindrome($str));

