package main

func isIsomorphic(s string, t string) bool {
	ms := make(map[string]string)
	mt := make(map[string]string)
	lens := len(s)
	lent := len(t)
	if lens != lent {
		return false
	}
	for i := 0; i < lens; i++ {
		si := string(s[i])
		ti := string(t[i])
		sv, sexist := ms[si]
		tv, texist := mt[ti]
		if !sexist && !texist {
			ms[si] = ti
			mt[ti] = si
		}
		if sexist && sv != ti {
			return false
		}
		if texist && tv != si {
			return false
		}
	}
	return true
}
