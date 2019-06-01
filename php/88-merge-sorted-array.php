<?php
class Solution {
    private $zeroIndex;
    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    public function merge(&$nums1, $m, $nums2, $n) {
        $this->zeroIndex = $m;
        $nIndex = 0;
        for ($i = 0; $i < $m+$n; $i++) {
            if ($nIndex >= $n) {
                break;
            }
            if ($nums1[$i] >= $nums2[$nIndex]) {
                $this->move($nums1, $i);
                $nums1[$i] = $nums2[$nIndex];
                $nIndex++;
            }
        }
        while ($nIndex < $n) {
            $nums1[$this->zeroIndex++] = $nums2[$nIndex++];
        }
    }
	private function move(&$nums1, $start) {
        $i = $this->zeroIndex;
        while ($i > $start) {
            $nums1[$i] = $nums1[$i-1];
            $i--;
        }
        $this->zeroIndex++;
    }

	//from end to start
	public function mergeV2(&$nums1, $m, $nums2, $n) {
		$curIndex = $m + $n - 1;
		$i = $m - 1;
		$j = $n - 1;
		while ($i >= 0 && $j >= 0) {
				$nums1[$curIndex--] = ($nums1[$i] > $nums2[$j])? $nums1[$i--]  : $nums2[$j--];
		}
		while ($j >= 0) {
			$nums1[$curIndex--] = $nums2[$j--];
		}
	}
	public function mergeV3(&$nums1, $m, $nums2, $n) {
		$curIndex = $m + $n - 1;
		$i = $m - 1;
		$j = $n - 1;
		while ($j >= 0) {
			$nums1[$curIndex--] = ($i >= 0 && $nums1[$i] > $nums2[$j])? $nums1[$i--]  : $nums2[$j--];
		}
	}
    
}

//test
$s = new Solution();
$nums1 = [4];
$nums2 = [1,2,3,5,6];
$s->mergeV3($nums1, 1, $nums2, 5);
var_dump($nums1);
