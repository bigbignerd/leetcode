<?php

class Solution 
{
    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    public function isIsomorphic($s, $t) 
    {
        $map = [];
        $len = strlen($s);
        for ($i=0; $i<$len; $i++) {
            $sc = $s[$i];
            $tc = $t[$i];
            //make sure different key correspond different value
            if (!isset($map[$sc]) && !in_array($tc, $map)) {
                $map[$sc] = $tc;
            }
            if ($map[$sc] != $tc) {
                return false;
            }
        }
        return true;
    }
}
