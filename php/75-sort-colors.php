<?php
class Solution {
    /**
     * @param Integer[] $nums
     * @return NULL
     */
    public function sortColors(&$nums) {
        $record = [
            '0' => 0,
            '1' => 0,
            '2' => 0,
        ];
        foreach ($nums as $k => $num) {
			if (!isset ($record[$num])) {
				throw new \Exception("wrong test data");
			}
            $record[$num] += 1;
        }
        $index = 0;
        foreach ($record as $number => $count) {
            while ($count-- > 0) {
                $nums[$index++] = $number;
            }
        }
    }
	/**
     * sort 3 ways
     */
	public function sortColorsV2(&$nums) {
		$n = count($nums);
		$zero = -1;
		$i = 0;
		$two = $n;
		while ($i < $two) {
			$value = $nums[$i];
			if ($value == 1) {
				$i++;
			} else if ($value == 0) {
				$this->swap($nums[$zero+1], $nums[$i]);
				$zero++;
				$i++;
			} else {
				$this->swap($nums[$two-1], $nums[$i]);
				$two--;
			}
		}
	}

	private function swap(&$a, &$b) {
		list($a, $b) = [$b, $a];
	}
}

//test
$nums = [2,0,2,1,1,0];
$nums = [1,2,0];
$s = new Solution();
$s->sortColorsV2($nums);
var_dump($nums);




