package main

func spiralOrder(matrix [][]int) []int {
	if len(matrix) == 0 {
		return []int{}
	}
	left := 0
	right := len(matrix[0]) - 1
	top := 0
	bottom := len(matrix) - 1
	steps := 0
	total := len(matrix) * len(matrix[0])
	var res []int
	for left <= right && top <= bottom && steps <= total {
		for i := left; i <= right; i++ {
			res = append(res, matrix[top][i])
			steps++
		}
		top++
		for i := top; i <= bottom; i++ {
			res = append(res, matrix[i][right])
			steps++
		}
		right--
		for i := right; i >= left; i-- {
			res = append(res, matrix[bottom][i])
			steps++
		}
		bottom--
		for i := bottom; i >= top; i-- {
			res = append(res, matrix[i][left])
		}
		left++
	}
	return res[0:total]
}
