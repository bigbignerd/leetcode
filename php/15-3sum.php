<?php
class Solution 
{
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    public function threeSum($nums) 
    {
        $len = count($nums);
        sort($nums);
        $k = 0;
        $result = [];
        while ($k < $len) {
            if ($k > 0 && $nums[$k-1] > 0) break;
            $i = $k+1;
            $j = $len-1;
            $target = 0 - $nums[$k];
            if ($k > 0 && $nums[$k] == $nums[$k-1]) {
                $k++;
                continue;
            }
            while ($i < $j) {
                if ($nums[$i]+$nums[$j] == $target) {
                    $result[] = [$nums[$k], $nums[$i], $nums[$j]];
                    while ($i < $j && $nums[$i] == $nums[$i+1]) $i++;
                    while ($j > $i && $nums[$j] == $nums[$j-1]) $j--;
                    $i++;
                    $j--;
                } else if ($nums[$i]+$nums[$j] < $target) {
                    $i++;
                } else {
                    $j--;
                }
            }
            $k++;
        }

        return $result;
    }
    public function threeSum2($nums)
    {
        $result = [];
        $count = count($nums);
        $map = $this->getMap($nums);
        for ($i=0; $i<$count-2; $i++) {
            $j = $i+1;
            while ($j < $count) {
                $need = 0 - $nums[$i] - $nums[$j];
                $temp = [$nums[$i], $nums[$j], $need];
                $key = $this->getResultKey($temp);
                if (isset($map[$need]) && !isset($result[$key])) {
                    foreach ($map[$need] as $k) {
                        if ($k != $i && $k != $j) {
                            $result[$key] = $temp;
                        }
                    }
                }
                $j++;
            }
        }
        return $result;
    }
    private function getResultKey($arr)
    {
        asort($arr);
        $key = '';       
        foreach ($arr as $v) {
            if ($v < 0) {
                $key .= '_';
                $v = -$v;
            } 
            $key .= $v;
        }
        return $key;
    }
    private function getMap($nums)
    {
        $map = [];
        foreach ($nums as $k => $v) {
            if (!isset($map[$v])) {
                $map[$v] = [$k];
            } else {
                $map[$v][] = $k;
            }
        }
        return $map;
    }
}




