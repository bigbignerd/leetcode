<?php
class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {
        $count = count($intervals);
        if ($count <= 1) {
            return $intervals;
        }
        sort($intervals);
        $res = [$intervals[0]];
        for ($i = 1; $i < $count; $i++) {
            $endIndex = count($res) - 1;
            if ($res[$endIndex][1] < $intervals[$i][0]) {
                $res[] = $intervals[$i];
            } else {

                $res[$endIndex][1] = max($res[$endIndex][1], $intervals[$i][1]);
            }
        }
        return $res;
    }
}
