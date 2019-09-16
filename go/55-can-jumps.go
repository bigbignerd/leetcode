package main

func canJump(nums []int) bool {
	var curMax = nums[0]
	for i := 0; i < len(nums); i++ {
		if i > curMax {
			return false
		}
		curMax = int(math.Max(float64(nums[i]+i), float64(curMax)))
	}
	return true
}
