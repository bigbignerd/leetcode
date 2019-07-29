package main

func numDecodings(s string) int {
	length := len(s)
	if length <= 0 {
		return 0
	}
	record := make(map[int]int, 0)
	if s[0:1] == "0" {
		record[0] = 0
	} else {
		record[0] = 1
	}
	record[-1] = 1
	for i := 1; i < length; i++ {
		num1 := s[i : i+1]
		num2, _ := strconv.Atoi(s[i-1 : i+1])
		fmt.Print(num2)
		record[i] = 0
		if num1 != "0" {
			record[i] += record[i-1]
		}
		if num2 >= 10 && num2 <= 26 {
			record[i] += record[i-2]
		}
	}
	return record[length-1]
}
