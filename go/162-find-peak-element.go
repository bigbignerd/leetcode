package main

func findPeakElement(nums []int) int {
	count := len(nums)
	if count <= 1 {
		return 0
	}
	i := 0
	for i < count {
		if i > 0 && nums[i-1] < nums[i] {
			if i+1 == count || nums[i+1] < nums[i] {
				return i
			}
		}
		i++
	}
	return 0
}
