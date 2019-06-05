<?php
class Solution 
{
    /**
     * @param Integer $n
     * @return Boolean
     */
    public function isHappy($n) 
    {
        $map = [];
        while ($n != 1) {
            $n = $this->nextNum($n);
            if (isset($map[$n])) {
                return false;
            }
            $map[$n] = 1;
        }
        return true;
    }
    private function nextNum($n)
    {
        $sum = 0;
        while ($n) {
            $sum += ($n%10) * ($n%10);
            $n = intval($n/10);
        }
        return $sum;
    }
}

//test
$n = 19;
$s = new Solution();
var_dump($s->isHappy($n));
