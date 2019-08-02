package main

func trap(height []int) int {
	count := len(height)
	if count <= 2 {
		return 0
	}
	water := 0
	stack := make([]int, 0)
	for i, v := range height {
		if len(stack) == 0 || height[stack[len(stack)-1]] > v {
			stack = append(stack, i)
		} else {
			for len(stack) > 0 && height[stack[len(stack)-1]] < v {
				b := stack[len(stack)-1]
				stack = stack[:len(stack)-1]
				if len(stack) > 0 {
					left := stack[len(stack)-1]
					w := i - left - 1
					h := int(math.Min(float64(height[i]), float64(height[left]))) - height[b]
					water += w * h
				}
			}
			stack = append(stack, i)
		}
	}
	return water
}
