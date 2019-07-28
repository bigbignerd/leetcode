package main

var mem map[int]map[int]int

func minimumTotal(triangle [][]int) int {
	mem = make(map[int]map[int]int, len(triangle))
	for k, _ := range triangle {
		mem[k] = make(map[int]int, len(triangle[k]))
	}

	return getMin(&triangle, 0, 0)
}
func getMin(triangle *[][]int, level, index int) int {
	if level == len(*triangle) {
		return 0
	}
	if v, ok := mem[level][index]; ok {
		return v
	}
	m1 := (*triangle)[level][index] + getMin(triangle, level+1, index)
	m2 := (*triangle)[level][index] + getMin(triangle, level+1, index+1)
	mem[level][index] = int(math.Min(float64(m1), float64(m2)))
	return mem[level][index]
}
