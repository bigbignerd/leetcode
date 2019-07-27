package main

func combinationSum(candidates []int, target int) [][]int {
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
	if 0 == target {
		*res = append(*res, append([]int{}, el...))
		return
	}
	for i := start; i < len(candidates); i++ {
		if target-candidates[i] < 0 {
			continue
		}
		helper(candidates, target-candidates[i], i, append(el, candidates[i]), res)
	}
}
