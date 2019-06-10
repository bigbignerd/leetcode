<?php
class Solution 
{
    /**
     * @param Integer[][] $points
     * @return Integer
     */
    public function numberOfBoomerangs($points) 
    {
        $result = 0;
        foreach ($points as $k => $v) {
            //map
            $map = [];
            foreach ($points as $kk => $vv) {
                if ($kk != $k) {
                    $map[$this->getDistance($v, $vv)]++;
                }
            }
            foreach ($map as $m) {
                $result += $m * ($m-1);
            }
        }
        return $result;
    }
    private function getDistance($i, $j) 
    {
        return pow($i[0]-$j[0], 2) + pow($i[1]-$j[1], 2);
    }
}

//test
$s = new Solution();
echo $s->numberOfBoomerangs([[0,0],[1,0],[2,0]]);
