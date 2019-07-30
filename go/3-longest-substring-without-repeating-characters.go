package main

func lengthOfLongestSubstring(s string) int {
	record := make(map[string]int, len(s))
	maxLen := 0
	i := 0
	j := 0
	for j < len(s) {
		if _, exist := record[s[j:j+1]]; !exist {
			record[s[j:j+1]]++
			j++
		} else {
			delete(record, s[i:i+1])
			i++
		}
		maxLen = int(math.Max(float64(maxLen), float64(j-i)))
	}
	return maxLen
}
