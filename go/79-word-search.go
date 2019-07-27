package main

var direction = [][]int{
	{0, -1},
	{1, 0},
	{0, 1},
	{-1, 0},
}
var visited [][]bool
var row, col int

func exist(board [][]byte, word string) bool {
	row = len(board)
	col = len(board[0])
	visited = make([][]bool, row)
	//init visited
	for i := 0; i < row; i++ {
		visited[i] = make([]bool, col)
	}
	for j := 0; j < row; j++ {
		for k := 0; k < col; k++ {
			if wordExist(board, word, j, k, 0) {
				return true
			}
		}
	}
	return false
}

func wordExist(board [][]byte, word string, x, y, index int) bool {
	c := byte(word[index : index+1][0])
	if index == len(word)-1 {
		return c == board[x][y]
	}
	if c != board[x][y] {
		return false
	}
	// four direction search
	visited[x][y] = true
	for d := 0; d < 4; d++ {
		nextX := x + direction[d][0]
		nextY := y + direction[d][1]
		if inBoard(nextX, nextY) && !visited[nextX][nextY] {
			if wordExist(board, word, nextX, nextY, index+1) {
				return true
			}
		}
	}
	visited[x][y] = false
	return false
}

func inBoard(x, y int) bool {
	if x < 0 || y < 0 || x > row-1 || y > col-1 {
		return false
	}
	return true
}
