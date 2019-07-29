package main

func rob(nums []int) int {
	record := make(map[int]int, len(nums))
	record[-1] = 0
	record[-2] = 0
	for i := 0; i < len(nums); i++ {
		record[i] = int(math.Max(float64(record[i-1]), float64(record[i-2]+nums[i])))
	}
	return record[len(nums)-1]
}
