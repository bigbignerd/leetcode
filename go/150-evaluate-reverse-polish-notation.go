package main

func evalRPN(tokens []string) int {
	if len(tokens) == 0 {
		return 0
	}
	var stack []int
	for _, t := range tokens {
		switch t {
		case "+":
			v1 := int(stack[len(stack)-1])
			v2 := int(stack[len(stack)-2])
			res := int(v1) + int(v2)
			stack = stack[:len(stack)-2]
			stack = append(stack, res)
		case "-":
			v1 := int(stack[len(stack)-1])
			v2 := int(stack[len(stack)-2])
			res := v2 - v1
			stack = stack[:len(stack)-2]
			stack = append(stack, res)
		case "*":
			v1 := int(stack[len(stack)-1])
			v2 := int(stack[len(stack)-2])
			res := v1 * v2
			stack = stack[:len(stack)-2]
			stack = append(stack, res)
		case "/":
			v1 := int(stack[len(stack)-1])
			v2 := int(stack[len(stack)-2])
			res := v2 / v1
			stack = stack[:len(stack)-2]
			stack = append(stack, res)
		default:
			number, _ := strconv.Atoi(t)
			stack = append(stack, number)
		}
	}
	return stack[0]
}
