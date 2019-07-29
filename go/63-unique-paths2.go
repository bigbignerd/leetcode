package main

func uniquePathsWithObstacles(obstacleGrid [][]int) int {
	m := len(obstacleGrid)
	n := len(obstacleGrid[0])

	record := make(map[int]map[int]int, m)
	for i := 0; i < m; i++ {
		record[i] = make(map[int]int, n)
	}
	record[0][0] = 1
	for i := 0; i < m; i++ {
		for j := 0; j < n; j++ {
			left := 0
			up := 0
			if obstacleGrid[i][j] == 1 {
				record[i][j] = 0
				continue
			}
			if l, ok := record[i-1][j]; ok {
				left = l
			}
			if u, ok := record[i][j-1]; ok {
				up = u
			}
			if left == 0 && up == 0 {
				continue
			}
			record[i][j] = left + up
		}
	}
	return record[m-1][n-1]
}
