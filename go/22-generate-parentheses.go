package main

func generateParenthesis(n int) []string {
	res := make([]string, 0)
	dfs(n, 0, 0, "", &res)
	return res
}
func dfs(n, left, right int, p string, res *[]string) {
	if left >= n && right >= n {
		*res = append(*res, p)
		return
	}
	if left < n {
		dfs(n, left+1, right, p+"(", res)
	}
	if right < left {
		dfs(n, left, right+1, p+")", res)
	}
}
