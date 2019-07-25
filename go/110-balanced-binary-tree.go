package main

/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
func isBalanced(root *TreeNode) bool {
	if root == nil {
		return true
	}
	leftMax := maxDepth(root.Left)
	rightMax := maxDepth(root.Right)
	if int(math.Abs(leftMax-rightMax))-1 > 0 {
		return false
	}
	return isBalanced(root.Left) && isBalanced(root.Right)
}
func maxDepth(root *TreeNode) float64 {
	if root == nil {
		return float64(0)
	}
	return math.Max(float64(maxDepth(root.Left)), float64(maxDepth(root.Right))) + 1
}
