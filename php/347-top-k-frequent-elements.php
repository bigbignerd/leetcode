<?php
class Solution 
{
    private $queue = [];
    private $cap = 0;
    private $k = 0;
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    public function topKFrequent($nums, $k) 
    {
        $freq = [];
        foreach ($nums as $num) {
            if (!isset($freq[$num])) {
                $freq[$num] = 1;
            } else {
                $freq[$num]++;
            }
        }
        arsort($freq);
        $result = [];
        foreach ($freq as $n => $f) {
            if (count($result) < $k) {
                $result[] = $n;
            } else {
                break;
            }
        }
        return $result;
    }
    public function topKFrequent2($nums, $k) 
    { 
        $freq = [];
        $this->k = $k;
        foreach ($nums as $num) {
            if (!isset($freq[$num])) {
                $freq[$num] = 0;
            }
            $freq[$num]++;
        }
        foreach ($freq as $n => $f) {
            $this->enqueue([$n, $f]);
        }
        $resut = [];
        foreach ($this->queue as $v) {
            $result[] = $v[0];
        }
        return $result;
    }
    public function enqueue($ele) 
    {
        $this->queue[] = $ele;
        usort($this->queue, ["Solution", "compare"]);
        $this->cap++;
        if ($this->cap > $this->k) {
            array_pop($this->queue);
        } 
        return true;
    }
    private static function compare($a, $b) 
    {
        if ($a[1] < $b[1]) {
            return 1;
        } else if($a[1] == $b[1]) {
            return 0;
        } else {
            return -1;
        }
    }
}
