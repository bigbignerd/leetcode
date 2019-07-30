package main

func searchRange(nums []int, target int) []int {
	left := 0
	right := len(nums) - 1
	pos := []int{-1, -1}
	for left <= right {
		middle := (left + right) >> 1
		if nums[middle] == target {
			searchLeft := middle
			for searchLeft-1 >= 0 && nums[searchLeft-1] == target {
				searchLeft--
			}
			pos[0] = searchLeft
			searchRight := middle
			for searchRight+1 <= right && nums[searchRight+1] == target {
				searchRight++
			}
			pos[1] = searchRight
			return pos
		} else if nums[middle] < target {
			left = middle + 1
		} else {
			right = middle - 1
		}
	}
	return pos
}
