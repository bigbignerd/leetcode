package main

func setZeroes(matrix [][]int) {
	row := []int{}
	col := []int{}
	rlen := len(matrix)
	clen := len(matrix[0])
	for i := 0; i < rlen; i++ {
		for j := 0; j < clen; j++ {
			if matrix[i][j] == 0 {
				row = append(row, i)
				col = append(col, j)
			}
		}
	}
	for i := 0; i < len(row); i++ {
		for j := 0; j < clen; j++ {
			matrix[row[i]][j] = 0
		}
	}
	for i := 0; i < len(col); i++ {
		for j := 0; j < rlen; j++ {
			matrix[j][col[i]] = 0
		}
	}
}
