<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return String[]
     */
    function summaryRanges($nums) {
        $count = count($nums);
        if ($count == 0) {
            return [];
        }
        $res = [];
        $start = [];
        for ($i = 0; $i < $count; $i++) {
            if ($nums[$i] != end($start) + 1 && !empty($start)) {
                if (count($start) > 2) {
                    $start = [$start[0], end($start)];
                }
                $res[] = implode('->', $start);
                $start = [];
            }
            $start[] = $nums[$i];
        }
        if (!empty($start)) {
            if (count($start) > 2) {
                $start = [$start[0], end($start)];
            }
            $res[] = implode('->', $start);
        }
        return $res;
    }
}
