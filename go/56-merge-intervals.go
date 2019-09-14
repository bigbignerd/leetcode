package main

type ByFirst [][]int

func (a ByFirst) Len() int           { return len(a) }
func (a ByFirst) Swap(i, j int)      { a[i], a[j] = a[j], a[i] }
func (a ByFirst) Less(i, j int) bool { return a[i][0] < a[j][0] }

func merge(intervals [][]int) [][]int {
	intervalLen := len(intervals)
	if intervalLen <= 1 {
		return intervals
	}
	sort.Sort(ByFirst(intervals))
	res := [][]int{}
	res = append(res, intervals[0])
	for i := 1; i < intervalLen; i++ {
		endIndex := len(res) - 1
		if res[endIndex][1] < intervals[i][0] {
			res = append(res, intervals[i])
		} else {
			res[endIndex][1] = int(math.Max(float64(res[endIndex][1]), float64(intervals[i][1])))
		}
	}
	return res
}
