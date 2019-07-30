package main

func removeElement(nums []int, val int) int {
	count := -1
	for i := 0; i < len(nums); i++ {
		if nums[i] != val {
			count++
			nums[count] = nums[i]
		}
	}
	return count + 1
}
