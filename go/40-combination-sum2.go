package main

import "sort"

func combinationSum2(candidates []int, target int) [][]int {
	res := [][]int{}
	if len(candidates) == 0 {
		return res
	}
	sort.Ints(candidates)
	start := 0
	helper(candidates, target, start, []int{}, &res)

	return res
}
func helper(candidates []int, target int, start int, el []int, res *[][]int) {
	sum := getSum(el)
	if sum > target {
		return
	}
	if sum == target {
		copyEl := make([]int, len(el))
		copy(copyEl, el)
		*res = append(*res, el)
		return
	}
	for i := start; i < len(candidates); i++ {
		if i != start && candidates[i] == candidates[i-1] {
			continue
		}
		if sum+candidates[i] > target {
			continue
		}
		helper(candidates, target, i+1, append(el, candidates[i]), res)
	}
}
func getSum(el []int) int {
	sum := 0
	for _, v := range el {
		sum += v
	}
	return sum
}
