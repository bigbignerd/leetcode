<?php
class Solution 
{
    /**
     * @param String $s
     * @return String
     */
    public function reverseVowels($s) 
	{
        $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
        $len = strlen($s);
        $i = 0;
        $j = $len - 1;
        while ($i < $j) {
            $si = $s[$i];
            $sj = $s[$j];
            if (!in_array($si, $vowels)) {
                $i++;
                continue;
            }
            if (!in_array($sj, $vowels)) {
                $j--;
                continue;
            }
            list($s[$i], $s[$j]) = [$s[$j], $s[$i]];
            $i++;
            $j--;
        }
        return $s;
    }
}

//test 
$s = new Solution();
$str = 'hello';
var_dump($s->reverseVowels($str));


