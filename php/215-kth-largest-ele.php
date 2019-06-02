<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k) {
        $count = count($nums);
        $left = 0;
        $right = $count-1;

        while (true) {
        	$index = $this->partition($nums, $left, $right);
			if ($index == $k - 1) {
				break;
			} else if ($index > $k-1) {
				$right = $index-1;
			} else {
				$left = $index+1;
			}
        }
        return $nums[$index];
    }
    function partition(&$nums, $left, $right) {
        $k = $left;
        $targetValue = $nums[$left];
        for ($i = $left+1; $i <= $right; $i++) {
            if ($nums[$i] >= $targetValue) {
                $this->swap($nums[$k+1], $nums[$i]);
                $k++;
            }
        }
        $this->swap($nums[$k], $nums[$left]);
        return $k;
    }
    private function swap(&$a, &$b) {
        list($a, $b) = [$b, $a];
    }
}

//test
$nums = [3,2,3,1,2,4,5,5,6];
$s = new Solution();
$value = $s->findKthLargest($nums, 4);
var_dump($value);




