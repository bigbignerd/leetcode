<?php
class Solution {
    private $data = [];
    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k) {
        if ($k == 0 || $n == 0 || $k > $n) {
            return [];
        }
        $this->helper($n, $k, 1, []);
        return $this->data;
    }
    function helper($n, $k, $start, $res) {
        $cnt = count($res);
        if ($cnt == $k) {
            $this->data[] = $res;
            return;
        }
        // $i < $n-($k-$cnt) + 1,如果start的位置后面没有足够的元素了，就是无意义的循环
        //如 n=10, k = 6 那么start = 5及以后就都没有意义，因为不可能找够六个元素的
        for ($i = $start; $i <= $n - ($k-$cnt)+1; $i++) {
            array_push($res, $i);
            $this->helper($n, $k, $i+1, $res);
            array_pop($res);
        }
    }
}
