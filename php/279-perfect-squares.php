<?php
class Solution {
    private $map = [];
    /**
     * @param Integer $n
     * @return Integer
     */
    function numSquares($n) {
        if (isset($this->map[$n])) {
            return $this->map[$n];
        }
        $min = $n;
        $i = 1;
        while (pow($i, 2) <= $n) {
            $leftNum = $n - pow($i, 2);
            $min = min($min, $this->numSquares($leftNum)+1);
            $i++;
        }
        $this->map[$n] = $min;
        return $min;
    }
    //faster
    function numSquares2($n) {
        while($n % 4 ==0){
            $n/=4;
        }
        if($n%8==7){
            return 4;
        }
        for($i = 0; $i*$i <= $n; $i++){
            $j = floor(sqrt($n - $i*$i));
            if ($i*$i+$j*$j==$n){
                return !!$i + !!$j;
            }
        }
        return 3;        
    }
}
