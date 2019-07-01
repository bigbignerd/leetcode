<?php
class Solution {

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    function uniquePathsWithObstacles($obstacleGrid) {
        $m = count($obstacleGrid);
        $n = count($obstacleGrid[0]);
        
        $counts[0][0] = 1;
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($obstacleGrid[$i][$j] == 1) {
                    $counts[$i][$j] = 0;
                    continue;
                }
                $left = $counts[$i-1][$j]?? 0;
                $up = $counts[$i][$j-1]?? 0;
                if (!isset($counts[$i][$j])) {
                    $counts[$i][$j] = $left + $up;
                }
            }
        }
        return $counts[$m-1][$n-1];
    }
}
