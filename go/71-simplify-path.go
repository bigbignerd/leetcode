package main

import "strings"

func simplifyPath(path string) string {
	var stack []string
	pathSlice := strings.Split(path, "/")

	for _, str := range pathSlice {
		if str == "." || len(str) == 0 {
			continue
		}
		if str == ".." {
			if len(stack) > 0 {
				stack = stack[0 : len(stack)-1]
			}
			continue
		}
		stack = append(stack, str)
	}
	str := ""
	for _, s := range stack {
		if len(s) == 0 {
			continue
		}
		str += "/" + s
	}
	if len(str) == 0 {
		return "/"
	}
	return str
}
