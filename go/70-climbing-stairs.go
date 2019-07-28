package main

var record map[int]int = make(map[int]int, 0)

func climbStairs(n int) int {
	if n == 0 {
		return 0
	}
	if n == 1 {
		return 1
	}
	if n == 2 {
		return 2
	}
	if times, ok := record[n]; ok {
		return times
	}
	record[n] = climbStairs(n-1) + climbStairs(n-2)
	return record[n]
}
