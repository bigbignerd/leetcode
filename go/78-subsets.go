package main

func subsets(nums []int) [][]int {
	res := [][]int{}
	helper(nums, 0, []int{}, &res)
	return res
}
func helper(nums []int, start int, el []int, res *[][]int) {
	*res = append(*res, append([]int{}, el...))
	for i := start; i < len(nums); i++ {
		helper(nums, i+1, append(el, nums[i]), res)
	}
}
