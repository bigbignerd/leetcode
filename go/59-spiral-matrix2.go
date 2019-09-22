package main

func generateMatrix(n int) [][]int {
	var res [][]int = make([][]int, n)
	for i := 0; i < n; i++ {
		res[i] = make([]int, n)
	}
	left := 0
	right := n - 1
	top := 0
	bottom := n - 1
	num := 1
	steps := 0
	for steps < n*n {
		for i := left; i <= right; i++ {
			res[top][i] = num
			num++
			steps++
		}
		top++
		for i := top; i <= bottom; i++ {
			res[i][right] = num
			num++
			steps++
		}
		right--
		for i := right; i >= left; i-- {
			res[bottom][i] = num
			num++
			steps++
		}
		bottom--
		for i := bottom; i >= top; i-- {
			res[i][left] = num
			num++
			steps++
		}
		left++
	}
	return res
}
