<?php
class Solution {
    private $data = [];
    /**
     * @param String $s
     * @return String[]
     */
    function restoreIpAddresses($s) {
        if (strlen($s) < 4) {
            return [];
        }
        $this->getIp($s, 1);
        return $this->data;
    }
    function getIp($s, $idx, $arr = []) {
        // idx represent xth part       
        if ($idx == 5) {
            if ($s === false || strlen($s) > 0) {
                return;
            }
            $this->data[] = implode(".", $arr);
            return;
        }
        for ($i = 1; $i <= 3; $i++) {
            $numStr = substr($s, 0, $i);
            $num = intval($numStr);
            // avoid 000 0xx 00x
            if (strlen($numStr) > strlen($num."")) {
                continue;
            }
            if ($num >= 0 && $num <= 255) {
                $temp = $arr;
                $temp[] = $num;
                $this->getIp(substr($s, $i), $idx+1, $temp);
            }
        }
    }
}
