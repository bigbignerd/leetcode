package main

var res []string = []string{}

func restoreIpAddresses(s string) []string {
	res = res[0:0]
	getIp(s, 1, []string{})
	return res
}
func getIp(s string, idx int, path []string) {
	if idx == 5 {
		if len(s) > 0 {
			return
		}

		ip := strings.Join(path, ".")
		res = append(res, ip)
		return
	}

	for i := 1; i <= 3 && i <= len(s); i++ {
		val := s[0:i]
		num, _ := strconv.Atoi(val)
		if len(val) > len(strconv.Itoa(num)) {
			continue
		}

		if num >= 0 && num <= 255 {
			// leftStr := strcopy(s, i)
			leftStr := s[i:]
			pathCopy := make([]string, len(path))
			copy(pathCopy, path)
			pathCopy = append(pathCopy, val)
			getIp(leftStr, idx+1, pathCopy)
		}
	}
}
