package main

func plusOne(digits []int) []int {
	next := 0
	res := make([]int, len(digits))
	for i := len(digits) - 1; i >= 0; i-- {
		val := 0
		if i == len(digits)-1 {
			val += 1
		}
		val += digits[i] + next
		next = val / 10
		res[i] = val % 10
	}
	if next != 0 {
		return append([]int{next}, res...)
	}
	return res
}
