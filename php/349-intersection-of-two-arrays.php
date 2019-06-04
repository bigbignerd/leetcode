<?php
class Solution 
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    public function intersection($nums1, $nums2) 
    {
        $result = [];
        foreach ($nums2 as $k => $v) {
            if (in_array($v, $nums1)) {
                $result[$v] = $v;
            }
        }
        return $result;
    }
    // if array is sorted
    public function intersection2($nums1, $nums2)
    {
        $result = [];
        foreach ($nums1 as $k => $v) {
            if ($this->binarySearch($nums2, $v)) {
                $result[] = $v;
            }
        }
        return $result;
    }
    private function binarySearch(&$arr, $search)
    {
        $start = 0;
        $end = count($arr) - 1;
        while ($start <= $end) {
            $middle = $start + intval(($end-$start)/2);
            if ($arr[$middle] == $search) {
                return true;
            } else if ($arr[$middle] < $search) {
                $start = $middle+1;
            } else {
                $end = $middle-1;
            }
        }
        return false;
    }
}

//test
$nums1 = [1,2,2,1]; 
$nums2 = [2,2];
$nums1 = [1,1,2,2];
$nums2 = [2, 2];

$s = new Solution();
var_dump($s->intersection2($nums1, $nums2));

