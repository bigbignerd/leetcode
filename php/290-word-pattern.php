<?php
class Solution 
{
    /**
     * @param String $pattern
     * @param String $str
     * @return Boolean
     */
    public function wordPattern($pattern, $str) 
    {
        //empty $pattern
        if (empty($pattern)){
            $pArr = [];
        } else {
            $pArr = str_split($pattern);
        }
        //string to array
        $sArr = explode(" ", $str);
        $pLen = count($pArr);
        $sLen = count($sArr);

        if ($pLen != $sLen) {
            return false;
        }

        $map = [];
        $i = 0;
        while ($i < $pLen) {
            if (!isset($map[$pArr[$i]])) {
                if (in_array($sArr[$i], $map)) {
                    return false;
                }
                $map[$pArr[$i]] = $sArr[$i];
            } else if ($map[$pArr[$i]] != $sArr[$i]) {
                return false;
            }
            $i++;
        }
        return true;
    }
}

//test
$s = new Solution();
$pattern = "abba";
$str = "dog cat cat dog";
var_dump($s->wordPattern($pattern, $str));




