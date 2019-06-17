<?php
class Solution 
{
    /**
     * @param String $s
     * @return Boolean
     */
    public function isValid($s) 
    {
        $stack = [];
        $strlen = strlen($s);
        if ($strlen == 0) {
            return true;
        }
        $left = ['('=>0, '{'=>1, '['=>2];
        $right = [')'=>0, '}'=>1, ']'=>2];
        
        for ($i = 0; $i < $strlen; $i++) {
            $str = $s[$i];
            if (!isset($left[$str) && !isset($right[$str])) {
                return false;
            }
            if (isset($left[$str])) {
                array_push($stack, $str);
            } else {
                $c = array_pop($stack);
                if ($left[$c] !== $right[$str]) {
                    return false;
                }
            }
        }
        return empty($stack)? true : false;
    }
}
