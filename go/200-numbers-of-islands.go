package main

var direction [][]int = [][]int{
	{1, 0},
	{0, -1},
	{-1, 0},
	{0, 1},
}
var visited [][]bool
var row, col int

func numIslands(grid [][]byte) int {
	if len(grid) == 0 {
		return 0
	}
	row = len(grid)
	col = len(grid[0])
	//init visited
	visited = make([][]bool, row)
	for i := 0; i < row; i++ {
		visited[i] = make([]bool, col)
	}
	count := 0
	for j := 0; j < row; j++ {
		for k := 0; k < col; k++ {
			if grid[j][k] == '1' && !visited[j][k] {
				count++
				dfs(&grid, j, k)
			}
		}
	}
	return count
}

func dfs(grid *[][]byte, x, y int) {
	visited[x][y] = true
	for i := 0; i < 4; i++ {
		nextX := x + direction[i][0]
		nextY := y + direction[i][1]
		if inArea(nextX, nextY) && !visited[nextX][nextY] && (*grid)[nextX][nextY] == '1' {
			dfs(grid, nextX, nextY)
		}
	}
}
func inArea(x, y int) bool {
	if x < 0 || x >= row || y < 0 || y >= col {
		return false
	}
	return true
}
