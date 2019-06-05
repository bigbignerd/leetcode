<?php
class Solution 
{
    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    public function isAnagram2($s, $t) 
    {
        $sArr = str_split($s);
        $tArr = str_split($t);
        sort($sArr);
        sort($tArr);
        return ($sArr == $tArr)? true : false;
    }
    //this one is better.
    public function isAnagram($s, $t) 
    {
        $sLen = strlen($s);
        $tLen = strlen($t);
        $sArr = [];
        $tArr = [];
        for ($i=0; $i<$sLen; $i++) {
            isset($sArr[$s[$i]])? $sArr[$s[$i]]++ : ($sArr[$s[$i]]=1);
        }
        for ($i=0; $i<$tLen; $i++) {
            isset($tArr[$t[$i]])? $tArr[$t[$i]]++ : ($tArr[$t[$i]]=1);
        }
        return $sArr == $tArr;
    }
}
