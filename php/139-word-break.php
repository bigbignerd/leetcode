<?php
class Solution {
    private $memo = [];
    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict) {
        if (isset($this->memo[$s])) {
            return $this->memo[$s];
        }
        if (in_array($s, $wordDict)) {
            return true;
        }
        $len = strlen($s);
        for ($i = 1; $i < $len; $i++) {
            $left = substr($s, 0, $i);
            if (in_array($left, $wordDict)) {
                $right = substr($s, $i);
                if ($this->wordBreak($right, $wordDict)) {
                    return true;
                }
            }
        }
        $this->memo[$s] = false;
        return false;
    }
}

