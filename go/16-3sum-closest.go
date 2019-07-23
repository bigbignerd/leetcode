package main

import "sort"
import "math"

func threeSumClosest(nums []int, target int) int {
	var curDiff int = 1 << 32
	var result int
	sort.Ints(nums)
	for i := 0; i < len(nums); i++ {
		if i > 0 && nums[i] == nums[i-1] {
			continue
		}
		v1 := nums[i]
		left := i + 1
		right := len(nums) - 1
		for left < right {
			sum := nums[left] + nums[right] + v1
			if sum == target {
				return sum
			} else {
				if diff := int(math.Abs(float64(sum - target))); diff < curDiff {
					curDiff = diff
					result = sum
				}
			}
			if sum < target {
				left++
				for left < right && nums[left] == nums[left-1] {
					left++
				}
			} else {
				right--
				for right > left && nums[right] == nums[right+1] {
					right--
				}
			}
		}
	}
	return result
}
