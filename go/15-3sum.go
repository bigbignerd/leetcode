package main

import (
	"sort"
)

func threeSum(nums []int) [][]int {
	var res [][]int
	sort.Ints(nums)
	numLen := len(nums)

	for i := 0; i < numLen-2; i++ {
		if nums[i] > 0 {
			break
		}
		if i > 0 && nums[i] == nums[i-1] {
			continue
		}
		target := 0 - nums[i]
		left := i + 1
		right := numLen - 1
		for left < right {
			sum := nums[left] + nums[right]
			if sum == target {
				ele := []int{nums[i], nums[left], nums[right]}
				res = append(res, ele)
				left++
				right--
				for left < right && nums[left] == ele[1] {
					left++
				}
				for right > left && nums[right] == ele[2] {
					right--
				}
			} else if sum > target {
				right--
			} else {
				left++
			}
		}
	}
	return res
}
