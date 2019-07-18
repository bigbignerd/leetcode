package main

type sortRunes []rune

func groupAnagrams(strs []string) [][]string {
	mapper := make(map[string][]string)
	for _, str := range strs {
		sortStr := str
		sortStr = sortString(sortStr)
		mapper[sortStr] = append(mapper[sortStr], str)
	}
	var res [][]string
	for _, str := range mapper {
		res = append(res, str)
	}
	return res
}

func (s sortRunes) Less(i, j int) bool {
	return s[i] < s[j]
}

func (s sortRunes) Swap(i, j int) {
	s[i], s[j] = s[j], s[i]
}

func (s sortRunes) Len() int {
	return len(s)
}

func sortString(s string) string {
	r := []rune(s)
	sort.Sort(sortRunes(r))
	return string(r)
}
