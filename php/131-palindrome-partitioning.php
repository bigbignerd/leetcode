<?php
class Solution {
    private $data = [];
    /**
     * @param String $s
     * @return String[][]
     */
    function partition($s) {
        if (empty($s)) {
            return [];
        }
        $this->helper($s, 0, []);
        return $this->data;
    }
    function helper($s, $start, $res) {
        $len = strlen($s);
        if ($start == $len) {
            $this->data[] = $res;
        }
        for ($i = $start; $i < $len; $i++) {
            $str = substr($s, $start, $i-$start+1);
            if ($this->isPal($str)) {
                array_push($res, $str);
                $this->helper($s, $i+1, $res);
                array_pop($res);
            }
        }
    }
    function isPal($s) {
        $len = strlen($s);
        if ($len == 0) {
            return false;
        }
        if ($len == 1) {
            return true;
        }
        $start = 0;
        $end = $len - 1;
        while ($start < $end) {
            if ($s[$start] != $s[$end]) return false;
            $start++;
            $end--;
        }
        return true;
    }
    
}
