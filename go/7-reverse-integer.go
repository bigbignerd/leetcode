package main

func reverse(x int) int {
	flag := 1
	if x < 0 {
		flag = -1
		x = -x
	}
	sx := []byte(strconv.Itoa(x))
	left := 0
	right := len(sx) - 1
	for left < right {
		sx[left], sx[right] = sx[right], sx[left]
		left++
		right--
	}
	number, _ := strconv.Atoi(string(sx))
	if float64(number) > math.Pow(2, 31)-1 || float64(number) < -math.Pow(2, 31) {
		return 0
	}
	return number * flag
}
