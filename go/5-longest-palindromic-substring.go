package main

func longestPalindrome(s string) string {
	len := len(s)
	if len == 0 {
		return s
	}
	max := 1
	start := 0
	for i := 0; i < len; i++ {
		var left, right int = i, i
		for right+1 < len && s[right+1] == s[right] {
			right++
		}
		for left >= 0 && right < len && s[right] == s[left] {
			left--
			right++
		}
		curLen := right - left - 1
		if curLen > max {
			max = curLen
			start = left + 1
		}
	}
	return s[start : start+max]
}
