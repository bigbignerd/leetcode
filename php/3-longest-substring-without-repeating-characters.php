<?php
class Solution 
{
    private $freq = [];
    /**
     * @param String $s
     * @return Integer
     */
    public function lengthOfLongestSubstring($s) 
    {
        $i = 0;
        $j = -1;
        $len = strlen($s);
        $maxLen = 0;
        while ($i < $len) {
            if ($j+1 < $len && $this->getFreq($s[$j+1]) == 0) {
                $this->freq[$s[++$j]]++;
            } else {
                $this->freq[$s[$i++]]--;
            }
            $maxLen = max($maxLen, $j-$i+1);
        }
        return $maxLen;
    }
    
    private function getFreq($s)
    {
        if (!isset($this->freq[$s])) {
            $this->freq[$s] = 0;
        }
        return $this->freq[$s];
    }
}

//test
$str  = "abcabcbb";
$s = new Solution();
echo $s->lengthOfLongestSubstring($str);

