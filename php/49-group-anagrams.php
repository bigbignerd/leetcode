<?php
class Solution 
{
    /**
     * @param String[] $strs
     * @return String[][]
     */
    public function groupAnagrams($strs) 
    {
        $map = [];
        foreach ($strs as $k => $v) {
            $strLen = strlen($v);
            $number = [];
            for ($i=0; $i< $strLen; $i++) {
                $number[] = ord($v[$i]);
            }
            sort($number);
            $map[implode("_", $number)][] = $v;
        }
        return $map;
    }
}
