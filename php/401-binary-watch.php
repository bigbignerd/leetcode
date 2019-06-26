<?php
class Solution {
    private $result = [];
    private $map = [
        '1' => 8,
        '2' => 4,
        '3' => 2,
        '4' => 1,
        '5' => 32,
        '6' => 16,
        '7' => 8,
        '8' => 4,
        '9' => 2,
        '10' => 1,
    ];
    /**
     * @param Integer $num
     * @return String[]
     */
    function readBinaryWatch($num) {
        if ($num == 0) {
            return ["0:00"];
        }
        $this->helper($num, 1, []);
        return $this->result;
    }
    function helper($num, $start, $pos) {
        $count = count($pos);
        if ($count == $num) {
            $time = $this->getTime($pos);
            if ($time) {
                $this->result[] = $time;
            }
            return;
        }
        for ($i = $start; $i <= 10; $i++) {
            array_push($pos, $i);
            $this->helper($num, $i+1, $pos);
            array_pop($pos);
        }
    }
    function getTime($pos) {
        $hour = 0;
        $minute = 0;
        $str = '';
        foreach ($pos as $k => $v) {
            if ($v <= 4) {
                $hour += $this->map[$v];
            } else {
                $minute += $this->map[$v];
            }
        }
        if ($hour >= 12 || $minute >= 60) {
            return false;
        }
        
        $str .= $hour . ':';
        if ($minute < 10 && $minute > 0) {
            $str .= '0'.$minute;
        } else if ($minute == 0) {
            $str .= '00';
        } else {
            $str .= $minute;
        }
        return $str;
    }
}
