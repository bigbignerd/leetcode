package main

//第i行的皇后摆放位置
var rowQueen []int
var res [][]string

func totalNQueens(n int) int {
	if n == 0 {
		return 0
	}
	rowQueen = make([]int, n)
	for i := 0; i < n; i++ {
		rowQueen[i] = -1
	}
	res = [][]string{}
	startRow := 0
	putQueen(n, startRow)
	return len(res)
}

func putQueen(n, row int) {
	if row == n {
		// append to res
		queen := make([]string, 0)
		for i := 0; i < n; i++ {
			temp := ""
			for j := 0; j < n; j++ {
				if rowQueen[i] == j {
					temp += "Q"
				} else {
					temp += "."
				}
			}
			queen = append(queen, temp)
		}
		res = append(res, append([]string{}, queen...))
		return
	}
	for c := 0; c < n; c++ {
		if isSafe(n, row, c) {
			rowQueen[row] = c
			putQueen(n, row+1)
			rowQueen[row] = -1
		}
	}
}
func isSafe(n, row, curCol int) bool {
	for i := 0; i < row; i++ {
		colDiff := rowQueen[i] - curCol
		rowDiff := i - row
		if rowQueen[i] == curCol || math.Abs(float64(colDiff)) == math.Abs(float64(rowDiff)) {
			return false
		}
	}
	return true
}
