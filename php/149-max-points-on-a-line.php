<?php
class Solution 
{
    /**
     * @param Integer[][] $points
     * @return Integer
     */
    public function maxPoints($points) 
    {
        $max = 0;
        $count = count($points);
        for ($i = 0; $i < $count; $i++) {
            $duplicate = 1;
            for ($j = $i+1; $j < $count; $j++) {
                $start = 0;
                $cnt = 0;
                $x1 = $points[$i][0]; 
                $y1 = $points[$i][1];
                $x2 = $points[$j][0];
                $y2 = $points[$j][1];
                
                if ($x1 == $x2 && $y1 == $y2) {
                    $duplicate++;
                    continue;
                }
                while ($start < $count) {
                    $x = $points[$start][0];
                    $y = $points[$start][1];
                    if ($this->onLine($x1, $x2, $y1, $y2, $x, $y)) {
                        $cnt++;
                    }
                    $start++;
                }
                $max = max($max, $cnt);
            }
            $max = max($max, $duplicate);
        }
        return $max;
    }
    public function onLine($x1, $x2, $y1, $y2, $x, $y) 
    {
        return ($y-$y2)*($x1-$x2) == ($x-$x2)*($y1-$y2);
    }
}
