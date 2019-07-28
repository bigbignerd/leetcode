package main

func minPathSum(grid [][]int) int {
	row := len(grid)
	col := len(grid[0])
	max := 1 << 32
	for rk, row := range grid {
		for ck, _ := range row {
			up := max
			if rk-1 >= 0 {
				up = grid[rk-1][ck]
			}
			left := max
			if ck-1 >= 0 {
				left = grid[rk][ck-1]
			}
			min := int(math.Min(float64(left), float64(up)))
			if min == max {
				min = 0
			}
			grid[rk][ck] += min
		}
	}

	return grid[row-1][col-1]
}
