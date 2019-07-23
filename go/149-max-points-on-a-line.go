package main

func maxPoints(points [][]int) int {
	plen := len(points)
	if plen == 0 {
		return 0
	}
	if plen == 1 {
		return 1
	}
	var count float64
	for i := 0; i < plen; i++ {
		duplicate := 1
		for j := 1; j < plen; j++ {
			x1 := points[i][0]
			y1 := points[i][1]
			x2 := points[j][0]
			y2 := points[j][1]
			if x1 == x2 && y1 == y2 {
				duplicate++
				continue
			}
			start := 0
			cnt := 0
			for start < plen {
				x := points[start][0]
				y := points[start][1]
				if onLine(x1, y1, x2, y2, x, y) {
					cnt++
				}
				start++
			}
			count = math.Max(count, float64(cnt))
		}
		count = math.Max(count, float64(duplicate))
	}
	return int(count)

}
func onLine(x1, y1, x2, y2, x, y int) bool {
	return (y-y2)*(x1-x2) == (y1-y2)*(x-x2)
}
