<?php
class Solution 
{
    /**
     * @param String $s
     * @return String
     */
    public function frequencySort($s) 
    {
        $len = strlen($s);
        $map = [];
        for ($i=0; $i<$len; $i++) {
            $map[ord($s[$i])]++;
        }
        arsort($map);
        $str = '';
        foreach ($map as $k => $v) {
            while ($v-- > 0) {
                $str .= chr($k);
            }
        }
        return $str;
    }
}
