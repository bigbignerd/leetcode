<?php

class Solution 
{
    /**
     * 有字符串s，有字符串t
     * 关键问题：滑动窗口内，如何判断是否包含t
     * 策略：维护两个和, t的和滑动窗口内的s
     * 判断：如果窗口满足>=和，说明找到了一个包含子串的窗口，保存起始索引，左侧继续右移一个
     * 如果被右移的字符属于t中的字符，s要--
     */
    public function minWindow($s, $t) 
    {
        $sMap = [];
        $tMap = [];
        $tSum = 0;
        $sSum = 0;
        $sLen = strlen($s);
        $tLen = strlen($t);
        for ($i=0; $i<$tLen; $i++) {
            if (!isset($tMap[$t[$i]])) {
                $tMap[$t[$i]] = 0;
            }
            $tMap[$t[$i]]++;
            //important for s="aa" t="aa" expect "aa"
            if ($tMap[$t[$i]] == 1) {
                $tSum += 1;
            }
        }
        $left = $right = 0;
        $lIndex = $rIndex = -1;
        while ($left < $sLen) {
            //right move
            while ($right < $sLen && $sSum < $tSum) {
                $character = $s[$right];
                $this->setMap($sMap, $character);
                if ($tMap[$character] == $sMap[$character]) {
                    $sSum++;
                }
                $right++;
            }
            if ($sSum == $tSum) {
                if ($lIndex == -1 || $right-$left < $rIndex-$lIndex) {
                    $lIndex = $left;
                    $rIndex = $right;
                }
            }
            //left move
            $sMap[$s[$left]]--;
            if (isset($tMap[$s[$left]]) && $sMap[$s[$left]] == $tMap[$s[$left]]-1) {
                $sSum--;
            }
            $left++;
        }
        if ($lIndex == -1 || $rIndex == -1) {
            return "";
        } else {
            return substr($s, $lIndex, $rIndex-$lIndex);
        }
    }

    private function setMap(&$sMap, $c)
    {
        if (!isset($sMap[$c])) {
            $sMap[$c] = 0;
        }
        $sMap[$c]++;
    }
}

//test
$solution = new Solution();
$s = "ab";
$t = "a";
//$s = "ADOBECODEBANC";
//$t = "ABC";
//$s = "aa";
//$t = "aa";
echo $solution->minWindow($s, $t);

