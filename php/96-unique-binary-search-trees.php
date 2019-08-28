<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function numTrees($n) {
        $res[0] = $res[1] = 1;
        for ($i = 2; $i <= $n; $i++) {
            for ($j = 0; $j < $i; $j++) {
                // i 个元素分别以j为根，左子树的情况 * 右子树的情况 相加
                $res[$i] += $res[$j] * $res[$i - $j - 1];
            }
        }
        return $res[$n];
    }
}
