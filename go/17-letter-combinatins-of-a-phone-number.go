package main

var res []string = make([]string, 0)
var digitMap map[string]string = map[string]string{
	"2": "abc",
	"3": "def",
	"4": "ghi",
	"5": "jkl",
	"6": "mno",
	"7": "pqrs",
	"8": "tuv",
	"9": "wxyz",
}

func letterCombinations(digits string) []string {
	if len(digits) == 0 {
		return []string{}
	}
	res = res[0:0]
	combination(digits, 0, "")
	return res
}
func combination(digits string, index int, s string) {
	if index == len(digits) {
		res = append(res, s)
		return
	}

	numi := digits[index : index+1]
	alpah := digitMap[numi]
	for i := 0; i < len(alpah); i++ {
		combination(digits, index+1, s+alpah[i:i+1])
	}
}
