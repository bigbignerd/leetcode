package main

var palindromes [][]string = [][]string{}

func partition(s string) [][]string {
	if len(s) == 0 {
		return [][]string{}
	}
	palindromes = [][]string{}
	backtrace(s, 0, []string{})
	return palindromes
}

func backtrace(s string, start int, res []string) {
	if start == len(s) {
		resCopy := make([]string, len(res))
		copy(resCopy, res)
		palindromes = append(palindromes, resCopy)
		return
	}
	for i := start; i < len(s); i++ {
		str := s[start : i+1]
		if isPalindrome(string(str)) {
			backtrace(s, i+1, append(res, str))
		}
	}
}

func isPalindrome(s string) bool {
	if len(s) == 0 {
		return false
	}
	if len(s) == 1 {
		return true
	}
	left := 0
	right := len(s) - 1
	for left < right {
		if s[left:left+1] != s[right:right+1] {
			return false
		}
		left++
		right--
	}
	return true
}
