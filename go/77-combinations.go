package main

func combine(n int, k int) [][]int {
	res := [][]int{}

	if k == 0 || n == 0 || k > n {
		return res
	}
	helper(n, k, 1, []int{}, &res)

	return res
}

func helper(n, k, start int, el []int, res *[][]int) {
	if len(el) == k {
		copyEl := make([]int, len(el))
		copy(copyEl, el)
		*res = append(*res, copyEl)
		return
	}
	for i := start; i <= n; i++ {
		helper(n, k, i+1, append(el, i), res)
	}
}
