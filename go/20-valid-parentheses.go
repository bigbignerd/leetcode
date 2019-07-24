package main

func isValid(s string) bool {
	if len(s) == 0 {
		return true
	}
	left := map[string]int{
		"(": 0,
		"[": 1,
		"{": 2,
	}
	right := map[string]int{
		")": 0,
		"]": 1,
		"}": 2,
	}
	stack := []string{}

	for _, c := range s {
		p := string(c)
		_, inLeft := left[p]
		_, inRight := right[p]
		if !inLeft && !inRight {
			return false
		}
		if inLeft {
			stack = append(stack, p)
		} else {
			if len(stack) <= 0 {
				return false
			}
			match := stack[len(stack)-1]
			stack = stack[:len(stack)-1]
			if left[match] != right[p] {
				return false
			}
		}
	}
	if len(stack) > 0 {
		return false
	}
	return true
}
