package main

func strStr(haystack string, needle string) int {

	hs := []byte(haystack)
	ns := []byte(needle)
	if len(ns) == 0 {
		return 0
	}
	if len(ns) > len(hs) {
		return -1
	}
	for k, v := range hs {
		if v == ns[0] {
			allMatch := true
			ni := 1
			for i := 1; i < len(ns); i++ {
				if i+k >= len(hs) || hs[i+k] != ns[ni] {
					allMatch = false
					break
				}
				ni++
			}
			if allMatch {
				return k
			}
		}
	}
	return -1
}
