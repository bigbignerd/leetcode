<?php
class Solution 
{
    /**
     * @param Integer[] $A
     * @param Integer[] $B
     * @param Integer[] $C
     * @param Integer[] $D
     * @return Integer
     */
    public function fourSumCount($A, $B, $C, $D) 
	{
        $map = [];
        $count = 0;
        foreach ($C as $cv) {
            foreach ($D as $dv) {
                if (!isset($map[$cv+$dv])) {
                    $map[$cv+$dv] = 1;
                } else {
                    $map[$cv+$dv]++;
                }
            }
        }
        foreach ($A as $av) {
            foreach ($B as $bv) {
				// -($av + $bv) faster than 0-$av-$bv
                $need = 0 - ($av + $bv);
                if (isset($map[$need])) {
                    $count += $map[$need];
                }
            }
        }
        return $count;
    }
}
