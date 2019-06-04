<?php
class Solution 
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    public function findMedianSortedArrays($nums1, $nums2) 
    {
        $merge = [];
        $num1Len = count($nums1);
        $num2Len = count($nums2);
        $num1Index = $num2Index = 0;
        while ($num1Index < $num1Len || $num2Index < $num2Len) {
            if ($num1Index < $num1Len && $num2Index < $num2Len) {
                if ($nums1[$num1Index] < $nums2[$num2Index]) {
                    $merge[] = $nums1[$num1Index++];
                } else {
                    $merge[] = $nums2[$num2Index++];
                }
            } else if ($num1Index < $num1Len && $num2Index >= $num2Len) {
                $merge[] = $nums1[$num1Index++];
            } else {
                $merge[] = $nums2[$num2Index++];
            }
        }

        $total = $num1Len + $num2Len - 1;
        $median = intval($total / 2);
        $index1 = $index2 = -1;

        if ($total % 2 == 0) {
            $index1 = $index2 = $median;
        } else {
            $index1 = $median;
            $index2 = $median + 1;
        }
        return ($merge[$index1]+$merge[$index2]) / 2.0;
    }
}
