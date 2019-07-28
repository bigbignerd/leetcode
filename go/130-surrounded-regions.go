package main

var direction [][]int = [][]int{
	{1, 0},
	{0, -1},
	{-1, 0},
	{0, 1},
}
var visited [][]bool
var row, col int

func solve(board [][]byte) {
	if len(board) == 0 {
		return
	}
	row = len(board)
	col = len(board[0])
	//init visited
	visited = make([][]bool, row)
	for i := 0; i < row; i++ {
		visited[i] = make([]bool, col)
	}
	//mark border 'O'
	for j := 0; j < row; j++ {
		for k := 0; k < col; k++ {
			if board[j][k] == 'O' && onBorder(j, k) {
				dfs(&board, j, k)
			}
		}
	}
	//visited potin set to 'X'
	for i := 0; i < row; i++ {
		for j := 0; j < col; j++ {
			if !visited[i][j] {
				board[i][j] = 'X'
			}
		}
	}
	return
}
func dfs(board *[][]byte, x, y int) {
	if (*board)[x][y] == 'X' {
		return
	}
	visited[x][y] = true
	for i := 0; i < 4; i++ {
		nextX := x + direction[i][0]
		nextY := y + direction[i][1]
		if inArea(nextX, nextY) && !visited[nextX][nextY] {
			dfs(board, nextX, nextY)
		}
	}
}
func inArea(x, y int) bool {
	if x < 0 || x >= row || y < 0 || y >= col {
		return false
	}
	return true
}
func onBorder(x, y int) bool {
	return x == 0 || x == row-1 || y == 0 || y == col-1
}
