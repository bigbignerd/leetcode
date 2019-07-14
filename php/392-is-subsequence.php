<?php
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t) {
        $lens = strlen($s);
        $lent = strlen($t);
        
        $si = $ti = 0;
        $flag = 0;
        while ($ti < $lent && $si < $lens) {
            if ($t[$ti] == $s[$si]) {
                $si++;
                $flag++;
            }
            $ti++;
        }
        return ($flag == $lens)? true : false;
    }
}
