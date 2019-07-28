package main

func solveSudoku(board [][]byte) {
	slove(&board, 0, 0)
}
func slove(board *[][]byte, x, y int) bool {
	if x == 9 {
		return true
	}
	if y >= 9 {
		return slove(board, x+1, 0)
	}
	for i := 1; i <= 9; i++ {
		if (*board)[x][y] == '.' {
			(*board)[x][y] = strconv.Itoa(i)[0]
			if valid(board, x, y) {
				if slove(board, x, y+1) {
					return true
				}
			}
			(*board)[x][y] = '.'
		} else {
			return slove(board, x, y+1)
		}
	}
	return false
}

func valid(board *[][]byte, x, y int) bool {
	for row := 0; row < 9; row++ {
		if row != x && (*board)[row][y] == (*board)[x][y] {
			return false
		}
	}
	for col := 0; col < 9; col++ {
		if col != y && (*board)[x][col] == (*board)[x][y] {
			return false
		}
	}

	for row := x / 3 * 3; row < x/3*3+3; row++ {
		for col := y / 3 * 3; col < y/3*3+3; col++ {
			if x != row && y != col && (*board)[x][y] == (*board)[row][col] {
				return false
			}
		}
	}
	return true
}
