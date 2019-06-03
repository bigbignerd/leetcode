<?php
class Solution 
{
    /**
     * @param String $s
     * @param String $p
     * @return Integer[]
     */
    public function findAnagrams($s, $p) 
    {
        $sLen = strlen($s);
        $pLen = strlen($p);
        $vs = array_fill(0, 26, 0);
        $vp = array_fill(0, 26, 0);
        for ($i=0; $i<$pLen; $i++) {
            $vp[ord($p[$i])-ord('a')]++;
        }
        $index = [];
        for ($i=0; $i<$sLen; $i++) {
            if ($i >= $pLen) {
                $vs[ord($s[$i-$pLen])-ord('a')]--;
            }
            $vs[ord($s[$i])-ord('a')]++;
            if ($vs == $vp) {
                $index[] = $i-$pLen+1;
            }
        }
        return $index;
    }
}

//test
$s = new Solution();
var_dump($s->findAnagrams("cbaebabacd", "abc"));
