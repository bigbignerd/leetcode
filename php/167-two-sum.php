<?php
class Solution 
{
    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
	//利用有序性，利用对撞指针
    public function twoSum($numbers, $target) 
	{
        $count = count($numbers);
        $i = 0;
        $j = $count - 1;
        while ($i < $j) {
            $value = $numbers[$i] + $numbers[$j];
            if ($value == $target) {
                return [$i+1, $j+1];
            } else if ($value < $target) {
                $i++;
            } else {
                $j--;
            }
        }
		throw new \Exception("invalide arguments");
    }
	//用二分查找
	public function twoSumV2($numbers, $target)
	{
		$count = count($numbers);
		for ($i = 0; $i < $count; $i++) {
			$need = $target - $numbers[$i];
			if (($j = $this->binarySearch($numbers, $need, $i+1, $count-1)) > -1) {
				return [$i+1, $j+1]; 
			}
		}
	}
	private function binarySearch($numbers, $target, $start, $end)
	{
		while ($start <= $end) {
			$middle = intval(($end-$start)/2) + $start;
			if ($numbers[$middle] == $target) {
				return $middle;
			} else if ($numbers[$middle] > $target) {
				$end = $middle-1;
			} else {
				$start = $middle+1;
			}
		}
		return -1;
	}
}

//test
$numbers = [2,3,4];
$target = 6;
$s = new Solution();

var_dump($s->twoSumV2($numbers, $target));
