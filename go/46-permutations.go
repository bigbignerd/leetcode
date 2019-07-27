package main

var res [][]int = make([][]int, 0)

func permute(nums []int) [][]int {
	res = [][]int{}
	comb(nums, []int{})
	return res
}

func comb(nums []int, val []int) {
	if len(nums) == 1 {
		n := nums[0]
		r := append(val, n)
		copyVal := make([]int, len(r))
		copy(copyVal, r)
		res = append(res, copyVal)
		return
	}
	for k, v := range nums {
		sliceNums := make([]int, k)
		copy(sliceNums, nums[0:k])
		sliceNums = append(sliceNums, nums[k+1:]...)
		comb(sliceNums, append(val, v))
	}
}
