package main

func isValidSudoku(board [][]byte) bool {
	r := len(board)
	c := len(board[0])
	row := make(map[int]map[int]bool, r)
	col := make(map[int]map[int]bool, c)
	cell := make(map[int]map[int]bool, 9)
	for i := 0; i < r; i++ {
		row[i] = make(map[int]bool, c)
		col[i] = make(map[int]bool, c)
		cell[i] = make(map[int]bool, 9)
	}
	for i := 0; i < r; i++ {
		for j := 0; j < c; j++ {
			if board[i][j] == '.' {
				continue
			}
			v := int(board[i][j]) - 1
			if exist, ok := row[i][v]; ok && exist {
				return false
			}
			if exist, ok := col[j][v]; ok && exist {
				return false
			}
			cellN := 3*(i/3) + (j / 3)
			if exist, ok := cell[cellN][v]; ok && exist {
				return false
			}
			row[i][v] = true
			col[j][v] = true
			cell[cellN][v] = true
		}
	}
	return true
}
